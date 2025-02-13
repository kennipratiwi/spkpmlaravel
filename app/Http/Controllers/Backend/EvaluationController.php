<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\User;
use App\Models\Criteria;
use App\Models\PerformanceAssessment;
use App\Models\SubCriteria;
use App\Models\Integrity;
use App\Models\Factor;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class EvaluationController extends Controller
{
    protected $evaluationRepository;

    public function index()
    {
        $users = User::with(['role', 'performance_assesment'])
            ->whereHas('role', function ($q) {
                $q->where('slug', 'employee');
            })->get();

        return view('backend.evaluation.index', compact('users'));
    }

    public function detailEvaluation($id)
    {
        Gate::authorize('evaluation.index');

        $evaluates = PerformanceAssessment::with('criteria', 'subcriteria', 'users')->where('user_id', $id)->get();
        $factors = Factor::with(['criteria', 'user'])->where('user_id', $id)->get();
        $grades = Grade::with('user')->whereHas('user', function ($q) {
            $q->where('role_id', 2);
        })->get();

        return view('backend.evaluation.detail-evaluation', compact('evaluates', 'factors', 'grades'));
    }

    public function evaluate($id)
    {
        Gate::authorize('evaluation.create');

        $employee = User::findOrFail($id);
        $criterias = Criteria::with('sub_criteria')->get();

        foreach ($criterias as $criteria) {
            if (!$criteria->sub_criteria || empty($criteria->sub_criteria) || is_null($criteria->sub_criteria) || count($criteria->sub_criteria) <= 0) {
                notify()->error(sprintf("Harap isi sub_kriteria terlebih dahulu pada kriteria '%s'", $criteria->criteria_name));
                return redirect('/users');
            }
        }

        return view('backend.evaluation.create', compact('employee', 'criterias'));
    }

    public function storeEvaluate(Request $request)
    {
        Gate::authorize('evaluation.create');

        $validate = Validator::make($request->all(), [
            'employee_number' => 'required|integer',
        ]);

        if (!$validate) {
            notify()->error($validate->errors()->first());
            return back();
        }

        $user = User::where('registration_code', $request->employee_number)->first();

        if (!$user) {
            notify()->error('User / Pegawai tidak ditemukan');
            return back();
        }

        DB::beginTransaction();

        try {
            foreach ($request->except('employee_number', '_token') as $name => $val) {
                $name = explode('_', $name);
                $subcriteria = SubCriteria::with('criteria')->where('subcriteria_code', $name[1])->first();

                // Input nilai atribut setiap karyawan dan hitung nilai gap lalu masukkan ke DB performance_assessments
                $evaluate = PerformanceAssessment::create([
                    'subcriteria_standard_value'    => $subcriteria->standard_value,
                    'subcriteria_code'              => $subcriteria->subcriteria_code,
                    'attribute_value'               => intval($val),
                    'integrity_id'                  => $user->id,
                    'criteria_id'                   => $subcriteria->criteria->id,
                    'user_id'                       => $user->id,
                    'gap'                           => intval($val) - intval($subcriteria->standard_value),
                ]);

                $integrity = Integrity::where('difference_value', $evaluate->gap)->first();

                $evaluate->update([
                    'convertion_value' => $integrity->integrity,
                    'integrity_id' => $integrity->id
                ]);
            }

            $factor_values = $this->calculateFactor($user->id);

            if (SubCriteria::sum('weight') < 100) {
                notify()->error('Bobot subkriteria masih kurang dari 100%, silahkan ditambah agar menjadi 100%');
                return back();
            }

            foreach ($factor_values as $factor_value) {
                if (is_null($factor_value->secondary_value)) {
                    notify()->error(sprintf("Secondary factor pada kriteria '%s' belum ditentukan", $factor_value->criteria_name));
                    return back();
                }

                if (is_null($factor_value->core_value)) {
                    notify()->error(sprintf("Core factor pada kriteria '%s' belum ditentukan", $factor_value->criteria_name));
                    return back();
                }

                $factor = $this->updateFactor($user->id, $factor_value);
            }

            $grades = $this->calculateGrade($user->id);

            DB::commit();
            notify()->success('Berhasil menambahkan data penilaian karyawan!');

            return redirect('/users');
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            notify()->error('Terjadi Kesalahan');
            return back();
        }
    }

    public function edit(Request $request, $id)
    {
        $evaluate = PerformanceAssessment::with('criteria', 'subcriteria', 'users')
            ->where('subcriteria_code', $id)
            ->first();

        return view('backend.evaluation.form', compact('evaluate'));
    }

    public function updateEvaluate(Request $request, $id)
    {
        Gate::authorize('evaluation.edit');

        $validate = Validator::make($request->all(), [
            'user_id' => 'required|integer',
            'attribute_value' => 'required|integer|min:1,max:5'
        ]);

        $evaluate = PerformanceAssessment::find($id);

        if (!$evaluate) {
            notify()->error('Data nilai tidak ditemukan');
            return back();
        }

        $user = User::where('id', $request->user_id)->first();

        if (!$user) {
            notify()->error('Data karyawan tidak ditemukan');
            return back();
        }

        DB::beginTransaction();

        try {
            $evaluate->attribute_value = $request->attribute_value;
            $evaluate->gap = intval($request->attribute_value) - intval($evaluate->subcriteria_standard_value);
            $evaluate->save();

            $integrity = Integrity::where('difference_value', $evaluate->gap)->first();

            $evaluate->update([
                'convertion_value' => $integrity->integrity,
                'integrity_id' => $integrity->id,
            ]);

            $factor_value = $this->updatecalculateFactor($evaluate->user_id, $evaluate->criteria_id);

            $factor = $this->updateFactor($user->id, $factor_value[0]);

            $grades = $this->calculateGrade($user->id);

            DB::commit();

            notify()->success('Berhasil mengubah data penilaian');
            return back();
        } catch (\Exception $e) {
            Log::error($e);
            DB::rollback();

            notify()->error('Terjadi kesalahan saat memperbarui data evaluasi nilai');
            return back();
        }
    }

    public function destroy($id)
    {
        Gate::authorize('evaluation.destroy');

        $evaluate = PerformanceAssessment::where('user_id', $id)->delete();
        $factor   = Factor::where('user_id', $id)->delete();
        $grade    = Grade::where('user_id', $id)->update([
            'total_grade_value' => 0,
        ]);

        notify()->success('Berhasil menghapus data penilaian');
        return back();
    }

    protected function calculateFactor($user_id)
    {
        $factor_value = DB::select("SELECT id, criteria_name,
        (
        SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'core'
                AND sub_criterias.criteria_id=criterias.id
        ) AS core_value,
        (
            SELECT COUNT(performance_assessments.subcriteria_code)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'core'
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_core_value,
        (
            SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'secondary'
                AND sub_criterias.criteria_id=criterias.id
        ) AS secondary_value,
        (
            SELECT COUNT(performance_assessments.subcriteria_code)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'secondary'
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_secondary_value,
        (
            SELECT SUM(sub_criterias.weight)
            FROM sub_criterias
                WHERE sub_criterias.criteria_id=criterias.id
        ) AS criteria_weight,
        (
            SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_value
        FROM criterias;");

        return $factor_value;
    }

    protected function updatecalculateFactor($user_id, $criteria_id)
    {
        $factor_value = DB::select("SELECT id, criteria_name,
        (
        SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'core'
                AND sub_criterias.criteria_id=criterias.id
        ) AS core_value,
        (
            SELECT COUNT(performance_assessments.subcriteria_code)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'core'
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_core_value,
        (
            SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'secondary'
                AND sub_criterias.criteria_id=criterias.id
        ) AS secondary_value,
        (
            SELECT COUNT(performance_assessments.subcriteria_code)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.factor = 'secondary'
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_secondary_value,
        (
            SELECT SUM(sub_criterias.weight)
            FROM sub_criterias
                WHERE sub_criterias.criteria_id=criterias.id
        ) AS criteria_weight,
        (
            SELECT SUM(performance_assessments.convertion_value)
            FROM performance_assessments
                INNER JOIN sub_criterias ON sub_criterias.subcriteria_code=performance_assessments.subcriteria_code
            WHERE performance_assessments.user_id = $user_id
                AND sub_criterias.criteria_id=criterias.id
        ) AS total_value
        FROM criterias WHERE criterias.id = $criteria_id ;");

        return $factor_value;
    }

    protected function calculateGrade($user_id)
    {
        $factors = Factor::where('user_id', $user_id)->get();

        $total_grade_value = [];

        foreach ($factors as $factor) {
            $total_grade = ($factor->total_weight / 100) * $factor->total_value;

            array_push($total_grade_value, $total_grade);
        }

        $grade_value = array_sum($total_grade_value);

        $grades = Grade::updateOrCreate(
            ['user_id' => $user_id],
            [
                'user_id' => $user_id,
                'total_grade_value' => $grade_value,
            ]
        );

        return $grades;
    }

    protected function updateFactor($user_id, $factor)
    {
        $core_factor_value = $factor->core_value / $factor->total_core_value;

        $secondary_factor_value = $factor->secondary_value / $factor->total_secondary_value;



        $total_value = ((60 / 100) * $core_factor_value) + ((40 / 100) * $secondary_factor_value);

        $factor = Factor::updateOrCreate(
            [
                'user_id' => $user_id,
                'criteria_id' => $factor->id,
            ],
            [
                'criteria_id' => $factor->id,
                'user_id'     => $user_id,
                'core_factor_value' => $core_factor_value,
                'secondary_factor_value' => $secondary_factor_value, 
                'total_value' => $total_value,
                'total_weight' => $factor->criteria_weight,
            ]
        );

        return $factor;
    }
}

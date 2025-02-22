<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StandardValue;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class StandardValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = StandardValue::all();
        return view('backend.standard_values.index', compact('values'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.standard_values.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string',
            'range' => 'required|string',
            'conversion' => 'required|integer|min:1|max:5',
        ]);

        StandardValue::create($request->all());

        return redirect()->route('standard_values.index')->with('success', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // Gate::authorize('standard_values.edit');

        $value = StandardValue::find($id);

        if (!$value) {
            notify()->error('Ketentuan Nilai Tidak ditemukan tidak ditemukan');
            return back();
        }

        return view('backend.standard_values.edit', compact('value'));
        //return view('backend.standard_values.edit', compact('standardValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = Validator::make($request->all(), [
            'type' => 'required|string',
            'range' => 'required|string',
            'conversion' => 'required|integer|min:1|max:5',
        ]);

        if ($validation->fails()) {
            notify()->error($validation->errors()->first());
            return back();
        }

        $value = StandardValue::find($id);

        if (!$value) {
            notify()->error('Ketentuan Nilai tidak ditemukan');
            return back();
        }

        $value->update([
            'type' => $request->type,
            'range' => $request->range,
            'conversion' => $request->conversion,
        ]);

        notify()->success('Ketentuan Nilai berhasil diperbarui');
        return redirect()->route('standard_values.index');
    }

    // $value->update($request->all());

    //     return redirect()->route('standard_values.index')->with('success', 'Data berhasil diperbarui!');
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(StandardValue $standardValue)
    {
        $standardValue->delete();
        return redirect()->route('standard_values.index')->with('success', 'Data berhasil dihapus!');
    }
}

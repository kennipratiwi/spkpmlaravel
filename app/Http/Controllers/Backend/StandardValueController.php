<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\StandardValue;
use Illuminate\Http\Request;

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
    public function edit(StandardValue $standardValue)
    {
        return view('backend.standard_values.edit', compact('standardValue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StandardValue $standardValue)
    {
        $request->validate([
            'type' => 'required|string',
            'range' => 'required|string',
            'conversion' => 'required|integer|min:1|max:5',
        ]);

        $standardValue->update($request->all());

        return redirect()->route('standard_values.index')->with('success', 'Data berhasil diperbarui!');
    }

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

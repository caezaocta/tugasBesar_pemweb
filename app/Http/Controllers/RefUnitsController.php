<?php

namespace App\Http\Controllers;

use App\Models\RefUnit;
use Illuminate\Http\Request;

class RefUnitsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $refUnits = RefUnit::all();
        return view('refUnits.index', compact('refUnits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('refUnits.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // method untuk validasi form
        $request->validate ([
            'nama' => 'required',
            'level' => 'required',
            'id_unit_parent' => 'nullable|exists:ref_units,id'
        ]);
        

        RefUnit::create(array_merge($request->all(), [
            'created_by' => $request -> user() -> id,
            // 'id_unit_parent' => $request -> user() -> id,
            'updated_by' => $request -> user() -> id,
            'is_active' => true,
         ]));

        return redirect('/refunits')->with('status', 'Data berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefUnit  $refUnit
     * @return \Illuminate\Http\Response
     */
    public function show(RefUnit $refUnit)
    {
        //
        // $refUnits = RefUnit::all();
        // return view('refUnits.show', compact('refUnits'));
        return view('refUnits.show',compact('refUnit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefUnit  $refUnit
     * @return \Illuminate\Http\Response
     */
    public function edit(RefUnit $refUnit)
    {
        //
        return view('refUnits.edit', compact('refUnit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefUnit  $refUnit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefUnit $refUnit)
    {
        //
        $request->validate ([
            'nama' => 'required',
            'level' => 'required',
            'id_unit_parent' => 'nullable|exists:ref_units,id'
        ]);
        
        RefUnit::where('id', $refUnit->id)
            ->update([
                'nama' => $request->nama,
                'level' => $request->level,
                'id_unit_parent' => $request->id_unit_parent
            ]);

            return redirect('/refunits')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefUnit  $refUnit
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefUnit $refUnit)
    {
        //
        RefUnit::destroy($refUnit->id);
        return redirect('/refunits')->with('status', 'Data berhasil dihapus!');
    }
}

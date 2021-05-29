<?php

namespace App\Http\Controllers;

use App\Models\RefUnit;
use Illuminate\Http\Request;

class RefUnitsController extends Controller
{
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function __construct()
    {
        $this->middleware('auth');
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
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UraianPekerjaan;
use Illuminate\Http\Request;

class UraianPekerjaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('components.uraian-pekerjaan.index');
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UraianPekerjaan  $uraianPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function show(UraianPekerjaan $uraianPekerjaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UraianPekerjaan  $uraianPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function edit(UraianPekerjaan $uraianPekerjaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UraianPekerjaan  $uraianPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UraianPekerjaan $uraianPekerjaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UraianPekerjaan  $uraianPekerjaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(UraianPekerjaan $uraianPekerjaan)
    {
        //
    }
}

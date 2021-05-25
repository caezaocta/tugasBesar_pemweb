<?php

namespace App\Http\Controllers;

use App\Models\UraianPekerjaan;
use Illuminate\Http\Request;

class UraianPekerjaanController extends Controller
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
        $daftar_uraian_pekerjaan = UraianPekerjaan::all();

        return view('components.uraian-pekerjaan.index', [
            'daftar_uraian_pekerjaan' => $daftar_uraian_pekerjaan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.uraian-pekerjaan.create');
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

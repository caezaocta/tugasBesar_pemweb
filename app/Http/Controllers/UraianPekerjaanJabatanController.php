<?php

namespace App\Http\Controllers;

use App\Models\UraianPekerjaanJabatan;
use App\Models\UraianPekerjaan;
use App\Models\RefJabatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UraianPekerjaanJabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $daftar_uraian_pekerjaan_jabatan = DB::table('uraian_pekerjaan_jabatan')
            ->join('uraian_pekerjaan', 'uraian_pekerjaan.id', '=', 'uraian_pekerjaan_jabatan.id_uraian_pekerjaan')
            ->join('ref_jabatan', 'ref_jabatan.id', '=', 'uraian_pekerjaan_jabatan.id_jabatan')
            ->select('uraian_pekerjaan_jabatan.id','ref_jabatan.nama', 'uraian_pekerjaan.uraian')
            ->get();

        return view('components.uraian-pekerjaan-jabatan.index', ['daftar_uraian_pekerjaan_jabatan' => $daftar_uraian_pekerjaan_jabatan]);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('components.uraian-pekerjaan-jabatan.create', [
            'uraian_pekerjaan' => UraianPekerjaan::all(),
            'ref_jabatan' => RefJabatan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        UraianPekerjaanJabatan::create([
            'id_jabatan' => $request->id_jabatan,
            'id_uraian_pekerjaan' => $request->id_uraian_pekerjaan,
            'is_active' => true,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
        ]);
        return redirect('/uraian-pekerjaan-jabatan')->with('status', 'Data Uraian Pekerjaan Jabatan Berhasil Ditambahkan!');
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
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(UraianPekerjaanJabatan $uraianPekerjaanJabatan)
    {
        $uraianPekerjaanJabatan->delete();
        return redirect()->route('uraian-pekerjaan-jabatan.index');
    }
}
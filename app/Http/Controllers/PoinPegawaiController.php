<?php

namespace App\Http\Controllers;

use App\Models\SkpRealisasi;
use App\Models\SkpTarget;
use App\Models\UraianPekerjaanJabatan;
use App\Models\Pegawai;
use App\Models\UraianPekerjaan;
use App\Models\Periode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoinPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periode = Periode::all();
        return view('laporanPoinPegawai.index', ['periode' => $periode]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Periode $periode, SkpRealisasi $skprealisasi)
    {
        $skprealisasi = DB::table('skp_realisasi')
                        ->join('skp_target', 'skp_target.id', '=', 'skp_realisasi.id_skp_target')
                        ->join('pegawai', 'pegawai.id', '=', 'skp_target.id_pegawai')
                        ->join('periode', 'periode.id', '=', 'skp_target.id_periode')
                        ->join('uraian_pekerjaan_jabatan', 'uraian_pekerjaan_jabatan.id', '=', 'skp_target.id_uraian_pekerjaan_jabatan')
                        ->join('uraian_pekerjaan', 'uraian_pekerjaan.id', '=', 'uraian_pekerjaan_jabatan.id_uraian_pekerjaan')
                        ->select('pegawai.id', 'pegawai.nama', 'pegawai.kode_pegawai', 'periode.id', 'skp_realisasi.jml_realisasi')
                        ->where('periode.id', '=', $periode->id)
                        ->get();

        return view('laporanPoinPegawai.show', ['skprealisasi' => $skprealisasi]);
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
    public function destroy($id)
    {
        //
    }
}

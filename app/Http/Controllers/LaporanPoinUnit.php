<?php

namespace App\Http\Controllers;

use App\Models\RefUnit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanPoinUnit extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $unit = $request->query('unit', null);

        $date = $request->query('date');
        if (!$date) {
            $date = Carbon::now()->toDateString();
        }

        $daftar_unit = RefUnit::all();

        $nama_unit_jumlah_poin = DB::table('ref_units')
            ->join('pegawai', 'pegawai.id_unit', '=', 'ref_units.id')
            ->join('ref_jabatan', 'ref_jabatan.id', '=', 'pegawai.id_jabatan')
            ->join('uraian_pekerjaan_jabatan', 'uraian_pekerjaan_jabatan.id_jabatan',
                    '=', 'ref_jabatan.id')
            ->join('skp_targets', 'skp_targets.id_pegawai', '=', 'pegawai.id')
            ->join('skp_realisasi', 'skp_realisasi.id_skp_target', '=',
                    'skp_targets.id')
            ->where('skp_realisasi.tanggal_akhir', '<=', $date)
            ->groupBy('ref_units.nama')
            ->select(
                'ref_units.nama',
                DB::raw('SUM(skp_realisasi.jml_realisasi) as jumlah_poin')
            )
            ->get();

        if ($unit) {
            $nama_unit_jumlah_poin = $nama_unit_jumlah_poin
                ->filter(function ($up) use ($unit) {
                    return $up->nama == $unit;
                });
        }

        return view('components.laporan.poin-unit', [
            'daftar_unit' => $daftar_unit,
            'daftar_unit_poin' => $nama_unit_jumlah_poin,
            'displayed_unit' => $unit,
            'date' => $date,
        ]);
    }
}

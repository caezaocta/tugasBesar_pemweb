<?php

namespace App\Http\Controllers;

use App\Models\SkpTarget;
use App\Models\Periode;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkpTargetsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $skpTargets = DB::table('skp_targets')
            ->join('pegawai', 'pegawai.id', '=', 'skp_targets.id_pegawai')
            ->join('users', 'users.id', '=', 'pegawai.id_user')
            ->where('users.id', '=', Auth::id())
            ->select('skp_targets.*')
            ->get();

        return view('skpTargets.index', compact('skpTargets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $daftarPeriode = Periode::all();

        $daftarUraianPekerjaan = DB::table('uraian_pekerjaan')
            ->join('uraian_pekerjaan_jabatan', 'uraian_pekerjaan_jabatan.id_uraian_pekerjaan', '=', 'uraian_pekerjaan.id')
            ->join('pegawai', 'pegawai.id_jabatan', '=', 'uraian_pekerjaan_jabatan.id_jabatan')
            ->where('pegawai.id_user', '=', Auth::id())
            ->select('uraian_pekerjaan.uraian', 'uraian_pekerjaan_jabatan.id')
            ->get();

        return view('skpTargets.create', [
            'daftarPeriode' => $daftarPeriode,
            'daftarUraianPekerjaan' => $daftarUraianPekerjaan
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
        //

       

        $request->validate([
            // 'jml_target' => 'required',
            // 'id_pegawai' => 'required',
            'id_periode' => 'required',
            'id_uraian_pekerjaan_jabatan' => 'required',
        ]);

        $daftarJumlahTarget = DB::table('uraian_pekerjaan')
        ->join('uraian_pekerjaan_jabatan', 'uraian_pekerjaan_jabatan.id_uraian_pekerjaan', '=', 'uraian_pekerjaan.id')
        ->where('uraian_pekerjaan_jabatan.id', '=', $request->input('id_uraian_pekerjaan_jabatan'))
        ->select('uraian_pekerjaan.poin')
        ->get();



        SkpTarget::create(array_merge($request->all(), [
            'jml_target' => $daftarJumlahTarget[0]->poin,
            'id_pegawai' => $request->user()->as_pegawai()->first()->id,
            'created_by' => $request->user()->id,
            // 'id_unit_parent' => $request -> user() -> id,
            'updated_by' => $request->user()->id,
        ]));

        return redirect('/skptargets')->with('status', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SkpTarget  $skpTarget
     * @return \Illuminate\Http\Response
     */



    public function show(SkpTarget $skpTarget)
    {
        //
        return view('skpTargets.show', compact('skpTarget'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkpTarget  $skpTarget
     * @return \Illuminate\Http\Response
     */
    public function edit(SkpTarget $skpTarget)
    {
        //
        return view('skpTargets.edit', compact('skpTarget'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkpTarget  $skpTarget
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkpTarget $skpTarget)
    {
        //
        $request->validate([
            'jml_target' => 'required',
            'id_pegawai' => 'required',
            'id_periode' => 'required',
            'id_uraian_pekerjaan_jabatan' => 'required',
        ]);

        SkpTarget::where('id', $skpTarget->id)
            ->update([
                'jml_target' => $request->jml_target,
                'id_pegawai' => $request->id_pegawai,
                'id_periode' => $request->id_periode,
                'id_uraian_pekerjaan_jabatan' => $request->id_uraian_pekerjaan_jabatan,
            ]);

        return redirect('/skptargets')->with('status', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkpTarget  $skpTarget
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkpTarget $skpTarget)
    {
        //
        SkpTarget::destroy($skpTarget->id);
        return redirect('/skptargets')->with('status', 'Data berhasil dihapus!');
    }
}

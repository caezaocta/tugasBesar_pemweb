<?php

namespace App\Http\Controllers;

use App\Models\SkpTarget;
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


        //         SELECT * FROM skp_targets
        // LEFT JOIN pegawai ON pegawai.id == skp_target.id_pegawai
        // LEFT JOIN users ON users.id == pegawai.id_user
        // WHERE users.id == ?;


        // $skpTargets = SkpTarget::all();
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
        return view('skpTargets.create');
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
            'jml_target' => 'required',
            'id_pegawai' => 'required',
            'id_periode' => 'required',
            'id_uraian_pekerjaan_jabatan' => 'required',
        ]);


        SkpTarget::create(array_merge($request->all(), [
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

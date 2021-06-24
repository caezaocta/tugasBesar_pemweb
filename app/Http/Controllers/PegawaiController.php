<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use App\Models\RefUnit;
use App\Models\RefJabatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PegawaiController extends Controller
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
        $pegawai = Pegawai::all();
        return view('pegawai.index', ['pegawai' => $pegawai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('pegawai.create', [
            'ref_unit' => RefUnit::all(),
            'ref_jabatan' => RefJabatan::all(),
            'users' => User::all(),  
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
        $request->validate([
            'nama' => 'required',
            'kode_pegawai' => 'required',
            'alamat' => 'required',
            'user' => 'required',
            'unit' => 'required',
            'jabatan' => 'required',
        ]);
        error_log('masuk');

        Pegawai::create([
            'nama' => $request->nama,
            'kode_pegawai' => $request->kode_pegawai,
            'alamat' => $request->alamat,
            'id_user' => $request->user,
            'id_unit' => $request->unit,
            'id_jabatan' => $request->jabatan,
            'is_active' => true,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
        ]);
        
        return redirect('/pegawai')->with('status', 'Data Pegawai Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        return view ('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        return view('pegawai.edit', [
            'pegawai' => $pegawai,
            'users' => User::all(),
            'ref_unit' => RefUnit::all(),
            'ref_jabatan' => RefJabatan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        $request->validate([
            'nama' => 'required',
            'kode_pegawai' => 'required',
            'alamat' => 'required',
            'id_user' => 'required',
            'id_unit' => 'required',
            'id_jabatan' => 'required', 
        ]);

        Pegawai::where('id', $pegawai->id)
                ->update([
                    'nama' => $request->nama,
                    'kode_pegawai' => $request->kode_pegawai,
                    'alamat' => $request->alamat,
                    'id_user' => $request->user,
                    'id_unit' => $request->unit,
                    'id_jabatan' => $request->jabatan,
                    'is_active' => true,
                    'created_by' => $request->user()->id,
                    'updated_by' => $request->user()->id,
                ]);

        return redirect('/pegawai')->with('status', 'Data Pegawai Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        Pegawai::destroy($pegawai->id);
        return redirect('/pegawai')->with('status', 'Data Pegawai Berhasil Dihapus!');
    }
}

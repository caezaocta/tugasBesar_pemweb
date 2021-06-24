<?php

namespace App\Http\Controllers;

use App\Models\RefJabatan;
use Illuminate\Http\Request;

class RefJabatanController extends Controller
{
    public function __construct()
    {
        /*$this->middleware('auth');
        $this->middleware('admin');*/
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $daftar_ref_jabatan = RefJabatan::all();
        return view('components.refJabatan.index', [
            'daftar_ref_jabatan' => $daftar_ref_jabatan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('components.refJabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'     => 'required|max:50',
            'keterangan' => 'required|max:100',
        ]);

        RefJabatan::create([
            'nama' => $validated['nama'],
            'keterangan' => $validated['keterangan'],
            'is_active' => true,
            'created_by' => $request->user()->id,
            'updated_by' => $request->user()->id,
        ]);

        return redirect()->route('ref-jabatan.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RefJabatan  $refJabatan
     * @return \Illuminate\Http\Response
     */
    public function show(RefJabatan $refJabatan)
    {
        //
        // $refJabatan = RefJabatan::all();
        // return view('refJabatan.show', compact('refJabatan'));
        return view('refJabatan.show',compact('refJabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RefJabatan  $refJabatan
     * @return \Illuminate\Http\Response
     */
    public function edit(RefJabatan $refJabatan)
    {
        return view('components.refJabatan.edit', [
            'ref_jabatan' => $refJabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RefJabatan  $refJabatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RefJabatan $refJabatan)
    {
        $validated = $request->validate([
            'nama'     => 'required|max:50',
            'keterangan' => 'required|max:100',
        ]);

        $refJabatan->fill([
            'nama' => $validated['nama'],
            'keterangan' => $validated['keterangan'],
            'updated_by' => $request->user()->id,
        ])->save();

        return redirect()->route('ref-jabatan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RefJabatan  $refJabatan
     * @return \Illuminate\Http\Response
     */
    public function destroy(RefJabatan $refJabatan)
    {
        $refJabatan->delete();

        return redirect()->route('ref-jabatan.index');
    }
}
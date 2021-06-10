<?php

namespace App\Http\Controllers;

use App\Models\SkpRealisasi;
use App\Models\SkpTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SkpRealisasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('pegawai');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_pegawai = Auth::user()
            ->as_pegawai()
            ->first()
            ->id;

        $daftar_skp_realisasi = SkpTarget::all()
            ->filter(function ($skp_target) use ($id_pegawai) {
                // Hanya ambil skp_target milik user terkait
                return $skp_target->id_pegawai == $id_pegawai;
            })
            ->map(function ($skp_target) {
                // Ambil data skp_realisasinya
                return $skp_target->realisasi()->first();
            });

        return view('components.skp-realisasi.index', [
            'daftar_skp_realisasi' => $daftar_skp_realisasi
        ]);
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
     * @param  \App\Models\SkpRealisasi  $skpRealisasi
     * @return \Illuminate\Http\Response
     */
    public function show(SkpRealisasi $skpRealisasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SkpRealisasi  $skpRealisasi
     * @return \Illuminate\Http\Response
     */
    public function edit(SkpRealisasi $skpRealisasi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SkpRealisasi  $skpRealisasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SkpRealisasi $skpRealisasi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SkpRealisasi  $skpRealisasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(SkpRealisasi $skpRealisasi)
    {
        //
    }
}

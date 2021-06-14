<?php

namespace App\Http\Controllers;

use App\Models\SkpRealisasi;
use App\Models\SkpTarget;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
        return view('components.skp-realisasi.edit', [
            'skp_realisasi' => $skpRealisasi
        ]);
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
        $validated = $request->validate([
            'lokasi' => 'nullable|max:255',
            'jml_realisasi' => [
                'required',
                // Nilai jml_realisasi harus berada di rentang 0 <= x <= jml_target
                function ($attr, $val, $fail) use ($skpRealisasi) {
                    $jml_target = $skpRealisasi->skp_target()->first()->jml_target;
                    if ($val < 0 || $val > $jml_target) {
                        $fail($attr.' must in between 0 and its target\'s amount');
                    }
                }
            ],
            'keterangan' => 'nullable|max:100',
            'bukti' => 'nullable|mimes:jpg,png,doc,docx,pdf,zip',
        ]);

        // upload file bukti
        $path_bukti = Storage::putFile('public/bukti', $validated['bukti']);
        $path_bukti = Storage::url(str_replace('public', '', $path_bukti));

        $skpRealisasi->fill([
            'lokasi' => $validated['lokasi'],
            'jml_realisasi' => $validated['jml_realisasi'],
            'keterangan' => $validated['keterangan'],
            'path_bukti' => $path_bukti,
            'updated_by' => $request->user()->id
        ])->save();

        return redirect()->route('skp-realisasi.index');
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

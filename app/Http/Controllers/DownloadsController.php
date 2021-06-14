<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\SkpRealisasi;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DownloadsController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Menyediakan download file bukti skp realisasi
     */
    public function bukti_skp_realisasi($id_skp_realisasi) {
        $skp_realisasi = SkpRealisasi::find($id_skp_realisasi);

        if (Gate::denies('download-bukti-skp-realisasi', $skp_realisasi)) {
            abort(403);
        } else if (! $skp_realisasi->is_done()) {
            abort(404);
        }

        $dot_extension = '.'.pathinfo($skp_realisasi->path_bukti, PATHINFO_EXTENSION);

        return Storage::download(
            'public/'.$skp_realisasi->path_bukti,
            'bukti-skp-realisasi-'.$id_skp_realisasi.$dot_extension
        );
    }
}

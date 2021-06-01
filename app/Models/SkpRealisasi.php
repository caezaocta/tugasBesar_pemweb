<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpRealisasi extends Model
{
    use HasFactory;

    protected $table = 'skp_realisasi';

    public function skp_target() {
        return $this->belongsTo(SkpTarget::class, 'id_skp_target');
    }
}

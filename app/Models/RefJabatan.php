<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJabatan extends Model
{
    use HasFactory;

    protected $table = 'ref_jabatan';

    /**
     * Many-to-Many relationship dengan UraianPekerjaan.
     */
    public function mengerjakanPekerjaan() {
        return $this->belongsToMany(
            UraianPekerjaan::class,
            'uraian_pekerjaan_jabatan',
            'id_jabatan',
            'id_uraian_pekerjaan',
        );
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor() {
        return $this->belongsTo(User::class, 'edited_by');
    }
}

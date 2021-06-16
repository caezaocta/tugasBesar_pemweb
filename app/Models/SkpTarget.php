<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkpTarget extends Model
{
    use HasFactory;

    protected $fillable = ['jml_target', 'id_pegawai', 'id_periode', 'id_uraian_pekerjaan_jabatan', 'created_by', 'updated_by'];
}

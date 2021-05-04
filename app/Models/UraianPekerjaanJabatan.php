<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class UraianPekerjaanJabatan extends Pivot
{
    use HasFactory;

    public $incrementing = true;

    protected $table = 'uraian_pekerjaan_jabatan';
}

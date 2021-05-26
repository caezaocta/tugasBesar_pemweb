<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UraianPekerjaan extends Model
{
    use HasFactory;

    protected $table = 'uraian_pekerjaan';

    protected $fillable = [
        'uraian',
        'keterangan',
        'poin',
        'satuan',
        'is_active',
        'created_by',
        'updated_by',
    ];

    /**
     * Many-to-Many relationship dengan RefJabatan.
     */
    public function dikerjakanOlehJabatan() {
        return $this->belongsToMany(RefJabatan::class);
    }

    public function creator() {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function editor() {
        return $this->belongsTo(User::class, 'edited_by');
    }
}

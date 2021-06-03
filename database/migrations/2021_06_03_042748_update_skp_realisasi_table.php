<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSkpRealisasiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skp_realisasi', function(Blueprint $table) {
            // Karena entry SkpRealisasi akan dibuat secara otomatis
            // ketika SkpTarget baru dibuat, maka kolom berikut ini
            // pada saat tersebut belum memiliki value, sehingga
            // perlu dibuat sebagai kolom yang nullable.
            $table->date('tanggal_akhir')->nullable()->change();
            $table->string('lokasi')->nullable()->change();
            $table->string('keterangan', 100)->nullable()->change();
            $table->string('path_bukti')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skp_realisasi', function(Blueprint $table) {
            // buat menjadi tidak nullable kembali.
            $table->date('tanggal_akhir')->nullable(false)->change();
            $table->string('lokasi')->nullable(false)->change();
            $table->string('keterangan', 100)->nullable(false)->change();
            $table->string('path_bukti')->nullable(false)->change();
        });
    }
}

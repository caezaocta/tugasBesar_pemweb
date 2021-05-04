<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('kode_pegawai', 18);
            $table->string('alamat');
            $table->foreignId('id_unit');
            $table->foreignId('id_jabatan');
            $table->foreignId('id_user');
            $table->boolean('is_active');

            $table->timestamps();
            $table->foreignId('created_by');
            $table->foreignId('updated_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pegawai');
    }
}

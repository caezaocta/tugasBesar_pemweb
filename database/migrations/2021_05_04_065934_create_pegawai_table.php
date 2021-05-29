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
            $table->boolean('is_active');

            $table->timestamps();
            $table
                ->foreignId('id_unit')
                ->constrained('ref_units')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('id_jabatan')
                ->constrained('ref_jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('id_user')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('created_by')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('updated_by')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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

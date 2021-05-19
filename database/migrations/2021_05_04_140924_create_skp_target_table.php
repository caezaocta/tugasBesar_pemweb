<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkpTargetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('skp_target', function (Blueprint $table) {
            $table->id();
            $table->integer('jml_target');

            $table->timestamps();
            $table
                ->foreignId('id_pegawai')
                ->constrained('pegawai')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('id_periode')
                ->constrained('periode')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('id_uraian_pekerjaan_jabatan')
                ->constrained('uraian_pekerjaan_jabatan')
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
        Schema::dropIfExists('skp_target');
    }
}

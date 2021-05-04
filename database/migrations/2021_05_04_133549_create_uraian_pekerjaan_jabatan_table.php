<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUraianPekerjaanJabatanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uraian_pekerjaan_jabatan', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');

            $table->timestamps();
            $table
                ->foreignId('id_jabatan')
                ->constrained('ref_jabatan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table
                ->foreignId('id_uraian_pekerjaan')
                ->constrained('uraian_pekerjaan')
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

            $table->index(['id_jabatan', 'id_uraian_pekerjaan']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uraian_pekerjaan_jabatan');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefUnitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ref_units', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->integer('level');
            $table->boolean('is_active');

            $table->timestamps();

            $table
                ->foreignId('id_unit_parent')
                ->nullable()
                ->constrained('ref_units')
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
        Schema::dropIfExists('ref_units');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalmatakuliahTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwalmatakuliah', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->string('hari');
            $table->string('jam');
            $table->unsignedBigInteger('id_matakuliah');
            $table->timestamps();

            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwalmatakuliah');
    }
}

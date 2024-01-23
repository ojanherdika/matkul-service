<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengajarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajar', function (Blueprint $table) {
            $table->id('id_pengajar');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_jadwal');
            $table->timestamps();

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onDelete('cascade');;
            $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwalmatakuliah')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajar');
    }
}

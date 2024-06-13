<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBeritaAcaraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id('id_berita_acara');
            $table->unsignedBigInteger('id_verif_rps');
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('catatan');
            $table->timestamps();

            $table->foreign('id_verif_rps')->references('id_verif_rps')->on('verif_rps')->onDelete('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('berita_acara');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('matkul_kbk', function (Blueprint $table) {
            $table->id('id_matkul_kbk');
            $table->unsignedBigInteger('id_matakuliah');
            $table->unsignedBigInteger('id_jenis_kbk');
            $table->unsignedBigInteger('id_kurikulum');


            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jenis_kbk')->references('id_jenis_kbk')->on('jenis_kbk')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matkul_kbk');
    }
};

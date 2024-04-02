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
        Schema::create('dosen_matakuliah', function (Blueprint $table) {
            $table->id('id_dosen_matakuliah');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_matakuliah');
            $table->unsignedBigInteger('id_kelas');
            $table->unsignedBigInteger('id_thnakd');

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kelas')->references('id_kelas')->on('kelas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_thnakd')->references('id_thnakd')->on('thnakd')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_matakuliah');
    }
};

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
        Schema::create('kelas', function (Blueprint $table) {
            $table->id('id_kelas');
            $table->string('kode_kelas');
            $table->string('nama_kelas');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_thnakd');

            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')
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
        Schema::dropIfExists('kelas');
    }
};

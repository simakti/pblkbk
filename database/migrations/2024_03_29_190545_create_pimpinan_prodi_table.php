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
        Schema::create('pimpinan_prodi', function (Blueprint $table) {
            $table->id('id_pimpinan_prodi');
            $table->unsignedBigInteger('id_jabatan_pimpinan');
            $table->unsignedBigInteger('id_prodi');
            $table->unsignedBigInteger('id_dosen');
            $table->string('periode');
            $table->enum('status',[0,1]);

            $table->foreign('id_jabatan_pimpinan')->references('id_jabatan_pimpinan')->on('jabatan_pimpinan')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
                    ->onUpdate('cascade')->onDelete('cascade');
                });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pimpinan_prodi');
    }
};

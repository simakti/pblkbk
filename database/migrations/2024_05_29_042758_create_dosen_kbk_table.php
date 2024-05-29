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
        Schema::create('dosen_kbk', function (Blueprint $table) {
            $table->id('id_dosen_kbk');
            $table->unsignedBigInteger('id_jenis_kbk');
            $table->unsignedBigInteger('id_dosen');
<<<<<<< HEAD:database/migrations/2024_03_29_210247_create_verif_rps_table.php
            $table->unsignedBigInteger('id_matakuliah');
            $table->unsignedBigInteger('id_thnakd');
            $table->string('file')->nullable();
            $table->string('status');
            $table->string('catatan')->nullable();
            $table->timestamp('tanggal_verif', $precision = 0);

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_thnakd')->references('id_thnakd')->on('thnakd')
                    ->onUpdate('cascade')->onDelete('cascade');
=======

            $table->foreign('id_jenis_kbk')->references('id_jenis_kbk')->on('jenis_kbk')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3:database/migrations/2024_05_29_042758_create_dosen_kbk_table.php
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen_kbk');
    }
};

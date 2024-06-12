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
        Schema::create('verif_rps', function (Blueprint $table) {
            $table->id('id_verif_rps');
            $table->unsignedBigInteger('id_repo_rps');
            $table->unsignedBigInteger('id_pimpinan_prodi');
            $table->unsignedBigInteger('id_penguruskbk');
            $table->enum('status_verif_rps', ['0','1'])->default('0')->comment('0: Belum Diverifikasi, 1: Diverifikasi');
            $table->text('catatan')->nullable();
            $table->date('tanggal_diverifikasi');
            $table->foreign('id_repo_rps')->references('id_repo_rps')->on('repo_rps');
            $table->foreign('id_pimpinan_prodi')->references('id_pimpinan_prodi')->on('pimpinan_prodi');
            $table->foreign('id_penguruskbk')->references('id_penguruskbk')->on('penguruskbk');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verif_rps');
    }
};

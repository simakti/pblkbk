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
        Schema::create('repo_uas', function (Blueprint $table) {
            $table->id('id_repo_uas');
            $table->unsignedBigInteger('id_thnakd');
            $table->unsignedBigInteger('id_verif_uas');
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('file');
            $table->timestamp('terakhir_diubah', $precision = 0);

            $table->foreign('id_thnakd')->references('id_thnakd')->on('thnakd')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_verif_uas')->references('id_verif_uas')->on('verif_uas')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repo_uas');
    }
};
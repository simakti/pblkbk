<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifRpsTable extends Migration
{
    public function up()
    {
        Schema::create('verif_rps', function (Blueprint $table) {
            $table->id('id_verif_rps');
            $table->unsignedBigInteger('id_repo_rps');
            $table->enum('status_verif_rps', ['0','1'])->default('0')->comment('0: Belum Diverifikasi, 1: Diverifikasi');
            $table->text('catatan')->nullable();
            $table->date('tanggal_diverifikasi');
            $table->foreign('id_repo_rps')->references('id_repo_rps')->on('repo_rps')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
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

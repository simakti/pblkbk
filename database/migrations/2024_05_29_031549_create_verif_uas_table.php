<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('verif_uas', function (Blueprint $table) {
            $table->id('id_verif_uas');
            $table->unsignedBigInteger('id_repo_uas');
            $table->string('status_verif_uas', 50);
            $table->text('catatan');
            $table->date('tanggal_diverifikasi');
            $table->foreign('id_repo_uas')->references('id_repo_uas')->on('repo_uas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verif_uas');
    }
};

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
        Schema::create('verif_uas', function (Blueprint $table) {
            $table->id('id_verif_uas');
            $table->unsignedBigInteger('id_dosen');
            $table->string('file')->nullable();
            $table->string('status');
            $table->string('catatan')->nullable();
            $table->timestamp('tanggal_verif', $precision=0);

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
            ->onDelete('cascade')->onUpdate('cascade');
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

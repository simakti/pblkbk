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

            $table->foreign('id_jenis_kbk')->references('id_jenis_kbk')->on('jenis_kbk')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')->onUpdate('cascade')->onDelete('cascade');
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

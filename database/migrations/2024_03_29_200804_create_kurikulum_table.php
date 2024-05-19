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
        Schema::create('kurikulum', function (Blueprint $table) {
            $table->id('id_kurikulum');
            $table->string('kode_kurikulum');
            $table->string('nama_kurikulum');
            $table->string('tahun');
            $table->unsignedBigInteger('id_prodi');
            $table->enum('status',[0,1]);


            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')
            ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kurikulum');
    }
};

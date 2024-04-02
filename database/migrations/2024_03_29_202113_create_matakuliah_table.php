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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->unsignedBigInteger('id_matakuliah');
            $table->string('kode_matakuliah');
            $table->string('nama_matakuliah');
            $table->enum('TP',['T','P','T/P']);
            $table->string('sks')->nullable();
            $table->string('jam');
            $table->string('sks_teori');
            $table->string('sks_praktek');
            $table->string('jam_teori');
            $table->string('jam_praktek');
            $table->string('semester')->nullable();
            $table->unsignedBigInteger('id_kurikulum');
            $table->primary('id_matakuliah');

            $table->foreign('id_kurikulum')->references('id_kurikulum')->on('kurikulum')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};

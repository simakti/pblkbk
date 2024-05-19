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
        Schema::create('prodi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_prodi');
            $table->string('kode_prodi');
            $table->string('prodi');
            $table->unsignedBigInteger('id_jurusan');
            $table->string('jenjang');

            $table->primary('id_prodi');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')
            ->onDelete('cascade')->onUpdate('cascade');
        });




    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi');
    }
};

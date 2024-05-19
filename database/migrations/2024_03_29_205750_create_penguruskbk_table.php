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
        Schema::create('penguruskbk', function (Blueprint $table) {
            $table->id('id_penguruskbk');
            $table->unsignedBigInteger('id_jenis_kbk');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_jabatan_kbk');
            $table->enum('status',[1,0]);

            $table->foreign('id_jenis_kbk')->references('id_jenis_kbk')->on('jenis_kbk')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
            ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_jabatan_kbk')->references('id_jabatan_kbk')->on('jabatankbk')
            ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penguruskbk');
    }
};

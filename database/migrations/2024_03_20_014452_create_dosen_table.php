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
        Schema::create('dosen', function (Blueprint $table) {
            $table->id('id_dosen');
            $table->string('nama_dosen');
            $table->string('nidn');
            $table->string('nip');
            $table->string('jenis_kelamin');
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_prodi');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('status');
           // $table->unsignedBigInteger('id_jabatan');
           // $table->string('password');
           // $table->unsignedBigInteger('id_kbk');

        });
        Schema::table('dosen', function (Blueprint $table) {
            // $table->foreign('id_jabatan')->references('id_jabatan')->on('jabatan')
            //         ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')
                    ->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('id_kbk')->references('id_kbk')->on('jenis_kbk')
            //         ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dosen');
    }
};

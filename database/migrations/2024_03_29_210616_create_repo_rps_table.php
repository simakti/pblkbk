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
        Schema::create('repo_rps', function (Blueprint $table) {
            $table->id('id_repo_rps');
            $table->unsignedBigInteger('id_dosen');
            $table->unsignedBigInteger('id_matakuliah');
            $table->unsignedBigInteger('id_thnakd');
            $table->string('file')->nullable();
            $table->timestamp('tanggal_verif', $precision = 0);

            $table->foreign('id_dosen')->references('id_dosen')->on('dosen')
                    ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_matakuliah')->references('id_matakuliah')->on('matakuliah')
                    ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_thnakd')->references('id_thnakd')->on('thnakd')
                    ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repo_rps');
    }
};

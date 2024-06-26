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
            $table->unsignedBigInteger('id_dosen');
            $table->string('nama_dosen');
            $table->string('nidn')->unique();
            $table->string('nip')->unique();
            $table->string('jenis_kelamin');
            $table->unsignedBigInteger('id_jurusan');
            $table->unsignedBigInteger('id_prodi');
            $table->string('email')->unique();
            $table->string('image')->nullable();
            $table->string('status');
            $table->string('password');  // Uncommented to match the seeder data
            $table->primary('id_dosen');
        });

        Schema::table('dosen', function (Blueprint $table) {
            $table->foreign('id_prodi')->references('id_prodi')->on('prodi')
                  ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_jurusan')->references('id_jurusan')->on('jurusan')
                  ->onUpdate('cascade')->onDelete('cascade');
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

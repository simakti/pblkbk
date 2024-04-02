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
        Schema::create('verif_rps', function (Blueprint $table) {
            $table->id('id_verif_rps');
            $table->string('file');
            $table->string('status');
            $table->string('catatan');
            $table->timestamp('tanggal_verif', $precision = 0);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('verif_rps');
    }
};

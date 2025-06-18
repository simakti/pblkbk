<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Tambahkan kolom dosen_id
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id')->nullable()->after('id');
            $table->foreign('dosen_id')->references('id_dosen')->on('dosen')
                  ->onUpdate('cascade')->onDelete('cascade');
        });

        // Isi kolom dosen_id berdasarkan email
        DB::table('users')->get()->each(function ($user) {
            $dosen = DB::table('dosen')->where('email', $user->email)->first();
            if ($dosen) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['dosen_id' => $dosen->id_dosen]);
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['dosen_id']);
            $table->dropColumn('dosen_id');
        });
    }
};

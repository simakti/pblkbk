<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserDosenLinkSeeder extends Seeder
{
    public function run(): void
    {
        // Cocokkan user dan dosen berdasarkan email
        $users = DB::table('users')->get();
        foreach ($users as $user) {
            $dosen = DB::table('dosen')->where('email', $user->email)->first();
            if ($dosen) {
                DB::table('users')
                    ->where('id', $user->id)
                    ->update(['dosen_id' => $dosen->id_dosen]);
            }
        }
    }
}

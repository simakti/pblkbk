<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UsersSeeder extends Seeder
{
    /**
     * Run the seeder.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            ['id' => 1, 'dosen_id' => 13, 'name' => 'ALDE ALANDA, S.Kom, M.T', 'email' => 'alde@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 2, 'dosen_id' => 14, 'name' => 'ALDO ERIANDA, M.T, S.ST', 'email' => 'aldo@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 3, 'dosen_id' => 40, 'name' => 'CIPTO PRABOWO, S.T, M.T', 'email' => 'cipto@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
            ['id' => 4, 'dosen_id' => 46, 'name' => 'DEDDY PRAYAMA, S.Kom, M.ISD', 'email' => 'deddy@pnp.ac.id', 'email_verified_at' => Carbon::now(), 'password' => Hash::make('12345678')],
        ];

        DB::table('users')->insert($users);
    }
}

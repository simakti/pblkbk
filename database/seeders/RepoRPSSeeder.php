<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RepoRPSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RepoRPSData = [
            [160, 2, 1, '', '2023-12-25']

        ];

        foreach ($RepoRPSData as $data) {
            DB::table('repo_rps')->insert([
                'id_dosen' => $data[0],
                'id_matakuliah' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'tanggal_verif' => $data[4]
            ]);
        }
    }
}

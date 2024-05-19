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
            [3, 1, 13, '', '2024-01-30']

        ];

        foreach ($RepoRPSData as $data) {
            DB::table('repo_rps')->insert([
                'id_thnakd' => $data[0],
                'id_verif_rps' => $data[1],
                'id_matakuliah' => $data[2],
                'file' => $data[3],
                'terakhir_diubah' => $data[4]

            ]);
        }
    }
}

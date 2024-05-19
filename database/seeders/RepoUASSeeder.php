<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RepoUASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $RepoUASData = [
            [3, 1, 13, '', '2024-01-30']

        ];

        foreach ($RepoUASData as $data) {
            DB::table('repo_uas')->insert([
                'id_thnakd' => $data[0],
                'id_verif_uas' => $data[1],
                'id_matakuliah' => $data[2],
                'file' => $data[3],
                'terakhir_diubah' => $data[4]
            ]);
        }
    }
}

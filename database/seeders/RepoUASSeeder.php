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
            [2, 160, 1, '', '2023-12-25']

        ];

        foreach ($RepoUASData as $data) {
            DB::table('repo_uas')->insert([
                'id_matakuliah' => $data[0],
                'id_dosen' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'tanggal_verif' => $data[4]
            ]);
        }
    }
}

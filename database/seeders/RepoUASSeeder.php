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
<<<<<<< HEAD
            [2, 160, 1, '', '2023-12-25']
=======
            [3, 160, 10, '', '2024-01-30', '2024-02-01']
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3

        ];

        foreach ($RepoUASData as $data) {
            DB::table('repo_uas')->insert([
                'id_thnakd' => $data[0],
                'id_dosen' => $data[1],
<<<<<<< HEAD
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'tanggal_verif' => $data[4]
=======
                'id_matakuliah' => $data[2],
                'file' => $data[3],
                'created_at' => $data[4],
                'updated_at' => $data[5],
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3
            ]);
        }
    }
}

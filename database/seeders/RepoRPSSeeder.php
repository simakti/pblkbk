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
<<<<<<< HEAD
            [160, 2, 1, '', '2023-12-25']

=======
            [3, 13, 13, '', '2024-01-30', '2024-02-01']
>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3
        ];

        foreach ($RepoRPSData as $data) {
            DB::table('repo_rps')->insert([
<<<<<<< HEAD
                'id_dosen' => $data[0],
                'id_matakuliah' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3],
                'tanggal_verif' => $data[4]
=======
                'id_thnakd' => $data[0],
                'id_dosen' => $data[1],
                'id_matakuliah' => $data[2],
                'file' => $data[3],
                'created_at' => $data[4],
                'updated_at' => $data[5],

>>>>>>> 4fa1c039052e23a0ad5fed4c1d30d390abdf7be3
            ]);
        }
    }
}

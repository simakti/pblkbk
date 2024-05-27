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
            [2, 160, 1, '']

        ];

        foreach ($RepoUASData as $data) {
            DB::table('repo_uas')->insert([
<<<<<<< HEAD
                'id_matakuliah' => $data[0],
                'id_dosen' => $data[1],
                'id_thnakd' => $data[2],
                'file' => $data[3]
=======
                'id_thnakd' => $data[0],
                'id_verif_uas' => $data[1],
                'id_matakuliah' => $data[2],
                'file' => $data[3],
                'terakhir_verif' => $data[4]
>>>>>>> 5d7cf6ce038eed78f72a5fd12009f9b47242a3a9
            ]);
        }
    }
}

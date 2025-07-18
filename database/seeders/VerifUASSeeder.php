<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class VerifUASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $VerifUASData = [
            [1, 1, '', '2023-12-25']

        ];

        foreach ($VerifUASData as $data) {
            DB::table('verif_uas')->insert([
                'id_repo_uas' => $data[0],
                'status_verif_uas' => $data[1],
                'catatan' => $data[2],
                'tanggal_diverifikasi' => $data[3],
            ]);
        }
    }
}

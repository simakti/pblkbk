<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DosenKBKSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $DosenKBKData = [
            [2, 358],
            [1, 359]
        ];

        foreach ($DosenKBKData as $data) {
            DB::table('dosen_kbk')->insert([
                'id_jenis_kbk'=>$data[0],
                'id_dosen'=>$data[1],
            ]);
        }
    }
}

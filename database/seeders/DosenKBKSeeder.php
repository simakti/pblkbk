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
            [1, 220],
            [1, 198],
            [1, 289],
            [1, 353],
            [1, 127],
            [1, 362],
            [2, 122],
            [2, 50],
            [2, 206],
            [2, 91],
            [2, 66],
            [2, 116],
            [2, 363],
            [3, 311],
            [3, 351],
            [3, 85],
            [3, 212],
            [3, 14],
            [3, 310],
            [3, 357],
            [3, 358],
            [3, 356],
            [3, 361],
            [3, 364],
            [4, 258],
            [5, 352],
            [5, 312],
            [5, 46],
            [5, 121],
            [5, 223],
            [5, 109],
            [5, 40],
            [5, 103]

        ];

        foreach ($DosenKBKData as $data) {
            DB::table('dosen_kbk')->insert([
                'id_jenis_kbk'=>$data[0],
                'id_dosen'=>$data[1],
            ]);
        }
    }
}

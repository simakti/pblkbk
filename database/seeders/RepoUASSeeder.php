<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepoUASSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('repo_uas')->insert([
            [
                'id_thnakd' => 3,
                'id_dosen' => 1,
                'id_matakuliah' => 10,
                'file' => '',
            ],
        ]);
    }
}

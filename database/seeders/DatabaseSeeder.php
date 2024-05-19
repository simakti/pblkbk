<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([jurusanSeeder::class,]);
        $this->call([prodiSeeder::class,]);
        $this->call([dosenSeeder::class,]);
        $this->call([thnAkdSeeder::class,]);
        $this->call([KelasSeeder::class,]);
        $this->call([JabatanPimpinanSeeder::class,]);
        $this->call([KurikulumSeeder::class,]);
        $this->call([MatakuliahSeeder::class,]);
        $this->call([DosenMatakuliahSeeder::class,]);
        $this->call([PimpinanProdiSeeder::class,]);
        $this->call([PimpinanJurusanSeeder::class,]);
        $this->call([VerifRPSSeeder::class,]);
        $this->call([VerifUASSeeder::class,]);
        $this->call([RepoRPSSeeder::class,]);
        $this->call([RepoUASSeeder::class,]);

    }
}

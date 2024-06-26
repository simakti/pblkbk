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

        $this->call([thnAkdSeeder::class,]);
        $this->call([JabatanPimpinanSeeder::class,]);

        $this->call([jabatanKbkSeeder::class,]);
        $this->call([kurikulumSeeder::class,]);

        $this->call([jenisKBKSeeder::class,]);
        $this->call([matkulKbkSeeder::class,]);
        $this->call([pengurusKbkSeeder::class,]);
        $this->call([RepoRPSSeeder::class,]);
        $this->call([RepoUASSeeder::class,]);
        $this->call([VerifRPSSeeder::class,]);
        $this->call([VerifUASSeeder::class,]);



    }
}

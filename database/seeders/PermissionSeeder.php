<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat atau memperbarui peran
        $roleAdmin = Role::updateOrCreate(['name' => 'admin']);
        $rolePengurusKbk = Role::updateOrCreate(['name' => 'penguruskbk']);
        $roleKaprodi = Role::updateOrCreate(['name' => 'kaprodi']);
        $roleKajur = Role::updateOrCreate(['name' => 'kajur']);
        $roleDosenPengampu = Role::updateOrCreate(['name' => 'dosenpengampu']);

        // Menetapkan peran kepada pengguna
        $userAdmin = User::find(1); // Sesuaikan dengan ID pengguna Anda
        $userPengurusKbk = User::find(2); // Sesuaikan dengan ID pengguna Anda
        $userKaprodi = User::find(3); // Sesuaikan dengan ID pengguna Anda
        $userDosenPengampu = User::find(4); // Sesuaikan dengan ID pengguna Anda

        if ($userAdmin) {
            $userAdmin->assignRole('admin');
        }

        if ($userPengurusKbk) {
            $userPengurusKbk->assignRole('penguruskbk');
        }

        if ($userKaprodi) {
            $userKaprodi->assignRole('kaprodi');
        }

        if ($userDosenPengampu) {
            $userDosenPengampu->assignRole('dosenpengampu');
        }
    }
}

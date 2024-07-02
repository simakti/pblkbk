<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat atau memperbarui peran
        $roleSuperAdmin = Role::updateOrCreate(['name' => 'superadmin']);
        $roleAdmin = Role::updateOrCreate(['name' => 'admin']);
        $rolePengurusKbk = Role::updateOrCreate(['name' => 'penguruskbk']);
        $roleKaprodi = Role::updateOrCreate(['name' => 'kaprodi']);
        $roleKajur = Role::updateOrCreate(['name' => 'kajur']);
        $roleDosenPengampu = Role::updateOrCreate(['name' => 'dosenpengampu']);

        // Menetapkan peran kepada pengguna
        $userSuperAdmin = User::find(1); // Sesuaikan dengan ID pengguna Anda
        $userAdmin = User::find(2); // Sesuaikan dengan ID pengguna Anda
        $userPengurusKbk = User::find(3); // Sesuaikan dengan ID pengguna Anda
        $usersKaprodiIds = [19, 32, 31, 40, 15, 6];
        $userKaprodi = User::whereIn('id', $usersKaprodiIds)->get(); // Menggunakan whereIn untuk beberapa ID
        $userKajur = User::find(24); // Sesuaikan dengan ID pengguna Anda
        $usersDosenPengampuIds = [3,4];
        $userDosenPengampu = User::whereIn('id', $usersDosenPengampuIds)->get(); // Menggunakan whereIn untuk beberapa ID

        if ($userSuperAdmin) {
            $userSuperAdmin->assignRole($roleSuperAdmin);
        }

        if ($userAdmin) {
            $userAdmin->assignRole($roleAdmin);
        }

        if ($userPengurusKbk) {
            $userPengurusKbk->assignRole($rolePengurusKbk);
        }

        foreach ($userKaprodi as $user) {
            $user->assignRole($roleKaprodi);
        }

        if ($userKajur) {
            $userKajur->assignRole($roleKajur);
        }

        foreach ($userDosenPengampu as $user) {
            $user->assignRole($roleDosenPengampu);
        }
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use App\Models\User;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        // Je crée les rôles s’ils n’existent pas
        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $manager = Role::firstOrCreate(['name' => 'Gestionnaire Technologies']);

        // Je récupère (ou crée) un compte de démo
        $user = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Demo',
                'password' => bcrypt('password'), // à changer en prod
            ]
        );

        // J’assigne le rôle Admin à cet utilisateur
        if (!$user->hasRole('Admin')) {
            $user->assignRole('Admin');
        }
    }
}

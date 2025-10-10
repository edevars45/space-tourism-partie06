<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1) Rôles & permissions (Spatie)
        $this->call([
            RolesAndPermissionsSeeder::class,
        ]);

        // 2) Utilisateur de test (évite le doublon si déjà présent)
        User::firstOrCreate(
            ['email' => 'test@example.com'], // clé d’unicité
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // ou laisse ta factory si tu préfères
                'email_verified_at' => now(),
            ]
        );

        // --- Optionnel : créer/garantir un admin de démo ---
        // $admin = User::firstOrCreate(
        //     ['email' => 'admin@example.test'],
        //     [
        //         'name' => 'Admin',
        //         'password' => bcrypt('Admin1234'),
        //         'email_verified_at' => now(),
        //     ]
        // );
        // $admin->assignRole('Administrateur');
    }
}

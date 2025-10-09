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
        // Je crée un utilisateur de test via la factory (optionnel)
        User::factory()->create([
            'name'  => 'Test User',
            'email' => 'test@example.com',
            // password auto géré par la factory si définie,
            // sinon ajoute: 'password' => bcrypt('password')
        ]);

        // Je lance mon seeder des rôles + admin de démo
        $this->call([
            RolesSeeder::class,
        ]);
    }
}

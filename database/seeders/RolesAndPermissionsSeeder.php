<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Toujours vider le cache des permissions Spatie avant modifications
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1) Permissions
        $perms = [
            'planets.manage',
            'crew.manage',
            'technologies.manage',
            'users.manage',
        ];

        foreach ($perms as $p) {
            Permission::firstOrCreate(['name' => $p, 'guard_name' => 'web']);
        }

        // 2) Rôles
        $managerPlanets = Role::firstOrCreate(['name' => 'Gestionnaire Planètes']);
        $managerPlanets->givePermissionTo('planets.manage');

        $managerCrew = Role::firstOrCreate(['name' => 'Gestionnaire Équipage']);
        $managerCrew->givePermissionTo('crew.manage');

        $managerTech = Role::firstOrCreate(['name' => 'Gestionnaire Technologies']);
        $managerTech->givePermissionTo('technologies.manage');

        $admin = Role::firstOrCreate(['name' => 'Administrateur']);
        $admin->syncPermissions($perms);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer les permissions
        $permissions = [
            'manage users',
            'manage inventory',
            'view inventory',
            'create orders',
            'view orders',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer les rôles et leur assigner des permissions
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        $employeeRole = Role::create(['name' => 'employee']);
        $employeeRole->givePermissionTo(['view inventory', 'create orders', 'view orders']);

        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view inventory', 'view orders']);
    }
}

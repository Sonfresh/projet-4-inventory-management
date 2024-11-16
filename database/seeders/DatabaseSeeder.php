<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RolePermissionSeeder::class);

        $admin = User::factory()->create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
        ]);
        $admin->assignRole('admin');

        $employee = User::factory()->create([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
        ]);
        $employee->assignRole('employee');

        $user = User::factory()->create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
        ]);
        $user->assignRole('user');
    }
}

<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Seeders\RolePermissionSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RolePermissionTest extends TestCase
{
    use RefreshDatabase;
    
    public function test_admin_can_manage_users()
    {
        $this->seed(RolePermissionSeeder::class);

        $admin = User::factory()->create();
        $admin->assignRole('admin');

        $this->assertTrue($admin->hasRole('admin'));
        $this->assertTrue($admin->can('manage users'));
    }

    public function test_employee_cannot_manage_users()
    {
        $this->seed(RolePermissionSeeder::class);

        $employee = User::factory()->create();
        $employee->assignRole('employee');

        $this->assertFalse($employee->can('manage users'));
    }

    public function test_user_can_view_inventory()
    {
        $this->seed(RolePermissionSeeder::class);
        
        $user = User::factory()->create();
        $user->assignRole('user');

        $this->assertTrue($user->can('view inventory'));
        $this->assertFalse($user->can('manage inventory'));
    }
}

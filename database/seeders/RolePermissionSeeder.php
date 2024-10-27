<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run()
    {
        // Clear cache to avoid permission conflicts
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1. Create Permissions
        $permissions = [
            'create requisitions',
            'view requisitions',
            'approve requisitions',
            'reject requisitions',
            'manage users'
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // 2. Create Roles and Assign Permissions
        $superAdminRole = Role::firstOrCreate(['name' => 'SuperAdmin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $staffRole = Role::firstOrCreate(['name' => 'Staff']);

        // Assign all permissions to SuperAdmin
        $superAdminRole->syncPermissions(Permission::all());

        // Assign specific permissions to Admin
        $adminRole->syncPermissions([
            'view requisitions',
            'approve requisitions',
            'reject requisitions',
        ]);

        // Assign basic permissions to Staff
        $staffRole->syncPermissions([
            'create requisitions',
            'view requisitions',
        ]);

        // 3. Create Users and Assign Roles
        $superAdmin = User::firstOrCreate(
            ['email' => 'superadmin@ilabafrica.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('password'), // Change this to a secure password
            ]
        );
        $superAdmin->assignRole($superAdminRole);

        $admin = User::firstOrCreate(
            ['email' => 'admin@ilabafrica.com'],
            [
                'name' => 'Admin User',
                'password' => Hash::make('password'),
            ]
        );
        $admin->assignRole($adminRole);

        $staff = User::firstOrCreate(
            ['email' => 'staff@ilabafrica.com'],
            [
                'name' => 'Staff User',
                'password' => Hash::make('password'),
            ]
        );
        $staff->assignRole($staffRole);

        // Output success message to console
        $this->command->info('Roles, permissions, and users have been seeded successfully.');
    }
}

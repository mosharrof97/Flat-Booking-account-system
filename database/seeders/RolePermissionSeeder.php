<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Permissions
        // Permission::create(['name' => 'view']);
        // Permission::create(['name' => 'create']);
        // Permission::create(['name' => 'update']);
        // Permission::create(['name' => 'delete']);

        Permission::create(['name' => 'view role', 'guard_name' => 'web',]);
        Permission::create(['name' => 'create role', 'guard_name' => 'web',]);
        Permission::create(['name' => 'update role', 'guard_name' => 'web',]);
        Permission::create(['name' => 'delete role', 'guard_name' => 'web',]);

        Permission::create(['name' => 'view permission', 'guard_name' => 'web',]);
        Permission::create(['name' => 'create permission', 'guard_name' => 'web',]);
        Permission::create(['name' => 'update permission', 'guard_name' => 'web',]);
        Permission::create(['name' => 'delete permission', 'guard_name' => 'web',]);

        Permission::create(['name' => 'view employee', 'guard_name' => 'web',]);
        Permission::create(['name' => 'create employee', 'guard_name' => 'web',]);
        Permission::create(['name' => 'update employee', 'guard_name' => 'web',]);
        Permission::create(['name' => 'delete employee', 'guard_name' => 'web',]);

        Permission::create(['name' => 'view project', 'guard_name' => 'web',]);
        Permission::create(['name' => 'create project', 'guard_name' => 'web',]);
        Permission::create(['name' => 'update project', 'guard_name' => 'web',]);
        Permission::create(['name' => 'delete project', 'guard_name' => 'web',]);


        // Create Roles
        $superAdminRole = Role::create(['name' => 'super-admin']); //as super-admin
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $userRole = Role::create(['name' => 'user']);

        // Lets give all permission to super-admin role.
        $allPermissionNames = Permission::pluck('name')->toArray();

        $superAdminRole->givePermissionTo($allPermissionNames);

        // Let's give few permissions to admin role.
        $adminRole->givePermissionTo(['create role', 'view role', 'update role']);
        $adminRole->givePermissionTo(['create permission', 'view permission']);
        $adminRole->givePermissionTo(['create user', 'view user', 'update user']);
        $adminRole->givePermissionTo(['create product', 'view product', 'update product']);


        // Let's Create User and assign Role to it.

        $superAdminUser = User::firstOrCreate([
                    'email' => 'superadmin@gmail.com',
                ], [
                    'name' => 'Super Admin',
                    'phone' => '01774656830',
                    'email' => 'superadmin@gmail.com',
                    'designation' => 'Super Admin',
                    'password' => Hash::make ('12345678'),
                ]);

        $superAdminUser->assignRole($superAdminRole);


        $adminUser = User::firstOrCreate([
                            'email' => 'admin@gmail.com'
                        ], [
                            'name' => 'Admin',
                            'phone' => '01774656830',
                            'email' => 'admin@gmail.com',
                            'designation' => 'Admin',
                            'password' => Hash::make ('12345678'),
                        ]);

        $adminUser->assignRole($adminRole);


        $staffUser = User::firstOrCreate([
                            'email' => 'staff@gmail.com',
                        ], [
                            'name' => 'Staff',
                            'phone' => '01774656833',
                            'email' => 'staff@gmail.com',
                            'designation' => 'Staff',
                            'password' => Hash::make('12345678'),
                        ]);

        $staffUser->assignRole($staffRole);
    }
}

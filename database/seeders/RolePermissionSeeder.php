<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage categories',
            'manage company',
            'manage jobs',
            'manage candidates',
            'apply job',
        ];

        foreach($permissions as $permission){
            Permission::firstOrCreate([
                'name' => $permission
            ]);
        }

        // super admin
        $superAdminRole = Role::firstOrCreate([
            'name' => 'super_admin'
        ]);

        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'occupation' => 'superadmin',
            'experience' => 50,
            'avatar' => 'images/default-avatar.png',
            'password' => Hash::make('password'),
        ]);

        $user->assignRole($superAdminRole);
        // super admin

        // employer
        $employerRole = Role::firstOrCreate([
            'name' => 'employer'
        ]);

        $employerPermissions = [
            'manage company',
            'manage jobs',
            'manage candidates',
        ];

        $employerRole->syncPermissions($employerPermissions);
        // employer

        // employee
        $employeeRole = Role::firstOrCreate([
            'name' => 'employee'
        ]);

        $employeePermissions = [
            'apply job',
        ];

        $employeeRole->syncPermissions($employeePermissions);
        // employee
    }
}

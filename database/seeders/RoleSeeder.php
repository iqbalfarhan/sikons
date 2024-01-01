<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            "superadmin",
            "admin",
            "petugas",
            "guest",
        ];
        foreach ($roles as $role) {
            Role::updateOrCreate(['name' => $role]);
        }

        $permissions = [
            'user.index' => ['admin'],
            'user.create' => ['admin'],
            'user.edit' => ['admin'],
            'user.delete' => ['admin'],
            'profile' => "*",
            'home' => "*",
        ];

        foreach ($permissions as $permit => $roles) {
            $permission = Permission::updateOrCreate(['name' => $permit]);
            if ($roles == "*") {
                foreach (Role::pluck('name') as $role) {
                    $permission->assignRole($role);
                }
            }
            else{
                foreach ($roles as $role) {
                    $permission->assignRole($role);
                }
            }
        }
    }
}

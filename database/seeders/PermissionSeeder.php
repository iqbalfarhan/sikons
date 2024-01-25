<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'user.index' => ['admin'],
            'user.create' => ['admin'],
            'user.edit' => ['admin'],
            'user.delete' => ['admin'],
            'user.password' => ['admin'],

            'lokasi.index' => ['admin'],
            'lokasi.create' => ['admin'],
            'lokasi.edit' => ['admin'],
            'lokasi.delete' => ['admin'],

            'laporan.summary' => ['admin', 'petugas', 'pengawas'],
            'laporan.index' => ['admin', 'petugas', 'guest'],
            'laporan.search' => ['admin', 'petugas', 'guest'],
            'laporan.mine' => ['admin', 'petugas'],
            'laporan.create' => ['admin', 'petugas'],
            'laporan.listrik' => ['admin', 'petugas'],
            'laporan.edit' => ['admin', 'petugas'],
            'laporan.delete' => ['admin', 'petugas'],
            'laporan.show' => ['admin', 'petugas'],

            'profile' => "*",
            'home' => "*",
            'kwhmeter' => "*",
            'lembur' => ["admin", "petugas"],
            'simaru' => ["admin", "petugas"],
        ];

        foreach ($permissions as $permit => $roles) {
            $permission = Permission::updateOrCreate(['name' => $permit]);

            if ($roles === "*") {
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

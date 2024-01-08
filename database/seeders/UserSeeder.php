<?php

namespace Database\Seeders;

use App\Models\Datel;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate([
            'username' => 'iqbal',
        ], [
            'name' => 'Iqbal Farhan Syuhada',
            'password' => Hash::make('adminoke'),
            'datel_id' => Datel::first()->id
        ]);
        $user->assignRole('superadmin');
    }
}

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
        User::create([
            'name' => 'Iqbal Farhan Syuhada',
            'username' => 'iqbal',
            'password' => Hash::make('adminoke'),
            'datel_id' => Datel::first()->id
        ]);
    }
}

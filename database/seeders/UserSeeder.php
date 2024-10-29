<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => env('ADMIN_NAME', 'Admin User'),
            'email' => env('ADMIN_EMAIL', 'admin@example.com'),
            'password' => Hash::make(env('ADMIN_PASSWORD', 'password')),
        ]);
    }
}

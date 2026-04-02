<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if admin user already exists to avoid duplicates
        if (! User::where('email', 'pierre.bultez@proton.me')->exists()) {
            User::create([
                'name' => 'Pierre Bultez',
                'email' => 'pierre.bultez@proton.me',
                'password' => Hash::make('NMg0$S^aeh7&HKp4ua4^QrbP'),
                'email_verified_at' => now(),
            ]);
        }
    }
}

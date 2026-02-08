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
        User::updateOrCreate(
            ['email' => 'mrmelhay@gmail.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('B!smillah'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }
}

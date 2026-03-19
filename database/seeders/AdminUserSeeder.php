<?php

namespace Database\Seeders;

use App\Models\User;
use App\UserRole;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@hmi.com'],
            [
                'name' => 'Superadmin HMI',
                'password' => '1',
                'role' => UserRole::SUPERADMIN,
                'email_verified_at' => now(),
            ],
        );

        User::updateOrCreate(
            ['email' => 'admin@hmi.com'],
            [
                'name' => 'Admin HMI',
                'password' => '1',
                'role' => UserRole::ADMIN,
                'email_verified_at' => now(),
            ],
        );
    }
}

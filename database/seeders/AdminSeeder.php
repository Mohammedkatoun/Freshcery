<?php

namespace Database\Seeders;

use App\Models\Admin\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run(): void
    {
        $email = env('ADMIN_SEED_EMAIL', 'admin@freshcery.test');
        $password = env('ADMIN_SEED_PASSWORD', 'admin12345');

        Admin::firstOrCreate(
            ['email' => $email],
            [
                'name' => env('ADMIN_SEED_NAME', 'Admin'),
                'password' => Hash::make($password),
            ]
        );
    }
}


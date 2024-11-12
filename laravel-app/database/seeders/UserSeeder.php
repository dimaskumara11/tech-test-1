<?php

namespace Database\Seeders;

use App\Models\User;
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
            'user_fullname' => 'Admin User',
            'user_email' => 'admin@example.com',
            'user_status' => '1',
            'user_password' => Hash::make('12345'), // Ganti dengan password yang diinginkan
        ]);
    }
}

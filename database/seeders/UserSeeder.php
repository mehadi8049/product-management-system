<?php

namespace Database\Seeders;

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
            'name' => 'Admin User',
            'email' => 'admin@user.com',
            'password' => Hash::make(12345678),
            'user_type'=>'admin'
        ]);

        User::create([
            'name' => 'Vendor User',
            'email' => 'vendor@user.com',
            'password' => Hash::make(12345678),
            'user_type'=>'vendor'
        ]);

        User::create([
            'name' => 'Customer User',
            'email' => 'customer@user.com',
            'password' => Hash::make(12345678)
        ]);
    }
}

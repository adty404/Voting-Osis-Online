<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role' => 'admin',
            'name' => 'Aditya Prasetyo',
            'email' => 'adty404@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('rahasia'), //secret password
            'remember_token' => str_random(10),
        ]);
    }
}

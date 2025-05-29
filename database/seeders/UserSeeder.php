<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'password' => Hash::make('123')
        ]);

        User::create([
            'name' => 'Jane Doe',
            'email' => 'admin@gmail.com',
            "role" => 'admin',
            'password' => Hash::make('123')
        ]);

           User::create([
            'name' => 'Jane Doe',
            'email' => 'newAdmin@gmail.com',
            "role" => 'admin',
            'password' => Hash::make('123')
        ]);
    }
}

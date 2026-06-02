<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 
use Illuminate\Support\Facades\Hash; 

class UserSeeder extends Seeder
{
     public function run(): void 
    { 
        // Membuat akun admin 
        User::create([ 
            'name'     => 'Administrator', 
            'email'    => 'admin@example.com', 
            'password' => Hash::make('password123'), 
            'role'     => 'admin', 
        ]); 
 
        // Membuat akun user biasa 
        User::create([ 
            'name'     => 'User Biasa', 
            'email'    => 'user@example.com', 
            'password' => Hash::make('password123'), 
            'role'     => 'user', 
        ]); 
    }
}

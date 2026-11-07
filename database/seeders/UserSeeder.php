<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => "admin",
            'email' => "admin@lojainfo.pt",
            'password' => Hash::make('admin'),
            'isAdmin' => true,
        ]);

        DB::table('users')->insert([
            'name' => "client",
            'email' => "client@lojainfo.pt",
            'password' => Hash::make('client'),
            'isAdmin' => false,
        ]);
    }
}

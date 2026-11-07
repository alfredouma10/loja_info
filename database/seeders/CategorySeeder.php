<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            'name' => "Computadores",
        ]);
        DB::table('categories')->insert([
            'name' => "Teclados",
        ]);
        DB::table('categories')->insert([
            'name' => "Ratos",
        ]);
        DB::table('categories')->insert([
            'name' => "Placas Gráficas",
        ]);
    }
}

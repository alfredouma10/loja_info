<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            'Name' => "PC Gamer",
            'Description' => "PC Gamer de última geração preparado para os jogos mais exigentes.",
            'img' => "/img/1.jpg",
            'Cost' => 2990.00,
            'owner_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'Name' => "PC Workstation Pro",
            'Description' => "PC Workstation para um desempenho excelente.",
            'img' => "/img/2.jpg",
            'Cost' => 1990.00,
            'owner_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'Name' => "PC Workstation Pro",
            'Description' => "PC Workstation profissional",
            'img' => "/img/3.jpg",
            'Cost' => 990.00,
            'owner_id' => 1,
            'category_id' => 1,
        ]);

        DB::table('products')->insert([
            'Name' => "PC Basic",
            'Description' => "PC basico com o melhor beneficio/custo",
            'img' => "/img/4.jpg",
            'Cost' => 490.00,
            'owner_id' => 1,
            'category_id' => 1,
        ]);
    }
}

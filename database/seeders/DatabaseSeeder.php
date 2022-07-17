<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AboutSeeder::class,
            CriteriaSeeder::class,
            UserSeeder::class,
            FoodSeeder::class,
            FoodrecSeeder::class,
            ItemFoodsMenuSeeder::class,
            FoodMenuSeeder::class,
            EventSeeder::class,
            VisitorSeeder::class,
        ]);
    }
}

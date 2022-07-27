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
            EventSeeder::class,
            FoodMenuRecsSeeder::class,
            FoodMenuSeeder::class,
            FoodrecSeeder::class,
            FoodSeeder::class,
            ItemFoodsMenuSeeder::class,
            Itemsfoodmenurecseeder::class,
            ProfilUserSeeder::class,
            UserSeeder::class,
            VisitorSeeder::class,
        ]);
    }
}

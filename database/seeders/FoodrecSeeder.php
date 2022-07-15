<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FoodrecSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
        public function run()
    {
        collect([[
            'name' => 'Dada Ayam 100 gram (g)',
            'calorie' => 195,
            'carb' => 0,
            'fat' => 7.72,
            'protein' => 29.65,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Dada Ayam 100 gram (g)',
            'calorie' => 195,
            'carb' => 0,
            'fat' => 7.72,
            'protein' => 29.65,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Bakso Daging Sapi (1 Mangkok)',
            'calorie' => 283,
            'carb' => 10.61,
            'fat' => 18.43,
            'protein' => 17.37,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Bakso Daging Sapi (1 Besar)',
            'calorie' => 85,
            'carb' => 5.53,
            'fat' => 3.18,
            'protein' => 5.21,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Bakso dengan Saus 100 gram (g)',
            'calorie' => 189,
            'fat' => 12.28,
            'carb' => 0.26,
            'protein' => 18.04,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Bakso dengan Saus 100 gram (g)',
            'calorie' => 189,
            'fat' => 12.28,
            'carb' => 0.26,
            'protein' => 18.04,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Bakso (1 potong)',
            'calorie' => 77,
            'fat' => 4.04,
            'carb' => 7.12,
            'protein' => 3.93,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Bakso 100 gram (g)',
            'calorie' => 192,
            'fat' => 10.1,
            'carb' => 17.8,
            'protein' => 9.84,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Goreng 1 buah',
            'calorie' => 35,
            'fat' => 2.62,
            'carb' => 1.36,
            'protein' => 2.23,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ])->each(function($foods){
            DB::table('foodrecs')->insert($foods);
        });
    }
}

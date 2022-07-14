<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
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
            'name' => 'Dada Ayam Goreng 100 gram (g)',
            'calorie' => 216,
            'carb' => 0,
            'fat' => 9.1,
            'protein' => 31.67,
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
            'name' => 'Bakso dengan Saus (1 mangkok)',
            'calorie' => 444,
            'carb' => 0.61,
            'fat' => 28.86,
            'protein' => 42.39,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Bakso dengan Saus (1 porsi, 176 g)',
            'calorie' => 333,
            'fat' => 21.61,
            'carb' => 0.46,
            'protein' => 31.75,
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
        ],[
            'name' => 'Tahu Goreng 100 gram (g)',
            'calorie' => 34,
            'fat' => 2.28,
            'carb' => 1.79,
            'protein' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe Goreng 1 buah',
            'calorie' => 271,
            'fat' => 20.18,
            'carb' => 10.49,
            'protein' => 17.19,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe Goreng 1 porsi',
            'calorie' => 192,
            'fat' => 12.93,
            'carb' => 10.15,
            'protein' => 11.31,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe rebus 100 gram(g)',
            'calorie' => 196,
            'fat' => 11.38,
            'carb' => 9.35,
            'protein' => 18.19,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe 100 gram(g)',
            'calorie' => 193,
            'fat' => 10.8,
            'carb' => 9.39,
            'protein' => 18.54,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe mendoan 100 gram(g)',
            'calorie' => 200,
            'fat' => 12.78,
            'carb' => 12.69,
            'protein' => 11.18,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tempe mendoan 1 potong',
            'calorie' => 60,
            'fat' => 3.83,
            'carb' => 3.81,
            'protein' => 3.63,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu  100 gram(g)',
            'calorie' => 78,
            'fat' => 4.95,
            'carb' => 2.1,
            'protein' => 7.97,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Goreng  1 buah',
            'calorie' => 35,
            'fat' => 2.62,
            'carb' => 1.36,
            'protein' => 2.23,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Goreng   100 gram(g)',
            'calorie' => 271,
            'fat' => 20.18,
            'carb' => 10.49,
            'protein' => 17.19,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Tahu Goreng   100 gram(g)',
            'calorie' => 271,
            'fat' => 20.18,
            'carb' => 10.49,
            'protein' => 17.19,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Sambal Goreng   1 sdm',
            'calorie' => 15,
            'fat' => 0.41,
            'carb' => 1.56,
            'protein' => 1.37,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Sambal Goreng kentang  100 gram(g)',
            'calorie' => 102,
            'fat' => 3.02,
            'carb' => 10.15,
            'protein' => 8.72,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Sambal Goreng kentang  1 porsi(50 g)',
            'calorie' => 51,
            'fat' => 1.51,
            'carb' => 5.07,
            'protein' => 4.36,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Perkedel kentang 1 potong',
            'calorie' => 21,
            'fat' => 1.12,
            'carb' => 2.48,
            'protein' => 0.46,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'KFC perkedel',
            'calorie' => 105,
            'fat' => 5,
            'carb' => 9.6,
            'protein' => 5.39,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Kuning telur 1 besar',
            'calorie' => 55,
            'fat' => 4.49,
            'carb' => 0.61,
            'protein' => 2.69,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Putih telur 1 besar',
            'calorie' => 17,
            'fat' => 0.69,
            'carb' => 0.24,
            'protein' => 3.69,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Putih telur  100 gram(g)',
            'calorie' => 52,
            'fat' => 0.17,
            'carb' => 0.73,
            'protein' => 3.69,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur ceplok  1 Besar',
            'calorie' => 92,
            'fat' => 7.04,
            'carb' => 0.4,
            'protein' => 6.27,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur Goreng  1 Besar/1 Butir',
            'calorie' => 89,
            'fat' => 6.76,
            'carb' => 0.43,
            'protein' => 6.24,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur Goreng  1 Sedang',
            'calorie' => 78,
            'fat' => 5.88,
            'carb' => 0.37,
            'protein' => 5.42,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur Goreng  1 Kecil',
            'calorie' => 68,
            'fat' => 5.14,
            'carb' => 0.33,
            'protein' => 4.75,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur orak-arik  1 besar/ 1 telur',
            'calorie' => 101,
            'fat' => 7.45,
            'carb' => 1.34,
            'protein' => 6.76,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur dadar  1 besar/1 telur',
            'calorie' => 98,
            'fat' => 7.14,
            'carb' => 1.15,
            'protein' => 6.81,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Telur dadar  1 sedang',
            'calorie' => 88,
            'fat' => 6.45,
            'carb' => 1.04,
            'protein' => 6.15,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Sate Ayam 1 tusuk',
            'calorie' => 34,
            'fat' => 2.22,
            'carb' => 0.73,
            'protein' => 2.93,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Sate padang 1 tusuk',
            'calorie' => 24,
            'fat' => 0.99,
            'carb' => 1.02,
            'protein' => 2.7,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Daging sapi 100 gram(g)',
            'calorie' => 228,
            'fat' => 19.54,
            'carb' => 0,
            'protein' => 26.33,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Daging Ayam 100 gram(g)',
            'calorie' => 167,
            'fat' => 6.63,
            'carb' => 0,
            'protein' => 25.01,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Burger daging ayam',
            'calorie' => 230,
            'fat' => 12,
            'carb' => 16,
            'protein' => 14,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Pisang Sedang (18-20 cm)',
            'calorie' => 105,
            'fat' => 0.39,
            'carb' => 26.95,
            'protein' => 1.29,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Pisang Kecil (15-17.5 cm)',
            'calorie' => 90,
            'fat' => 0.33,
            'carb' => 23.07,
            'protein' => 1.1,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Mangga',
            'calorie' => 107,
            'fat' => 0.45,
            'carb' => 28.05,
            'protein' => 0.84,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Jeruk 1 buah',
            'calorie' => 62,
            'fat' => 0.16,
            'carb' => 15.39,
            'protein' => 1.23,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Stawberi 100 gram(g)',
            'calorie' => 32,
            'fat' => 0.3,
            'carb' => 7.68,
            'protein' => 0.67,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Ultra Milk Susu UHT Rasa Stroberi 1 Kotak (200 ml)',
            'calorie' => 140,
            'fat' => 3.5,
            'carb' => 22,
            'protein' => 6,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Ultra Milk Susu UHT Rasa Moka 1 Kotak (200 ml)',
            'calorie' => 140,
            'fat' => 3.5,
            'carb' => 21,
            'protein' => 7,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Ultra Milk Susu Full Cream 1 Kotak (250 ml)',
            'calorie' => 120,
            'fat' => 6,
            'carb' => 9,
            'protein' => 6,
            'created_at' => now(),
            'updated_at' => now(),
            
        ]
        ])->each(function($foods){
            DB::table('foods')->insert($foods);
        });
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([[
            'name' => 'Calorie',
            'value' => 0,
            'keterangan' => 'Kalori Makanan',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Carb',
            'value' => 0,
            'keterangan' => 'Karbohidrat Makanan',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Fat',
            'value' => 0,
            'keterangan' => 'Lemak Makanan',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Protein',
            'value' => 0,
            'keterangan' => 'Protein Makanan',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ])->each(function($criteria){
            DB::table('criterias')->insert($criteria);
        });
    }
}

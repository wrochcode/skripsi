<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([[
            'name' => 'Juni',
            'value' => 'Pelajar discount 50%',
            'describe' => 'event Juni',
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'Juli',
            'value' => 'Get member, one day free',
            'describe' => 'Event Juni',
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ])->each(function($data){
            DB::table('events')->insert($data);
        });
    }
}

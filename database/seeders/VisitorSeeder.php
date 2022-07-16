<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VisitorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([[
            'responsibility' => 'admin2',
            'day' => '2022-07-1',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-2',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-3',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-4',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-5',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-6',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-7',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-8',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-9',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-10',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-11',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-12',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-13',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-14',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'responsibility' => 'admin2',
            'day' => '2022-07-15',
            'visitor' => 45,
            'student' => 3,
            'reguler' => 42,
            'money' => 351,
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ])->each(function($user){
            DB::table('visitors')->insert($user);
        });
    }
}

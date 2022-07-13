<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([[
            'name' => 'admin1',
            'username' => 'admin1',
            'email' => 'admin1@gmail.com',
            'role' => '1',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'admin2',
            'username' => 'admin2',
            'email' => 'admin2@gmail.com',
            'role' => '2',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ],[
            'name' => 'user',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'role' => '3',
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]
        ])->each(function($user){
            DB::table('users')->insert($user);
        });
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
          
            'name' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '111',
        ]);

        DB::table('users')->insert([
      
            'name' => 'stocker',
            'password' => Hash::make('password'),
            'role' => 'stocker',
            'phone' => '222',
        ]);

        DB::table('users')->insert([
       
            'name' => 'sub-admin',
            'password' => Hash::make('password'),
            'role' => 'sub-admin',
            'phone' => '333',
        ]);

        DB::table('users')->insert([
            'name' => 'expense',
            'password' => Hash::make('password'),
            'role' => 'expense',
            'phone' => '444',
        ]);
    }
}

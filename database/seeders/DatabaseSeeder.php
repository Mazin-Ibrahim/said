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
            'email' => 'admin@app.com',
            'name' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'admin',
            'phone' => '111',
        ]);

        DB::table('users')->insert([
            'email' => 'stocker@app.com',
            'name' => 'stocker',
            'password' => Hash::make('password'),
            'role' => 'stocker',
            'phone' => '222',
        ]);

        DB::table('users')->insert([
            'email' => 'sub-admin@app.com',
            'name' => 'sub-admin',
            'password' => Hash::make('password'),
            'role' => 'sub-admin',
            'phone' => '333',
        ]);

        DB::table('users')->insert([
            'email' => 'cashier@app.com',
            'name' => 'cashier',
            'password' => Hash::make('password'),
            'role' => 'cashier',
            'phone' => '444',
        ]);

        





    }
}

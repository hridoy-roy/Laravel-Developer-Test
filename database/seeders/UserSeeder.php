<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => "Admin",
            'email' => 'admin@gmail.com',
            'phone' => '01777-8888999',
            'status' => true,
            'type' => 'admin',
            'password' => Hash::make('12345678'),
        ]);
        DB::table('users')->insert([
            'name' => "user",
            'email' => 'user@gmail.com',
            'phone' => '01777-8888990',
            'status' => true,
            'type' => 'user',
            'password' => Hash::make('12345678'),
        ]);
    }
}

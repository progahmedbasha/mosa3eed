<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
         DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'user_type_id' => '1',
            'district_id' => '1',
            
        ]);
        DB::table('users')->insert([
            'name' => 'mosa3eed',
            'email' => 'mosa3eed@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'user_type_id' => '2',
            'district_id' => '1',
        ]);
        DB::table('users')->insert([
            'name' => 'owner',
            'email' => 'owner@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'user_type_id' => '3',
            'district_id' => '1',
        ]);
            DB::table('users')->insert([
            'name' => 'org',
            'email' => 'org@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'user_type_id' => '4',
            'district_id' => '1',
        ]);
         DB::table('users')->insert([
            'name' => 'branch',
            'email' => 'branch@gmail.com',
            'password' => Hash::make('12345678'),
            'phone' => '123456789',
            'user_type_id' => '5',
            'district_id' => '1',
        ]);
    }
}

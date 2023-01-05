<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsertypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('user_types')->insert([
            'type' => 'admin',
        ]);
           DB::table('user_types')->insert([
            'type' => 'Mosa3ed admin',
        ]);
          DB::table('user_types')->insert([
            'type' => 'Owner Admin',
        ]);
           DB::table('user_types')->insert([
            'type' => 'Organization Admin',
        ]);
       
          DB::table('user_types')->insert([
            'type' => 'Branch admin',
        ]);
    }
}

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
            'type' => 'Pharmacy Admin',
        ]);
           DB::table('user_types')->insert([
            'type' => 'Branch Admin',
        ]);
       
          DB::table('user_types')->insert([
            'type' => 'supplier admin',
        ]);
    }
}

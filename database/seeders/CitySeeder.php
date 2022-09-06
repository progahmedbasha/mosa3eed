<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('cities')->insert([
            'name_en' => 'cairo',
            'name_ar' => 'القاهره',
            'country_id' => '1',
        ]);
    }
}

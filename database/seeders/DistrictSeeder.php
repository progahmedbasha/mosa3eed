<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('districts')->insert([
            'name' => '{"en":"Bab Elshaareya","ar":"\u0628\u0627\u0628 \u0627\u0644\u0634\u0639\u0631\u064a\u0647"}',
            'city_id' => '1',
        ]);
    }
}

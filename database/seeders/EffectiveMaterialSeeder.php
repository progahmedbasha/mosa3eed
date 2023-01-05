<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EffectiveMaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('effective_materials')->insert([
            'name' => '{"en":"mada_fa3ala 1","ar":"مارده فعاله 1"}',
        ]);
    }
}

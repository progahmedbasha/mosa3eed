<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MedicinShapeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('medicin_shapes')->insert([
            'name' => '{"en":"cream","ar":"كريم"}',
        ]);
    }
}

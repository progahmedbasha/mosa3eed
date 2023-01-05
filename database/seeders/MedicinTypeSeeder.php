<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MedicinTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('medicin_types')->insert([
            'type' => '{"en":"comotics","ar":"comotics"}',
        ]);
    }
}

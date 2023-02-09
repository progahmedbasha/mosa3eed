<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MedicinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('medicins')->insert([
            'name' => '{"en":"medicin 1","ar":"medicin 1"}',
            'barcode' => '1',
            'producing_company' => 'Al motahida',
            'description' => 'description',
            'unit_id' => 1,
        ]);
    }
}
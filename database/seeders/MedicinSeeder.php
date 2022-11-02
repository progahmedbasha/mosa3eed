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
            'barcode' => '1',   
            'name' => '{"en":"medicin 1","ar":"medicin 1"}',
            'price' => '10',
        ]);
    }
}

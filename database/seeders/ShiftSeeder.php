<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('shifts')->insert([
            'name' => '{"en":"shift1","ar":"shift1"}',
            'from' => '1',
            'to' => '2',
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ShiftDaysSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('shift_days')->insert([
            'branch_shift_id' => 1,
            'day' => 'Satarday',
            'from' => '123123',
            'to' => '121212',
        ]);
    }
}

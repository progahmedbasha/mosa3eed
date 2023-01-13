<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BranchShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('branch_shifts')->insert([
            'name' => 'Shift 1',
            'branch_id' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UserBranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('user_branches')->insert([
            'user_id' => 5,
            'organization_id' => 1,
            'branch_id' => 1,
            'branch_shift_id' => 1,
        ]);
    }
}
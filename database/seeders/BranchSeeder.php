<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('branches')->insert([
            'name' => '{"en":"branch 1","ar":"branch 1"}',
            'phone_1' => '01094980688',
            'phone_2' => '01094980688',
            'email' => 'email@gmail.com',
            'organization_id' => '1',
            'district_id' => '1',
            'address' => 'address',
        ]);
    }
}

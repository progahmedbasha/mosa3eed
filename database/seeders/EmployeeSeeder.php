<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('employees')->insert([
            'name' => 'Ahmed Hussein',
            'phone' => '01094980633',
            'organization_id' => '1',
            'branch_id' => '1',
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JobPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('job_posts')->insert([
            'subject' => 'My Subject',
            'job_title_id' => '1',
            'organization_id' => '1',
            'branch_id' => '1',
            'district_id' => '1',
            'breif' => 'breif',
            'experince' => '2',
            'status' => 'Active',
            'expected_salary' => '1000',
            'email_contract' => 'email@gmail.com',
            'phone_contract' => '010101021211',
            'created_at' => '2022-10-23 00:00:00'
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrganizationAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('organization_admins')->insert([
            'organization_id' => 1,
            'user_id' => 2,
            'type' => 'Organization Admin'
        ]);
    }
}
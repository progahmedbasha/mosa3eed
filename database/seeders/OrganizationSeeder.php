<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('organizations')->insert([
            'name' => '{"en":"ezaby pharmacy","ar":"\u0635\u064a\u062f\u0644\u064a\u0629 \u0627\u0644\u0639\u0632\u0628\u064a"}',
            'contact_name' => 'contact name here',
            'phone' => '01029383828',
            'email' => 'pharmacy@gmail.com',
            'district_id' => '1',
            'address' => 'address here',
            'address' => 'address',
            'type' => 'pharmacy',
            'status' => 'Verified',
        ]);
    }
}

<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JobTitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('job_titles')->insert([
            'name' => '{"en":"job moderator","ar":"job moderator"}',
            'related_to' => 'Pharmacy',
        ]);
    }
}

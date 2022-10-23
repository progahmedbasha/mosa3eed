<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ApplyJobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('apply_jobs')->insert([
            'user_id' => '1',
            'job_post_id' => '1',
            'cv_attachment' => 'Technical forms - admin side.pdf',
            'created_at' => '2022-10-23 00:00:00'
             ]);
    }
}

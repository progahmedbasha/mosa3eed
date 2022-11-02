<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class TimelinePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('timeline_posts')->insert([
            'user_id' => '3',
            'post' => 'post 1',
            'status' => 'Active',
            'created_at'  => '2022-10-30 14:40:58',
        ]);
    }
}

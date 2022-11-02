<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostLikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
           
        DB::table('post_likes')->insert([
            'user_id' => '1',
            'timeline_post_id' => '1',
            'created_at' => '2022-10-23 00:00:00'
        ]);
    }
}

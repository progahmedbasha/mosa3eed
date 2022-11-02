<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PostCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         
               DB::table('post_comments')->insert([
                'user_id' => '1',
                'timeline_post_id' => '1',
                'comment' => 'coment 1',
                'status' => 'Active',
                'created_at' => '2022-10-23 00:00:00'
        ]);
    }
}

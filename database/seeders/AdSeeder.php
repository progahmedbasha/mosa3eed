<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('ads')->insert([
            'title' => 'Here are many variati of passages of Lorem',
            'link' => 'http/link',
            'created_at' => '2022-12-12 13:03:19',
        ]);
    }
}

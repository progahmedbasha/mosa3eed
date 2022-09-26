<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class MissedItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('missed_items')->insert([
            'user_id' => 1,
            'branch_id' => 1,
            'medicin_id' => 1,
            'status' => 'Active',
        ]);
    }
}

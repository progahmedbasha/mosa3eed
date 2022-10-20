<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
         $this->call([
        UsertypeSeeder::class,
        CountrySeeder::class,
        CitySeeder::class,
        DistrictSeeder::class,
        OrganizationSeeder::class,
        UserSeeder::class,
        BranchSeeder::class,
        MedicinSeeder::class,
        MissedItemSeeder::class,
        JobTitleSeeder::class,
        SettingSeeder::class,
        JobPostSeeder::class,
    ]);
    }
}

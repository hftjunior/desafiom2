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
        $this->call([
            CampaignsSeeder::class,
            GroupsSeeder::class,
            CitiesSeeder::class,
            ProductsSeeder::class,
            ProductHasCampaignsSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductHasCampaignsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_has_campaigns')->insert([
            'product_id' => 1,
            'campaign_id' => 1,
            'discont' => 0.20
        ]);
    }
}

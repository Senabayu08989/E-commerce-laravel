<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ProductSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            [
                'name' => 'Oppo Mobile',
                'price'=> '10000',
                'category' => 'Mobile',
                'desc' => 'Opp Mobile',
                'gallery' => 'https://5.imimg.com/data5/WG/ZM/TG/ANDROID-98089178/product-jpeg-500x500.jpg'   
            ],
            [
                'name' => 'Panasonic Tv',
                'price'=> '10000',
                'category' => 'TV',
                'desc' => 'TV',
                'gallery' => 'https://d2pa5gi5n2e1an.cloudfront.net/webp/global/images/product/tvs/Panasonic_VIERA_32_in_TH_32E302/Panasonic_VIERA_32_in_TH_32E302_L_1.jpg'   
            ]

        ]);
    }
}

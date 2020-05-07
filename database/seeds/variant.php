<?php

use Illuminate\Database\Seeder;

class variant extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('variant')->delete();
        DB::table('variant')->insert([
            ['variant_id'=>1,'variant_price'=>100000,'product_id'=>1],
            ['variant_id'=>2,'variant_price'=>200000,'product_id'=>1],

            ['variant_id'=>3,'variant_price'=>300000,'product_id'=>2],
            ['variant_id'=>4,'variant_price'=>400000,'product_id'=>2],

            ['variant_id'=>5,'variant_price'=>500000,'product_id'=>3],
            ['variant_id'=>6,'variant_price'=>600000,'product_id'=>3],

            ['variant_id'=>7,'variant_price'=>700000,'product_id'=>4],
            ['variant_id'=>8,'variant_price'=>800000,'product_id'=>4],

            ['variant_id'=>9,'variant_price'=>900000,'product_id'=>5],
            ['variant_id'=>10,'variant_price'=>1000000,'product_id'=>5],
          
        ]);      
    }
}

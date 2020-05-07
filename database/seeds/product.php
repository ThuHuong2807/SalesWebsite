<?php

use Illuminate\Database\Seeder;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product')->delete();
        DB::table('product')->insert([
            ['product_id'=>1,'product_code'=>'SP01','product_featured'=>'0','product_name'=>'Áo nam da thật MX105','product_slug'=>str_slug('Áo nam da thật MX105'),'product_price'=>500000,'product_state'=>1,'product_img'=>'no-img.jpg','category_id'=>2],
            ['product_id'=>2,'product_code'=>'SP02','product_featured'=>'1','product_name'=>' Áo Thun Có Cổ','product_slug'=>str_slug('Áo Thun Có Cổ'),'product_price'=>500000,'product_state'=>0,'product_img'=>'no-img.jpg','category_id'=>2],
            ['product_id'=>3,'product_code'=>'SP03','product_featured'=>'1','product_name'=>'Quần âu nam Prazenta I-QAM61','product_slug'=>str_slug('Quần âu nam Prazenta I-QAM61'),'product_price'=>500000,'product_state'=>1,'product_img'=>'no-img.jpg','category_id'=>3],
            ['product_id'=>4,'product_code'=>'SP04','product_featured'=>'1','product_name'=>'Áo nữ cổ V viền tay xinh xắn','product_slug'=>str_slug('Áo nữ cổ V viền tay xinh xắn'),'product_price'=>500000,'product_state'=>1,'product_img'=>'no-img.jpg','category_id'=>6],
            ['product_id'=>5,'product_code'=>'SP05','product_featured'=>'1','product_name'=>'Quần Nữ Suông Ống Rộng','product_slug'=>str_slug('Quần Nữ Suông Ống Rộng'),'product_price'=>500000,'product_state'=>1,'product_img'=>'no-img.jpg','category_id'=>7],
        ]);
    }
}

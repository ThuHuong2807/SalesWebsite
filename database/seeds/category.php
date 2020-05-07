<?php

use Illuminate\Database\Seeder;

class category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoá toàn bộ dữ liệu trong bảng trước khi tạo dữ liệu mẫu
        DB::table('category')->delete();
        DB::table('category')->insert([
            ['category_id'=>1,'category_name'=>'Nam','category_slug'=>str_slug('Nam'),'category_parent'=>0],
            ['category_id'=>2,'category_name'=>'Áo Nam','category_slug'=>str_slug('Áo Nam'),'category_parent'=>1],
            ['category_id'=>3,'category_name'=>'Quần Nam','category_slug'=>str_slug('Quần Nam'),'category_parent'=>1],
            ['category_id'=>4,'category_name'=>'Áo Nam 2018','category_slug'=>str_slug('Áo Nam 2018'),'category_parent'=>2],
            ['category_id'=>5,'category_name'=>'Nữ','category_slug'=>str_slug('Nữ'),'category_parent'=>0],
            ['category_id'=>6,'category_name'=>'Áo Nữ','category_slug'=>str_slug('Áo Nữ'),'category_parent'=>5],
            ['category_id'=>7,'category_name'=>'Quần Nữ','category_slug'=>str_slug('Quần Nữ'),'category_parent'=>5]
        ]);
    }
}

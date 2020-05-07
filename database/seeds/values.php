<?php

use Illuminate\Database\Seeder;

class values extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('values')->delete();
        DB::table('values')->insert([
            ['values_id'=>1,'values_value'=>'S','attr_id'=>1],
            ['values_id'=>2,'values_value'=>'M','attr_id'=>1],
            ['values_id'=>3,'values_value'=>'L','attr_id'=>1],
            ['values_id'=>4,'values_value'=>'Đỏ','attr_id'=>2],
            ['values_id'=>5,'values_value'=>'Xanh','attr_id'=>2],
            ['values_id'=>6,'values_value'=>'Đen','attr_id'=>2],
        ]);
    }
}

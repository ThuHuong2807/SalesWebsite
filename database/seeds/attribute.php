<?php

use Illuminate\Database\Seeder;

class attribute extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attribute')->delete();
        DB::table('attribute')->insert([
            ['attribute_id'=>1,'attribute_name'=>'Size'],
            ['attribute_id'=>2,'attribute_name'=>'color'],
        ]);
    }
}

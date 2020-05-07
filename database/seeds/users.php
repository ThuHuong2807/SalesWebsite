<?php

use Illuminate\Database\Seeder;

class users extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //xoá toàn bộ dữ liệu trong bảng trước khi tạo dữ liệu mẫu
        DB::table('users')->delete();
        DB::table('users')->insert([
            ['user_id'=>1,'user_email'=>'admin@gmail.com','user_password'=>bcrypt('123456'),'user_name'=>'truongminh','user_address'=>'Thường tín','user_phone'=>'0356653301','user_level'=>1],
            ['user_id'=>2,'user_email'=>'truongminh1@gmail.com','user_password'=>bcrypt('123456'),'user_name'=>'truong minh1','user_address'=>'Bắc giang','user_phone'=>'0356654487','user_level'=>2],
            ['user_id'=>3,'user_email'=>'truongminh2@gmail.com','user_password'=>bcrypt('123456'),'user_name'=>'truong minh2','user_address'=>'Huế','user_phone'=>'0352264487','user_level'=>1],
            ['user_id'=>4,'user_email'=>'truongminh3@gmail.com','user_password'=>bcrypt('123456'),'user_name'=>'truong minh3','user_address'=>'Nghệ An','user_phone'=>'0357846659','user_level'=>2],
        ]);
    }
}

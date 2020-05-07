<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\registered;

class RegisteredController extends Controller
{
    public function GetRegistered()
    {
        $data['registered']=registered::all();
         return  view('backend.registered.listregistered',$data);
    }
    public function PostAddRegistered(request $request)
    {
        
        $registered=new registered;
        $registered->users_registered_email=$request->users_registered_email;
        $registered->save();
        return  redirect()->back()->with('thongbao','Cảm Ơn Bạn Đã Quan Tâm Đến Sản Phẩm Của Chúng Tôi, Hân Hạnh Được Phục Vụ Quý Khách');
    }
    public function DeleteRegistered($users_registered_id)
    {
        registered::destroy($users_registered_id);
        return  redirect()->back()->with('thongbao','xóa thành công');
    }
}

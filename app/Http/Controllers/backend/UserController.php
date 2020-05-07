<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AddUserRequest;
use App\Http\Requests\EditUserRequest;

use App\models\Users;

class UserController extends Controller
{
    public function ListUser()
    { 
        $data['users']=Users::paginate(3);
        return view('backend.user.listuser',$data);
    }
    public function AddUser()
    {
        return view('backend.user.adduser');
    }
    public function PostAddUser(AddUserRequest $request)
    { 
        $user = new Users; 
        $user ->user_email=$request->user_email;
        $user ->user_password=bcrypt($request->user_password);
        $user ->user_name=$request->user_name;
        $user ->user_address=$request->user_address;
        $user ->user_phone=$request->user_phone;
        $user ->user_level=$request->user_level;
        $user ->save();
        return redirect('admin/user')->withInput()->with('thongbao','Đã thêm thanh viên thành công!');
    }
    public function EditUser($user_id)
    { 
        $data['user']=Users::find($user_id);
        return view('backend.user.edituser',$data);
    }
    public function PostEditUser(EditUserRequest $request,$user_id)
    { 
        $user =Users::find($user_id);
        $user ->user_email=$request->user_email;
        if ($request->user_password!=null) {
            $user ->user_password=$request->user_password;
        }
        $user ->user_name=$request->user_name;
        $user ->user_address=$request->user_address;
        $user ->user_phone=$request->user_phone;
        $user ->user_level=$request->user_level;
        $user ->save();
        return redirect('admin/user')->with('thongbao','đã sửa thành công');     
    }
    public function  DeleteUser($user_id)
    {
        Users::destroy($user_id);
        return redirect('admin/user')->with('thongbao','Đã xoá thành công!');
    }

}

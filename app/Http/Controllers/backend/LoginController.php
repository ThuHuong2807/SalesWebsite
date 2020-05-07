<?php

namespace App\Http\Controllers\backend;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\models\{users};

class LoginController extends Controller
{
    public function GetLogin()
    {
       return view('backend.login.login');
    }
    public function PostLogin(LoginRequest $request)
    {
        if (Auth::attempt(['user_email'=>$request->email,'password'=>$request->password]))
        {
        return redirect ('admin');
        }
        else{
            return redirect()->back()->withInput()->with('login','Tài khoản hoặc mật khẩu sai');
        }      
    }
    public function LogOut()
    {
        Auth::logout();
        return redirect('login');
    }
}

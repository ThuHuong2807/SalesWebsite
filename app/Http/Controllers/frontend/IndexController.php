<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\product;

class IndexController extends Controller
{
    public function GetIndex()
    {
        $data['products']=product::orderby('created_at','DESC')->take(8)->get();
        return view('frontend.index',$data);
    }
    public function GetAbout()
    {
        return view('frontend.about');
    }
    public function GetContact()
    {
        return view('frontend.contact');
    }

}

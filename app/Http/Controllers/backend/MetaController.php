<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,meta};
class MetaController extends Controller
{
    public function GetListMeta($product_id)
    {
        $data['product']=product::find($product_id);
       return view('backend.meta.listmeta',$data);
    }
    public function PostAddMeta(request $request)
    {
        $meta=new meta;
        $meta->product_meta_name=$request->product_meta_name;
        $meta->product_id=$request->product_id;
        $meta->save();
        return redirect()->back()->with('thongbao','đã thêm thành công!!');
    }
    public function PostEditMeta(request $request)
    {
        $meta=meta::find($request->product_meta_id);
        $meta->product_meta_name=$request->product_meta_name;
        $meta->product_id=$request->product_id;
        $meta->save();
        return redirect()->back()->with('thongbao','đã sửa thành công!!');
    }
    public function DeleteMeta($product_meta_id)
    {
        meta::destroy($product_meta_id);
        return redirect()->back()->with('thongbao','đã xóa thành công!!');
    }
}

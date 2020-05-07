<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{product,variant};

class VariantController extends Controller
{
    public function GetAddVariant($product_id)
    {
        $data['product']=product::find($product_id);
        return view('backend.variant.addvariant',$data);
        
    }
    public function PostAddVariant(request $request,$variant_id)
    {
        // dd($request->all());
        foreach ($request->variant as $key => $value) {
            $vari=variant::find($key);
            $vari->variant_price=$value;
            $vari->save();
        }
        return redirect('admin/product')->with('thongbao','Đã thêm biến thể thành công');
    }
    public function DeleteVariant($variant_id)
    {
        variant::destroy($variant_id);
        return redirect()->back()->with('thongbao','đã xóa thành công');
    }

}

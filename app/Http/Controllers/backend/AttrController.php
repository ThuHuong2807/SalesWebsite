<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Requests\{AddAttrRequest,EditAttrRequest,AddValueRequest};
use App\Http\Controllers\Controller;
use App\models\{attribute,values};


class AttrController extends Controller
{
    public function GetAttr()
    {
        $data['attrs']=attribute::all();
        return view('backend.attr.attr',$data);
    }
    public function GetEditAttr($attribute_id)
    {
        $data['attr']=attribute::find($attribute_id);
        return view('backend.attr.editattr', $data);
    }
    public function PostEditAttr(EditAttrRequest $request,$attribute_id)
    {
        $attr=attribute::find($attribute_id);
        $attr->attribute_name=$request->attribute_name;
        $attr->save();
        return redirect('admin/attr')->with('thongbao','đã sửa thành công');

    }
    public function DeleteAttr($attribute_id)
    {
        attribute::destroy($attribute_id);
        return redirect('admin/attr')->with('thongbao','Đã Xóa Thành Công');

    }
    public function PostAddAttr(AddAttrRequest $request)
    {
        // dd($r::all());
        $attr=new attribute;
        $attr->attribute_name=$request->attribute_name;
        $attr->save();
        return redirect('admin/product/add-product')->with('thongbao','Đã thêm danh mục thành công!');
    }
    public function PostAddValue(AddValueRequest $request)
    {
        
        $value=new values;
        $value->attr_id=$request->attr_id;
        $value->values_value=$request->values_value;
        $value->save();
        return redirect()->back()->with('thongbao','Đã Thêm Giá Trị Thuộc Tính Thành Công');
    }
    public function DeleteValue($values_id)
    {
        
        values::destroy($values_id);
        return redirect('admin/attr')->with('thongbao','Đã Xóa Thành Công');
    }

}

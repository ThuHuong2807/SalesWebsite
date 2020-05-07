<?php

namespace App\Http\Controllers\backend;
use Illuminate\Http\Request;
use App\Http\Requests\{AddCategoryRequest,EditCategoryRequest};
use App\Http\Controllers\Controller;
use App\models\category;

class CategoryController extends Controller
{
   public function GetCategory()
   {
    $data['category']=category::all();
     return view('backend.category.category',$data);
   }
    public function PostAddCategory(AddCategoryRequest $request)
   {
     $category=new category;
     $category->category_name=$request->category_name;
     $category->category_slug=str_slug($request->category_name);
     $category->category_parent=$request->category_parent;
     $category->save();
     return redirect()->back()->with('addcategory','Đã thêm danh mục thành công!');
   }

  public function GetEditCategory($category_id)
   {
    $data['category']=category::all();
    $data['cate']=category::find($category_id);
     return view('backend.category.editcategory',$data);
   }
     public function PostEditCategory(EditCategoryRequest $request,$category_id)
   {
    $category=category::find($category_id);
    $category->category_parent=$request->category_parent;
    $category->category_name=$request->category_name;
    $category->category_slug=str_slug($request->category_name);
    $category->save();
    return redirect()->back()->with('editcategory','Đã sửa danh mục thành công!');
   }
    public function  DeleteCategory($category_id)
    {
        // category::destroy()
        // dd($array)
        category::where('category_parent',$category_id)->delete();
        category::destroy($category_id);
        return redirect()->back();
    }
}

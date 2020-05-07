<?php

namespace App\Http\Controllers\backend;
//thư viện xử lý array
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use App\Http\Controllers\Controller;
use App\Http\Requests\{EditProductRequest,AddProductRequest};
use App\models\{attribute,category,product,variant};

class ProductController extends Controller
{
    public function GetProduct()
    {
        //  dd(attr_values(product::find(1)->values()->get()));
        $data['products'] = product::paginate(2);
        // dd($data);
        return view('backend.product.listproduct', $data);
    }
    public function GetAddProduct()
    {
        $data['attrs'] = attribute::all();
        $data['category'] = category::all();
        return view('backend.product.addproduct', $data);
    }
    public function PostAddProduct(AddProductRequest $request)
    {
      //  dd($request->all());
        $product = new product;
        $product->product_code = $request->product_code;
        $product->product_name = $request->product_name;
        $product->product_slug = str_slug($request->product_name);
        $product->product_price = $request->product_price;
        if ($request->hasFile('product_img')) {
            $file = $request->product_img;
            $filename = str_random(9) . '.' . $file->getClientOriginalExtension();
            $file->move('public/backend/img/product-img', $filename);
            $product->product_img = $filename;
        } else {
            $product->product_img = 'no-img.jpg';
        }

        $product->category_id = $request->product_category;
        $product->product_state = $request->product_state;
        $product->product_featured = $request->product_featured;
        $product->product_info = $request->product_info;
        $product->product_describe = $_POST['product_describe'];
        $product->save();

        //add values_product
        //attach : hàm pivot xử lí thêm trong bảng liên kết n-n
        //arr thư viện xử lí mảng , cần nhúng vào
        $product->values()->Attach(Arr::collapse($request->attr));//->thêm giá trị vào bảng values
        //== với
      //   $mang=array();
      //   foreach ($request->attr as $value)
      //    {
      //       foreach ($value as  $item)
      //       {
      //          $mang[]=$item;
      //       }
      //   }
      //   $product->values()->Attach($mang);

        //add variant
        //hàm get_combinations là hàm kết hợp các mảng tạo để tạo ra các biến thể
        foreach (get_combinations($request->attr) as $variant) {
            $vari = new variant;
            $vari->product_id = $product->product_id;
            $vari->save();
            $vari->values()->attach($variant);
        }

        return redirect('admin/variant/' . $product->product_id)->with('thongbao','Đã Thêm Sản Phẩm Thành Công , Bây Giờ Hãy Thêm Giá Cho Biến Thể Sản Phẩm');

    }
    public function GetEditProduct($product_id)
    {
        $data['product']=product::find($product_id);
        $data['category']=category::all();
        $data['attrs']=attribute::all();
        return view('backend.product.editproduct',$data);
    }
    public function PostEditProduct(EditProductRequest $request,$product_id)
    {
            // dd($request->all());
            $product =product::find($product_id);
            $product->product_code = $request->product_code;
            $product->product_name = $request->product_name;
            $product->product_slug = str_slug($request->product_name);
            $product->product_price = $request->product_price;
            if($request->hasFile('product_img'))
            {
                if($product->product_img!='no-img.jpg')
                {
                    unlink('public/backend/img/product-img/'.$product->product_img);
                }

                $file = $request->product_img;
                $filename= str_random(9).'.'.$file->getClientOriginalExtension();
                $file->move('public/backend/img/product-img/', $filename);
                $product->product_img=$filename;
            }

            $product->category_id = $request->product_category;
            $product->product_state = $request->product_state;
            $product->product_featured = $request->product_featured;
            $product->product_info = $request->product_info;
            $product->product_describe = $_POST['product_describe'];
            $product->save();

            //add values_product
            //Sync : hàm pivot xử lí sửa trong bảng liên kết n-n
            //arr thư viện xử lí mảng , cần nhúng vào
            $product->values()->Sync(Arr::collapse($request->value));//->thêm giá trị vào bảng values

            //add variant
            //có biến thể mới thì mới cập nhập , không thì thôi
            foreach(get_combinations($request->value) as $variant)
            {
                if(check_var($product,$variant))
                {
                    $vari=new variant;
                    $vari->product_id=$product->product_id;
                    $vari->save();
                    $vari->values()->attach($variant);
                }
            }

            return redirect('admin/product')->with('thongbao','Đã Sửa Sản Phẩm Thành Công');
    }
    public function GetDeleteProduct($product_id)
    {
        product::destroy($product_id);
        return redirect()->back()->with('thongbao','Xóa Sản Phẩm Thành Công');
    }

}

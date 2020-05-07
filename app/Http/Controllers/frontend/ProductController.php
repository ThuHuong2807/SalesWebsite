<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\{CheckOrderRequest};
use App\models\{product,category,attribute,values,customer,order,attr,meta};
use Cart;

class ProductController extends Controller
{
    public function GetProductDetail($product_id)
    {
        $data['products']=product::orderby('created_at','DESC')->take(4)->get();
        $data['product']=product::find($product_id);
        $data['meta']=product::find($product_id)->meta()->get();
        return view('frontend.product-detail',$data);
    }
    public function GetListProduct(request $request)
    {
        if ($request->category) {
            $data['products']=category::find($request->category)->product()->paginate(12);
        }
        else if($request->start) {
            $data['products']=product::whereBetween('product_price',[$request->start,$request->end])->paginate(12);
        } 
        else if($request->value) {
            $data['products']=values::find($request->value)->product()->paginate(12);
        } 
        else {
            $data['products']=product::paginate(12);
        }
        $data['categories']=category::all();
        $data['attrs']=attribute::all();
        return view('frontend.list-product',$data);
    }
    public function GetCart()
    {
        $data['cart']=Cart::Content();
        $data['total']=Cart::total(0,'',',');
        $data['products']=product::inRandomOrder()->paginate(8);
        return view('frontend.cart',$data);
    }
    public function AddCart(request $request)
    {

        $product=product::find($request->product_id);
        Cart::add([
        'id' => $product->product_code, 
        'name' => $product->product_name, 
        'qty' => $request->quantity, 
        'price' => getprice($product,$request->attr), 
        'options' => ['img' => $product->product_img,'attr'=>$request->attr,]]);
        return redirect('product');
    }
    public function UpdateCart($rowId,$qty)
    {
        Cart::update($rowId,$qty);
    }
    public function GetRemoveCart($id)
    {
        Cart::Remove($id);
        return redirect('product/cart.html');
    }
    

    public function GetCheckout()
    {
        $data['cart']=Cart::content();
        $data['total']=Cart::total(0,'',',');
        $data['products']=product::inRandomOrder()->paginate(8);
        return view('frontend.checkout',$data);
    }
    public function PostCheckout(request $request)
    {
        if (Cart::content()->count()==0) {
          return redirect('product')->with('order','Bạn Chưa Có Sản Phẩm Nào ')->withInput();
        } 
        $customer=new customer;
        $customer->customer_name=$request->name;
        $customer->customer_slug=str_slug($request->name);
        $customer->customer_address=$request->address;
        $customer->customer_email=$request->email;
        $customer->customer_phone=$request->phone;
        $customer->customer_total=Cart::total(0,'','');
        $customer->customer_state=0;
        $customer->save();

        foreach (Cart::content() as $product) {
            $order=new order;
            $order->order_name=$product->name;
            $order->order_price=$product->price;
            $order->order_quantity=$product->qty;
            $order->order_img=$product->options->img;
            $order->customer_id=$customer->customer_id;
            $order->save();

            foreach ($product->options->attr as $key => $value) {
                $attr=new attr;
                $attr->attr_name=$key;
                $attr->attr_value=$value;
                $attr->order_id=$order->order_id;
                $attr->save();
            }
        }
        Cart::destroy();
        $data['customer']=customer::find($customer->customer_id);
        return view('frontend.order-complete',$data);
    }
    // public function GetOrderComplete( $customer_id )
    // {
        
        
    // }
}

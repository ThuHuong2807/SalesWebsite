<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{customer,values};


class OrderController extends Controller
{
    public function GetOrder()
    {
        $data['customers']=customer::where('customer_state',0)->orderby('created_at','DESC')->paginate(15);
        return view('backend.order.order',$data);
    }
    public function GetProcessed()
    {
        $data['customers']=customer::where('customer_state',1)->orderby('updated_at','DESC')->paginate(15);
        return view('backend.order.processed',$data);
    }
    public function GetActiveOrder($customer_id)
    {
        $customer=customer::find($customer_id);
        $customer->customer_state=1;
        $customer->save();
        return redirect('admin/order')->with('thongbao','Đã xử lí đơn hàng');
    }
    public function GetDetailOrder($customer_id)
    {
        $data['customer']=customer::find($customer_id);
        return view('backend.order.detailorder',$data);
    }
    public function GetHistoryOrder($customer_id)
    {
        $data['customer']=customer::find($customer_id);
        return view('backend.order.history-order',$data);
    }
}

<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\{customer,product};
use Carbon\Carbon;

class IndexController extends Controller
{
    public function GetIndex()
    {
        // lây ra năm
        $year=Carbon::now()->format('Y'); 
        //lấy ra tháng
        $month=Carbon::now()->format('m');
        for($i=1;$i<=$month;$i++)
        {
            $dt['Tháng '.$i]=customer::where('customer_state',1)->wheremonth('updated_at', $i)->whereyear('updated_at',$year)->sum('customer_total');
        }
        $data['data']=$dt;
        $data['OrderProcessedOfMonth']=customer::where('customer_state',1)->wheremonth('updated_at', $month)->whereyear('updated_at',$year)->count();//đơn hàng được xử lí trong tháng
        $data['OrderProcessedOfYear']=customer::where('customer_state',1)->whereyear('updated_at',$year)->count();//đơn hàng được xử lí trong năm
        $data['OrderProcessedOfTotal']=customer::where('customer_state',1)->count();//tất cả đơn hàng được xử lí 
        $data['OrderNoProcessedOfMonth']=customer::where('customer_state',0)->wheremonth('created_at', $month)->whereyear('created_at',$year)->count();//đơn hàng chưa được xử lí trong tháng
        $data['doanhthu']=$dt['Tháng '.(int)$month];
        $data['product']=customer::all()->count();
        return view('backend.index',$data);
    }
    
}

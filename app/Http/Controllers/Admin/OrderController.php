<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $status = request('status',1);
        $orders = Order::orderBy('created_at','ASC')->where('status',$status)->paginate(10);
        
        
        return view("admin.order.index",compact("orders"));
    }
    public function detail(Order $order){
        $customer = $order->customer;
        return view("admin.order.detail",compact('customer',"order"));
    }
}

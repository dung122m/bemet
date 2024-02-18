<?php

namespace App\Http\Controllers;

use App\Mail\OrderMail;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
class OrderController extends Controller
{
    public function create(){
        $carts = Cart::paginate(10);
        $auth = auth('customers')->user();
        return view("web.order.create",compact('auth','carts'));
    }
    public function post_create(Request $request){
        $auth = auth('customers')->user();

        $request->validate([
            'name' => "required|min:6|max:32",
            'email' => "required|email",
            'phone' => "required",
            'address' => "required",
           
        ],[
            "name.required" => "Name must not be empty",
            "email.required" => "Email must not be empty",
            "phone.required" => "Phone number must not be empty",
            "address.required" => "Address must not be empty",
            
            

            'name.min' => "Name must be at least 6 characters",
            

            'email.email' => "Please enter a valid email format",

            
            
        ]);
        $data = $request->only("name","phone","email","address");
        $data['customer_id'] = $auth->id;
        $token = Str::random(40);

        if($order = Order::create($data)){
            foreach($auth->carts as $cart){
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'quantity' => $cart->quantity,
                    'price' => $cart->price,
                ];
                OrderDetail::create($data1);
                
            }
            $order->token = $token;
            $order->save();
            
            Mail::to($request->email)->send(new OrderMail($order,$token));
            return redirect()->route('home.index')->with("success","Create order successful, please check your email to verify your order !");
        }
        return redirect()->route('home.index')->with("error","Something went wrong");

    }
    public function verify($token){
        $order = Order::where('token',$token)->first();
        if($order){
            $order->token = null;
            $order->status = 1;
            $order->save();
            return redirect()->route('home.index')->with("success","Verify order successful");
        }
        else return abort(404);
    }
    public function history(){
        $auth = auth('customers')->user();
        $orders = $auth->orders;
        
        return view("web.order.history",compact("auth","orders"));
    }
    public function detail(Order $order){
        $auth = auth('customers')->user();

        return view("web.order.detail",compact("auth","order"));
    }
}

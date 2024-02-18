<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index(){
    
        $carts =  Cart::paginate(10);
        return view('web.home.cart',compact("carts"));
    }
    public function add(Product $product,Request $request){
        $customerId  = auth('customers')->user()->id;
        $quantity = $request->quantity ? floor($request->quantity)  : 1;
        $cartExist = Cart::where(
            [
            'customer_id' => $customerId,
            'product_id' => $product->id
            ]
        )->first();
        if($cartExist){
            Cart::where(
            [
            'customer_id' => $customerId,
            'product_id' => $product->id
            ]
        )->update(
                [   
                    
                    'quantity' => $cartExist->quantity + 1
                ]
            );
            return redirect()->route("cart.index")->with("success","Add product to cart successful !");

        }else {
            $data = [
            'customer_id' => $customerId,
            'product_id' => $product->id,
            'price' => $product->sale_price ? $product->sale_price : $product->price,
            'quantity' => $quantity
            
            ];
           if(Cart::create($data)){
            return redirect()->route("cart.index")->with("success","Add product to cart successful !");
            }   
        }
        return redirect()->back()->with("error","Something went wrong");
        
    }
    public function update(Product $product,Request $request){
        $customerId  = auth('customers')->user()->id;
        $quantity = $request->input('quantity');
        $cartExist = Cart::where(
            [
            'customer_id' => $customerId,
            'product_id' => $product->id
            ]
        )->first();
        if($cartExist){
            Cart::where(
            [
            'customer_id' => $customerId,
            'product_id' => $product->id
            ]
        )->update(
                [   
                    
                    'quantity' => $quantity
                ]
            );
            return redirect()->route("cart.index")->with("success","Update product to cart successful !");

        }
        
    }
     public function delete($product_id){
        $customerId  = auth('customers')->user()->id;

        Cart::where([
            'customer_id' => $customerId,
            'product_id' => $product_id
        ])->delete();
        return redirect()->back();
    }
     public function clear(){
        $customerId  = auth('customers')->user()->id;

        Cart::where([
            'customer_id' => $customerId,
            
        ])->delete();
        return redirect()->back();
    }
}

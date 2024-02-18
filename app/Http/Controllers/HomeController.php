<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $topBanner = Banner::banner()->first() ;
        $gallerys = Banner::banner("gallery")->get();
        $newProduct = Product::orderBy('created_at','DESC')->limit(2)->get();
        $saleProduct = Product::orderBy('created_at','DESC')->where("sale_price",">",0)->limit(3)->get();
        $featureProduct = Product::inRandomOrder()->limit(4)->get();
        
        return view("web.home.index",compact("topBanner","gallerys","newProduct","saleProduct","featureProduct"));
    }
    public function about(){
        return view("web.home.about");
    }
    public function category(Category $category){
        $product = $category->products;
        $newProduct = Product::orderBy('created_at','DESC')->limit(3)->get();
        
        return view("web.home.category",compact("product","category","newProduct"));
    }
    public function product(Product $product){
        $relatedProduct = Product::where("category_id",$product->category_id)->limit(5)->get();
     
        return view("web.home.product",compact("product","relatedProduct"));
    }
    public function favorite($productId){
        $userId = auth('customers')->id();
        $data = [
            'product_id' => $productId,
            'customer_id' => $userId
        ]; 
        $favorited = Favorite::where(
            [
            'product_id' => $productId,
            'customer_id'=> auth('customers')->id()
            ]
        )->first();
        if($favorited){
            $favorited->delete();
            return redirect()->back()->with("success","You have removed product from wishlist");
        }else{
            Favorite::create($data);
        return redirect()->back()->with("success","Added product to wishlist");

        }
        
    }
}

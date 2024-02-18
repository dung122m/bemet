<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::paginate(5);
        return view('admin.product.index',compact("products"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   $category = Category::orderBy("name","ASC")->select("id","name")->get();
        return view('admin.product.create',compact("category"));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|unique:products',
                'description' => 'required',
                'price' => 'required|numeric',
                'sale_price' => 'numeric|lte:price',
                'image' => 'file|mimes:jpg,png,jpeg,gif',
                'category_id' => 'required|not_in:-1',
                'status' => 'required|not_in:-1'
            ],
            [
                'category_id.not_in' => "Please choose category",
                'status.not_in' => "Please choose status",
            ]
        );
        $data = $request->only("name","description","price","sale_price","category_id","status");
        $imageName = $request->image->hashName();    
        $request->image->move(public_path("uploads/product"),$imageName);     
        $data['image'] = $imageName;
        if($product = Product::create($data)){
            if($request->has("other_image")){
                foreach($request->other_image as $image){
                    $otherImage = $image->hashName();    
                    $image->move(public_path("uploads/product"),$otherImage);     
                    ProductImage::create([
                        'image' => $otherImage,
                        'product_id' => $product->id

                    ]);
                }
            }
            return redirect()->route('product.index')->with("success","Create product successful");
        }  else{
            return redirect()->back()->with("error","Something went wrong, please try again!");
        }                         
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    
    {     $images = $product->images()->get();
          $category = Category::orderBy("name","ASC")->select("id","name")->get();

        return view("admin.product.edit",compact("category","product","images"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate(
            [
                'name' => 'required|unique:products,name,'.$product->id,
                'description' => 'required',
                'price' => 'required|numeric',
                'sale_price' => 'numeric|lte:price',
                'image' => 'file|mimes:jpg,png,jpeg,gif',
                'category_id' => 'required|not_in:-1',
                'status' => 'required|not_in:-1'
            ],
            [
                'category_id.not_in' => "Please choose category",
                'status.not_in' => "Please choose status",
            ]
        );
        $data = $request->only("name","description","price","sale_price","category_id","status");
        if($request->image){
             $imageName = $product->image;
              $image_path = public_path('uploads/product/') .'/'.$imageName;
            if(file_exists($image_path)){
                    unlink($image_path);
                    } 

            $imageName = $request->image->hashName();    
            $request->image->move(public_path("uploads/product"),$imageName);     
            $data['image'] = $imageName;
        }
        
        if($product->update($data)){
            if($request->has("other_image")){
                
                if($product->images->count()>0){
                foreach($product->images as $images){
                    $other_images = $images->image;
                    $other_image_path = public_path('uploads/product/') .'/'.$other_images;

                    if(file_exists($other_image_path)){
                    unlink($other_image_path);
                    } 

                }
            }
                ProductImage::where('product_id',$product->id)->delete();

                foreach($request->other_image as $image){
                    $otherImage = $image->hashName();    
                    $image->move(public_path("uploads/product"),$otherImage);     
                    ProductImage::create([
                        'image' => $otherImage,
                        'product_id' => $product->id

                    ]);
                }
            }
            return redirect()->route('product.index')->with("success","Edit product successful");
        }  else{
            return redirect()->back()->with("error","Something went wrong, please try again!");
        }   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $imageName = $product->image;
        if($product->images->count()>0){
            foreach($product->images as $images){
                $other_images = $images->image;
                $other_image_path = public_path('uploads/product/') .'/'.$other_images;

                 if(file_exists($other_image_path)){
                unlink($other_image_path);
                } 


            }
                ProductImage::where('product_id',$product->id)->delete();

            if($product->delete()){
            $image_path = public_path('uploads/product/') .'/'.$imageName;
            if(file_exists($image_path)){
                unlink($image_path);
               
        return redirect()->route("product.index")->with("success","Deleted successful");
        }
       
        
       }
       else {
        if($product->delete()){
            $image_path = public_path('uploads/product/') .'/'.$imageName;
            if(file_exists($image_path)){
                unlink($image_path);
            }   
        return redirect()->route("product.index")->with("success","Deleted successful");
       }
    }
    }   
       
    }
     public function destroyImage(ProductImage $image)
    {
        $imageName = $image->image;
       if($image->delete()){
        $image_path = public_path('uploads/product/') .'/'.$imageName;
        if(file_exists($image_path)){
            unlink($image_path);
        }
        return redirect()->back()->with("success","Deleted successful");
       }else {
        return redirect()->back()->with("error","Something went wrong, please try again!");
       }
    }
}

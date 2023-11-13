<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //create
    public function create(){
        $category = Category::all();
        return view('Admin.create',compact("category" ));

    }
    public function store(Request $request){
        $data = $request->validate([
            "name"=>"required|string|max:25",
            "desc"=>"required|string",
            "priec"=>"required|numeric",
            "image"=>"required|image|mimes:png,jpg",
            "quantity"=>"required|integer",
            "category_id"=>"required|exists:categories,id"
        ]);
        $data['image']= Storage::putFile("Products",$request['image']);
   // create
        Product::create($data);
        return redirect(url('products/create'))->with("success","Data inserted succssefuly");
    }

    // show
    public function allProducts(){
     $products = Product::all();
     return view('Admin.all',compact("products" ));


    }
    public function show($id){
        $product = Product::findOrFail($id);
        return view('Admin.show',compact("product" ));


       }

    public function edit($id){
      $product =  Product::findOrFail($id);
        return view('Admin.edit',compact('product'));

    }

    public function update($id , Request $request){

        $data = $request->validate([
            "name"=>"required|string|max:25",
            "desc"=>"required|string",
            "priec"=>"required|numeric",
            "image"=>"image|mimes:png,jpg",
            "quantity"=>"required|integer"
        ]);
        $product =  Product::findOrFail($id);

        if($request->has('image')){
         Storage::delete($product->image);
          $data['image']= Storage::putFile("Products",$request['image']);
          }
      // update

      $product->update($data);

      return redirect(url("products/show/$id"));



    }

    public function delete($id){

      $product =  Product::findOrFail($id);

      Storage::delete($product->image);

      $product->delete();

      return redirect(url("products"));


    }


    }

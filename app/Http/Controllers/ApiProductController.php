<?php

namespace App\Http\Controllers;

use App\Http\Resources\productResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ApiProductController extends Controller
{
    public function all(){
        $products = Product::all();
        if($products == null){
            return response()->json([
                "msg" => "Products Not Found"
            ],404);
        }else{

            return productResource::collection($products);
        }
    }

    public function show($id){
        $product = Product::find($id);

        if($product == null){
            return response()->json([
                "msg" => "Product Not Found"
            ],404);
        }else{
            return new productResource($product);
        }
    }

    public function store(Request $request){
     $validatore = Validator::make($request->all(),[
            "name"=>"required|string|max:25",
            "desc"=>"required|string",
            "priec"=>"required|numeric",
            "image"=>"required|image|mimes:png,jpg",
            "quantity"=>"required|integer"
            , "category_id"=>"required|exists:categories,id"
        ]);
        if($validatore->fails()){
            return response()->json([
                "errors"=> $validatore->errors()
            ],302);
        }

        $imagName = Storage::putFile("Products",$request->image);

        Product::create([
            "name" => $request->name,
            "desc" => $request->desc,
            "priec" => $request->priec,
            "image" => $imagName,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
        ]);

          return response()->json([
            "msg"=> " Product added successfuly "
        ],201);




    }

    public function update($id,Request $request){
     //validation

        $validatore = Validator::make($request->all(),[
            "name"=>"required|string|max:25",
            "desc"=>"required|string",
            "priec"=>"required|numeric",
            "image"=>"image|mimes:png,jpg",
            "quantity"=>"required|integer"
            , "category_id"=>"required|exists:categories,id"
        ]);
        if($validatore->fails()){
            return response()->json([
                "errors"=> $validatore->errors()
            ],302);
        }
        //find
        $product = Product::find($id);

        if($product == null){
            return response()->json([
                "msg" => "Product Not Found"
            ],404);
        }
        //storage
        $imagName = $product["image"] ;
        if($request->has("image")){
            Storage::delete($imagName);
            $imagName = Storage::putFile("Products",$request->image);

        }

       // update

       $product->update([
            "name" => $request->name,
            "desc" => $request->desc,
            "priec" => $request->priec,
            "image" => $imagName,
            "quantity" => $request->quantity,
            "category_id" => $request->category_id,
        ]);




        //msg

            return response()->json([
                        "msg"=> " Product update successfuly ",
                        "Product"=> new productResource($product)
                    ],201);

    }

    public function delete($id){

        $product =  Product::find($id);

        if($product == null){
            return response()->json([
                "msg" => "Product Not Found"
            ],404);
        }
        Storage::delete($product->image);

        $product->delete();

        return response()->json([
                        "msg"=> " Product deleted successfuly "
                    ],203);


      }

}

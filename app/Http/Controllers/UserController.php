<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function allProducts(){
        $products = Product::all();
        return view('User.Home',compact("products" ));


    }

    public function show($id){
        $product = Product::findOrFail($id);
        return view('User.show',compact("product" ));


    }

    public function search(Request $request){
        $key= $request->key;
          $products = Product::where("name","like","%$key%")->get();
        return view('User.Home',compact("products" ));

    }

    public function addToCart($id,Request $request){

        $qut = $request->qut;
        $product = Product::FindorFail($id);

        $cart = session()->get("cart");
        // session_unset();
        if(!$cart){

            $cart = [
                $id=>[
                    "name"=> $product->name ,
                    "price"=> $product->priec ,
                    "image"=> $product->image,
                    "qut"=> $qut
                    ]
                ];
                session()->put("cart",$cart);
                return redirect()->back()->with("success","product added to cart successfly");
        }
        else{
                if(isset($cart[$id])){
                    $cart[$id]["qut"] = $qut ;
                    session()->put("cart",$cart);
                    return redirect()->back()->with("success","product updated successfly");
                }

                $cart[$id] = [
                    "name"=> $product->name ,
                    "price"=> $product->priec ,
                    "image"=> $product->image,
                    "qut"=> $qut
                ];
                session()->put("cart",$cart);
                return redirect()->back()->with("success","product added to cart successfly");

            }
    }

    public function mycart(){
        $user = Auth::user();
        $products = session()->get("cart");
        return view("user.mycart",compact("products", "user"));
    }

    public function makeOrder(Request $request){
         $day = $request->day ;
        $user_id = Auth::user()->id ;

         $products = session()->get("cart");

         $order=  Order::create([
             "requiredDate" => $day,
             "user_id" =>$user_id
           ]);

           foreach ($products as $id => $product)
           {

               OrderDetails::create([
                   "order_id"=>$order->id,
                   "product_id"=>$id,
                   "qut"=>$product['qut'],
                   "price"=>$product['price']
               ]);

            }

            return redirect(url(""))->with("success"," order send successfly");
    }

}
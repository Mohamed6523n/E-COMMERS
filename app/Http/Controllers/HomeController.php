<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function redirect(){

        if(Auth::user()->role == 1){
            return view('Admin.Home');
        }else{

            $products = Product::all();
            return view('User.Home',compact("products"));
        }
    }

   

}

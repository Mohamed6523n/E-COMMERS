<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    Route::get('redirect','redirect');

});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    ])->group(function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
});



Route::controller( HomeController::class)->group(function(){

    Route::get('redirect','redirect');
});

Route::controller(ProductController::class)->group(function(){

    Route::middleware(is_admin::class)->group(function(){

        // show
        Route::get('products','allProducts');
        Route::get('products/show/{id}','show');
        //    create
        Route::get('products/create','create');
        Route::post('products','store')->name('store');
        //update
        Route::get('products/edit/{id}','edit');
        Route::put('products/{id}','update')->name('update');
        Route::delete('products/{id}','delete');
    });


});

Route::get("change/{lang}",function($lang){

    //ar
    if($lang =="ar"){
        session()->put("lang","ar") ;
    }else{
        session()->put("lang","en") ;

    }
    return redirect()->back() ;
});

Route::controller(UserController::class)->group(function(){

    Route::get("","allProducts");
    Route::get('product/{id}','show');
    Route::get('search','search');
    
    Route::get('mycart','mycart');
    Route::post('addToCart/{id}','addToCart');
    Route::post('makeOrder','makeOrder');

});


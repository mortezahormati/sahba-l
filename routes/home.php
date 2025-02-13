<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', \App\Http\Livewire\Home\Home\Index::class)->name('home.front');
   
Auth::routes();
Route::post('/login-with-phone' , [\App\Http\Controllers\Auth\LoginController::class , 'loginWithMobile'])->name('login.mobile');
Route::post('/login-with-phone-set-password' , [\App\Http\Controllers\Auth\LoginController::class , 'loginWithMobileSetPassword'])->name('login.with.password');
Route::get('/login-with-user-password/{phone_number}' , [\App\Http\Controllers\Auth\LoginController::class , 'loginWithUserPassword'])->name('login.with.user.pass');
Route::post('/getResetGenerateCode/{token}/{phone_number}' , [\App\Http\Controllers\Auth\LoginController::class , 'resetGenerateTokenCode'])->name('login.reset.token');

Route::get('/home',\App\Http\Livewire\Admin\Dashboard\Index::class)->middleware('auth')->name('home');
Route::get('/products-shop' , [\App\Http\Controllers\Frontend\Product\ShopController::class , 'index'])->middleware('web')->name('shop.index');
Route::get('/products-shop/{name}' , [\App\Http\Controllers\Frontend\Product\ShopController::class , 'baseCat'])->middleware('web')->name('cat.shop.index');


Route::post('products-shop/action', [\App\Http\Controllers\Frontend\Product\ShopController::class , 'action'])->name('product.full-text-search.action');

//Route::get('/products-shop' , [\App\Http\Controllers\Frontend\Product\ShopController::class , 'searchName'])->middleware('web')->name('product.name.search');


//create sold_count and rate for products
//Route::get('/sold-count-rate' , function (){
//   $products = Product::all();
//
//   foreach ($products as $product){
//       $product->update([
//          'sold_count' => rand(20, 5000) ,
//          'rate_count' => rand(0, 5) ,
//       ]);
//   }
//   dd('ok');
//});

//single product
Route::middleware(['web' , 'p_status'])->prefix('product')->group(function (){
//    Route::get('/shp-{id}/{link}/' ,\App\Http\Livewire\Home\Product\Index::class )->name('single.product.index');
    Route::get('/shp-{id}/{link}/' ,[\App\Http\Controllers\Frontend\Product\SingleProductController::class , 'index'] )->name('single.product.index');
});

Route::get('/basket/add/{product}' , [\App\Http\Controllers\Frontend\Product\BasketController::class , 'add'])->name('basket.add');
Route::get('/basket' , [\App\Http\Controllers\Frontend\Product\BasketController::class , 'index'])->name('basket.index');
Route::get('/basket-clear' ,function (){
    resolve(\App\Support\Storage\Contracts\StorageInteface::class)->clear();
} );
Route::post('/basket/update/{product}' , [\App\Http\Controllers\Frontend\Product\BasketController::class , 'update'])->name('basket.update');
Route::get('/basket/remove/{product}' , [\App\Http\Controllers\Frontend\Product\BasketController::class , 'remove'])->name('basket.remove');
Route::get('/basket/checkout' , [\App\Http\Controllers\Frontend\Product\BasketController::class , 'checkOutForm'])->name('basket.checkout-form');


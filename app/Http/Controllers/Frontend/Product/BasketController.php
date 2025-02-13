<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Exceptions\QuantityExceededException;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Support\Basket\Basket;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    private $basket;

    public function __construct(Basket $basket)
    {
        $this->middleware('auth')->only(['checkOutForm']);
        $this->basket = $basket;
    }

    public function add(Product $product)
    {
        try {
            $this->basket->add($product, 1);
            return redirect()->route('shop.index')->with('front_flash_message', __('home.basket.product-added-success'));
        } catch (QuantityExceededException $e) {
            return back()->with('front_error_flash_message', __('home.payment.quantityExceeded'));
        }
    }

    public function update(Request $request,Product $product)
    {
        $this->basket->update($product , $request->quantity);
        return redirect()->route('basket.index')->with('front_flash_message' , __('home.basket.basket_updated'));
    }

    public function remove(Product $product)
    {
        $this->basket->unset($product);
        return redirect()->route('basket.index')->with('front_flash_message', __('home.basket.basket_remove_item'));
    }

    public function checkOutForm()
    {
        dd(123456);
    }

    public function index()
    {
        $items = $this->basket->all();
        $data =[
          'items' => $items
        ];


        return view('base.frontend.basket.index' , $data);
    }

//    public function has(Product $product)
//    {
//        $this->baske->has
//    }
}

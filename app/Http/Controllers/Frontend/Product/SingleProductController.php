<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Http\Request;

class SingleProductController extends Controller
{
    public function index()
    {
        $sahProductPath = \Illuminate\Support\Facades\Request::segment(2);
        $product_id = explode('-' , $sahProductPath)[1];
        $product =Product::find($product_id);
        $product_images = Gallery::where('product_id' ,'=', $product->id)->orderBy('position')->get();
        $same_products = Product::where('id' , '!=' , $product->id)->where('child_sub_category_id' , '=' , $product->child_sub_category_id)->get();


        $data = [
            'product' => $product ,
            'product_images' => $product_images ,
            'same_products' => $same_products ,

        ];
        return view('base.frontend.product.single_product.index' , $data);
    }


}

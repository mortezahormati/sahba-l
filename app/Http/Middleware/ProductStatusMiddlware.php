<?php

namespace App\Http\Middleware;

use App\Models\Product;
use Closure;
use Illuminate\Http\Request;

class ProductStatusMiddlware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $sahProductPath = \Illuminate\Support\Facades\Request::segment(2);
        $product_id = explode('-' , $sahProductPath)[1];
        $product =Product::find($product_id);
        if($product->status == "0"){
            return redirect()->route('shop.index')->with('flash_message' , 'بار عرض پوزش');
        }else{
            return $next($request);
        }
    }
}

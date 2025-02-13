<?php

namespace App\Http\Controllers\Frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ChildSubCategory;
use App\Models\Color;
use App\Models\Product;
use App\Models\SubCategory;
use App\Support\Basket\Basket;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {
        //popular products

        $brands = Brand::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $colors = Color::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();

        $query = Product::where('status' , '=' ,1)->where('deleted_at' , '=' , null);
        $products = $query->paginate(config('services.paginate.10-t'));
        $products_best_sell = $query->orderBy('sold_count', 'desc')->paginate(config('services.paginate.10-t'));
        $products_best_popular = $query->orderBy('rate_count', 'desc')->paginate(config('services.paginate.10-t'));
        $product_max_value = $query->max('price_to');
        $product_min_value = $query->min('price_from');

//        $category = Category::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();
        $data = [
            'products' => $products ,
            'colors' => $colors ,
            'brands' => $brands ,
            'products_best_popular' => $products_best_popular ,
            'products_best_sell' => $products_best_sell ,
            'max_price' => $product_max_value ,
            'min_price' => $product_min_value ,
//            'child_sub_categories' => $child_sub_categories ,
        ];
//        dd(session()->all());

        return view('base.frontend.shop.index' , $data);
    }

    public function baseCat(string $name)
    {



        switch ($name) {
            case "panasonic":
                return $this->withBrandProduct($name);
//               return view('base.frontend.shop.cat-shop.panasonic.index');
                break;
            case "bosch":
                return $this->withBrandProduct($name);
//                return view('base.frontend.shop.cat-shop.bosch.index');
                break;
            case "v-tech":
                return $this->withBrandProduct($name);
                break;
            case "fine":
                return $this->withBrandProduct($name);
                break;
            default:
                echo "Your favorite color is neither red, blue, nor green!";
        }

    }

    public function withBrandProduct($name)
    {

        $brand = Brand::where('name', '=', $name)->firstOrFail();
        $b_name = $brand->name;
        $path = 'base.frontend.shop.cat-shop.'.$name.'.index' ;
        $query = Product::where('status' , '=' , 1)->where('deleted_at' , '=' , null);
        $query->WhereHas('brands', function($query) use ($b_name) {
            $query->where('name', $b_name);
        });
        $sub_categories = SubCategory::where('name' , '=' , $name)->firstOrFail();
        $sub_child_categories = $sub_categories->child_sub_categories;
        $products = $query->paginate(config('services.paginate.10-t'));
        $products_best_sell = $query->orderBy('sold_count', 'desc')->paginate(config('services.paginate.10-t'));
        $products_best_popular = $query->orderBy('rate_count', 'desc')->paginate(config('services.paginate.10-t'));
        $product_max_value = $query->max('price_to');
        $product_min_value = $query->min('price_from');

        $data = [
            'products' => $products ,
            'sub_child_categories' => $sub_child_categories ,
            'products_best_popular' => $products_best_popular ,
            'products_best_sell' => $products_best_sell ,
            'max_price' => $product_max_value ,
            'min_price' => $product_min_value ,
//            'child_sub_categories' => $child_sub_categories ,
        ];

        return view($path , $data);

//        $products = $query->get()->whe;

    }

    public function action(Request $request)
    {

        if($request->ajax()){
            $query = Product::with('brands')->where('status' , '=' ,1)->where('deleted_at' , '=' , null);


            if($request->input('product')){

                 $query->
                where('title' , 'LIKE' , "%{$request->product}%");

            }
            if($request->input('brands') ){
                $brands = $request->input('brands');
                $keys = array_keys($brands);
                $query->WhereHas('brands', function($query) use ($keys) {
                    $query->whereIn('id', $keys);
                });
            }

            if($request->input('exists_product')){
                $query->where('number' , '>=' , 2);
            }

            if($request->input('min_price_count') or $request->input('max_price_count')){
                $min = (int)$request->input('min_price_count');
                $max = (int)$request->input('max_price_count');
                $query->whereBetween('price', [$min, $max]);
//                    ->orWhereBetween('price_from', [$min, $max])
//                    ->orWhereBetween('price_to', [$min, $max]);
            }


            $products = $query->paginate(config('services.paginate.10-t'));
            $products_best_sell = $query->orderBy('sold_count', 'desc')->paginate(config('services.paginate.10-t'));
            $products_best_popular = $query->orderBy('rate_count', 'desc')->paginate(config('services.paginate.10-t'));
            $product_max_value = $query->max('price_to');
            $product_min_value = $query->min('price_from');
            $data = [
                'products' => $products ,
                'products_best_popular' => $products_best_popular ,
                'products_best_sell' => $products_best_sell ,
                'max_price' => $product_max_value ,
                'min_price' => $product_min_value ,
            ];
            return view('base.frontend.shop.search-products' , $data);
        }
    }
}

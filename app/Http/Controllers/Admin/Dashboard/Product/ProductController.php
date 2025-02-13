<?php

namespace App\Http\Controllers\Admin\Dashboard\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\ChildSubCategory;
use App\Models\Color;
use App\Models\Gallery;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Warranty;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function createProductForm()
    {
        $brands = Brand::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $tags = Tag::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $warranties = Warranty::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $now = Carbon::now();
        $coupons = Product\Coupon::where('expires_at' , '>=' , $now)->get();
        $colors = Color::all();
        $child_sub_categories = ChildSubCategory::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();

        $data = [
            'colors'  =>  $colors  ,
            'brands'  =>  $brands  ,
            'tags'  =>  $tags  ,
            'warranties'  =>  $warranties  ,
            'coupons'  =>  $coupons  ,
            'child_sub_categories'  =>  $child_sub_categories  ,
        ];
        return view('base.admin.dashboard.product.createProduct' , $data);
    }


    public function productUpdateGallery(Product $product)
    {
        $product_images = Gallery::where('product_id' ,'=', $product->id)->orderBy('position')->get();

        $data = [
            'product_images' => $product_images ,
            'product' => $product ,
        ];
        return view('base.admin.dashboard.product.gallery.single-product' , $data);
    }

    public function productUpdatingGallery(Product $product , Request $request)
    {

            $this->validateProductSinglrForm($request , $product);
            $file = $request->file('img');
            $year = now()->year;
            $month = now()->month;
            $full_name = $year . '-' . $month . basename($file->getClientOriginalName(), '.' . $file->getClientOriginalExtension()) . Str::random(3) . '.' . $file->getClientOriginalExtension();
            Gallery::create([
                'name' => $request->input('name'),
                'product_id' => $product->id,
                'position' => $request->input('position'),
                'status' => $request->input('status') == "on" ? 1 : 0 ,
                'img' => $full_name
            ]);
            $file->move(public_path('/Gallery/Product/'.$product->id.'/'), $full_name);
            return redirect()->route('product.single.gallery.index' , $product)->with('flash_message', __('admin.products.gallery.uploadImage'));


    }



    public function createProduct(Request $request)
    {



        $this->validateForm($request);



        $product = Product::create([
            'vendor' => 1,
            'title' => $request->title,
            'name' => $request->name,
            'status' => $request->status == "on"  ? "1" : "0",
            'child_sub_category_id' => $request->child_sub_category_id,
            'publish' => $request->publish == "on"  ? "1" : "0",
            'weight' => $request->weight,
           'original' =>$request->original == "on" ? "1" : "0",
            'special' => $request->special == "on" ? "1" : "0",
            'order_count' => $request->order_count,
            'number' => $request->number,
            'part_number' => $request->part_number,
            'body' => $request->body,
            'price' => $request->price,
            'price_from' => $request->price_from,
            'price_to' => $request->price_to,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'technical_specifications' => $request->technical_specifications,
            'accessories' => $request->accessories
        ]);

        if($request->img != null){
            $file= $request->file('img');

            $year = now()->year ;
            $month = now()->month;
            $full_name = $year.'-'.$month.basename($file->getClientOriginalName(), '.'.$file->getClientOriginalExtension()).Str::random(3).'.'.$file->getClientOriginalExtension();
            $product->update([
                'img' => "$full_name"
            ]);
            $file->move(public_path('/Products/'),$full_name );
        }

        if(!is_null($request->brands)){
            $product->brands()->syncWithoutDetaching($request->brands);
        }
        if(!is_null($request->colors)){
            $product->colors()->syncWithoutDetaching($request->colors);
        }
        if(!is_null($request->tags)){
            $product->tags()->syncWithoutDetaching($request->tags);
        }


        return redirect()->route('products.index')->with(['flash_message' => __('admin.products.add-suc')]);
    }

    public function updateForm(Product $product)
    {
        $brands = Brand::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $tags = Tag::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $warranties = Warranty::where('status' , '=' , 1)->where('deleted_at' , '=', null)->get();
        $now = Carbon::now();
        $coupons = Product\Coupon::where('expires_at' , '>=' , $now)->get();
        $colors = Color::all();
        $child_sub_categories = ChildSubCategory::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();

//        dd($up_tags , $up_colors , $up_brands);
        $data = [
            'product' => $product,
            'colors' => $colors,
            'brands' => $brands,
            'tags' => $tags,
            'warranties' => $warranties,
            'coupons' => $coupons,
            'child_sub_categories' => $child_sub_categories,
//            'up_colors' => $up_colors,
//            'up_brands' => $up_brands,
//            'up_tags' => $up_tags,
        ];
        return view('base.admin.dashboard.product.updateProduct' ,$data );
    }

    public function update(Request $request ,Product $product)
    {
        $this->validateForm($request);
        $product->update([
            'vendor' => 1,
            'title' => $request->title,
            'name' => $request->name,
            'status' => $request->status == "on"  ? "1" : "0",
            'child_sub_category_id' => $request->child_sub_category_id,
            'publish' => $request->publish == "on"  ? "1" : "0",
            'weight' => $request->weight,
            'original' =>$request->original == "on" ? "1" : "0",
            'special' => $request->special == "on" ? "1" : "0",
            'order_count' => $request->order_count,
            'part_number' => $request->part_number,
            'body' => $request->body,
            'price' => $request->price,
            'price_from' => $request->price_from,
            'price_to' => $request->price_to,
            'discount_price' => $request->discount_price,
            'description' => $request->description,
            'technical_specifications' => $request->technical_specifications,
            'accessories' => $request->accessories
        ]);
        if(!is_null($request->brands)){
            $product->brands()->sync($request->brands);
        }
        if(!is_null($request->colors)){
            $product->colors()->sync($request->colors);
        }
        if(!is_null($request->tags)){
            $product->tags()->sync($request->tags);
        }
        return redirect()->route('products.index')->with(['flash_message' => __('admin.products.update-suc')]);
    }

    protected function validateProductSinglrForm(Request $request , Product $product){
        return $this->validate($request , [
           'name' => 'required' ,
           'img' => 'required|image|max:2056' ,
        ]);
    }
    protected function validateForm(Request $request){
      return $this->validate($request , [
          'title' => 'required',
          'name' => 'required',
          'status' => 'nullable',
          'child_sub_category_id' => 'required',
          'brands' => 'required',
          'publish' => 'nullable',
          'tags' => 'required',
          'colors' => 'required',
          'weight' => 'nullable',
          'original' => 'nullable',
          'special' => 'nullable',
          'order_count' => 'nullable',
          'body' => 'nullable',
          'price' => 'nullable',
          'price_from' => 'nullable',
          'price_to' => 'nullable',
          'discount_price' => 'nullable',
          'description' => 'nullable',
          'technical_specifications' => 'nullable',
          'accessories' => 'nullable'
      ]);
    }


    public function getProductBrands(Product $product)
    {
        return $product->brands;
    }

    public function addAttributeForm(Product  $product)
    {


            $data = [
                'product' => $product,
            ];

        return view('base.admin.dashboard.product.attributes.createForm' , $data);

    }

    public function addAttribute(Product  $product , Request  $request)
    {
        if($product->pattribute){
            $this->updateProductAttributes($request , $product);
            return redirect()->route('products.index')->with(['flash_message' => __('admin.products.attributes.update-product-attribute')]);
        }
        //create attributes
       Product\Pattribute::create([
           'cctv_group' => $request->input('cctv_group'),
           'cctv_type' => $request->input('cctv_group'),
           'cctv_power_source' => $request->input('cctv_power_source'),
           'cctv_outdoor_use' => $request->input('cctv_outdoor_use'),
           'cctv_sensor' => $request->input('cctv_sensor'),
           'cctv_compression' => $request->input('cctv_compression'),
           'cctv_resolution' => $request->input('cctv_resolution'),
           'lenz' => $request->input('lenz'),
           'viewing_angle' => $request->input('viewing_angle'),
           'range_pan_horizontal_movement' => $request->input('range_pan_horizontal_movement'),
           'rang_tilt_vertical_movement' => $request->input('rang_tilt_vertical_movement'),
           'cctv_ai_programming' => $request->input('cctv_ai_programming'),
           'cctv_temperature_of_performance' => $request->input('cctv_temperature_of_performance'),
           'max_frame' => $request->input('max_frame'),
           'range_dynamics' => $request->input('range_dynamics'),
           'record_day_night' => $request->input('record_day_night'),
           'cctv_resolution_ability' => $request->input('cctv_resolution_ability'),
           'night_vision' => $request->input('night_vision'),
           'min_colored_light' => $request->input('min_colored_light'),
           'optical_magnification' => $request->input('optical_magnification'),
           'cctv_voice' => $request->input('cctv_voice'),
           'cctv_memory_card_slot' => $request->input('cctv_memory_card_slot'),
           'cctv_resistance_to_vandalism' => $request->input('cctv_resistance_to_vandalism'),
           'product_id' => $product->id
       ]);

        return redirect()->route('products.index')->with(['flash_message' => __('admin.products.attributes.create-product-attribute')]);

    }

    public function updateProductAttributes(Request $request,Product $product)
    {
        $product->pattribute->update([
            'cctv_group' => $request->input('cctv_group'),
            'cctv_type' => $request->input('cctv_type'),
            'cctv_power_source' => $request->input('cctv_power_source'),
            'cctv_outdoor_use' => $request->input('cctv_outdoor_use'),
            'cctv_sensor' => $request->input('cctv_sensor'),
            'cctv_compression' => $request->input('cctv_compression'),
            'cctv_resolution' => $request->input('cctv_resolution'),
            'lenz' => $request->input('lenz'),
            'viewing_angle' => $request->input('viewing_angle'),
            'range_pan_horizontal_movement' => $request->input('range_pan_horizontal_movement'),
            'rang_tilt_vertical_movement' => $request->input('rang_tilt_vertical_movement'),
            'cctv_ai_programming' => $request->input('cctv_ai_programming'),
            'cctv_temperature_of_performance' => $request->input('cctv_temperature_of_performance'),
            'max_frame' => $request->input('max_frame'),
            'range_dynamics' => $request->input('range_dynamics'),
            'record_day_night' => $request->input('record_day_night'),
            'cctv_resolution_ability' => $request->input('cctv_resolution_ability'),
            'night_vision' => $request->input('night_vision'),
            'min_colored_light' => $request->input('min_colored_light'),
            'optical_magnification' => $request->input('optical_magnification'),
            'cctv_voice' => $request->input('cctv_voice'),
            'cctv_memory_card_slot' => $request->input('cctv_memory_card_slot'),
            'cctv_resistance_to_vandalism' => $request->input('cctv_resistance_to_vandalism'),
            'product_id' => $product->id
        ]);
    }

//    protected function validateAttributeForm(Request  $request){
//       $request->validate([
//           'cctv_group' => '',
//           'cctv_power_source' => '',
//           'cctv_outdoor_use' => '',
//           'cctv_sensor' => '',
//           'cctv_compression' => '',
//           'cctv_resolution' => '',
//           'lenz' => '',
//           'viewing_angle' => '',
//           'range_pan_horizontal_movement' => '',
//           'rang_tilt_vertical_movement' => '',
//           'cctv_ai_programming' => '',
//           'cctv_temperature_of_performance' => '',
//           'max_frame' => '',
//           'range_dynamics' => '',
//           'record_day_night' => '',
//           'cctv_resolution_ability' => '',
//           'night_vision' => '',
//           'min_colored_light' => '',
//           'optical_magnification' => '',
//           'cctv_voice' => '',
//           'cctv_memory_card_slot' => '',
//           'cctv_resistance_to_vandalism' => '',
//           'product_id'
//       ]);
//    }



//    public function getBrands()
//    {
//
//    }
//    public function getColors()
//    {
//
//    }
//    public function getTags()
//    {
//
//    }
}

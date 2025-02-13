<?php

namespace App\Http\Livewire\Admin\Dashboard\Product;

use App\Models\Brand;
use App\Models\ChildSubCategory;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Create extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Product $product;
    public $img ;

    function rules(){
        return[
            'product.title' => 'required |min:3|max:60' ,
            'product.name' =>'required |min:3|max:60' ,
            'product.link' =>'required|unique:products,link,'.($this->product->id),
            'product.status' =>'nullable' ,
            'product.child_sub_category' => 'required',
            'product.color_id' => 'nullable',
            'product.brand_id' => 'required',
            'product.tags' => 'nullable',
            'product.body' => 'required',
            'product.description' => 'required',
            'product.price' => 'required_with:price_from',
            'product.price_from' => 'nullable',
            'product.price_to' => 'nullable',
            'product.discount_price' => 'nullable',
            'product.number' => 'nullable',
            'product.weight' => 'nullable',
            'product.publish' => 'nullable',
            'product.view' => 'nullable',
            'product.gift' => 'nullable',
            'product.shipment' => 'nullable',
            'product.original' => 'nullable',
            'product.order_count' => 'nullable',
            'product.special' => 'nullable',
            'product.img' =>'required|image|max:1024' ,
        ];
    }
    public function mount()
    {
        $this->product = new Product();
    }
    public function render()
    {

        $brands = Brand::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();
        $child_sub_categories = ChildSubCategory::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();
        $data = [
          'child_sub_categories' => $child_sub_categories,
          'brands' => $brands
        ];
        return view('livewire.admin.dashboard.product.create' , $data);
    }
    public function productForm()
    {

        $this->validate();
        dd($this->validate());
        if(isset($this->img)){
            $this->product->img = $this->uploadImage();
        }
        $this->product->save();
        $this->reset(['img']);

        $this->emit('toast' , 'success' , __('admin.products.add-suc'));
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $day = now()->day;
        $directory = "Products/$year/$month/$day";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
}

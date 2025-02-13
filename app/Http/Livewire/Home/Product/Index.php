<?php

namespace App\Http\Livewire\Home\Product;

use App\Models\Color;
use App\Models\Product;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Index extends Component
{

    public  $product;

    public function mount($id)
    {
        $product = Product::find($id);
        $this->product = $product;
    }

    public function render()
    {
        $sahProductPath = Request::segment(2);
        $product_id = explode('-' , $sahProductPath)[1];
        $product =Product::find($product_id);
        $data = [
            'product' => $product ,
        ];

//        dd($product->colors->count());
//        dd($product->child_sub_category->subCategory->category);
        return view('livewire.home.product.index' , $data)->layout('layouts.front-livewire');
    }






}

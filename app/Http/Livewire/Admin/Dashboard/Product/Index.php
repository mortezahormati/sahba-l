<?php

namespace App\Http\Livewire\Admin\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public $search;
    protected $queryString = ['search'];

    public function render()
    {
        $count_trash = Product::onlyTrashed()->count();
        $products =
            Product::where('title' , 'LIKE' , "%{$this->search}%")
                ->orWhere('name' , 'LIKE' , "%{$this->search}%")
                ->orWhere('part_number' , 'LIKE' , "%{$this->search}%")
                ->orWhere('link' , 'LIKE' , "%{$this->search}%")
                ->orWhere('description' , 'LIKE' , "%{$this->search}%")
                ->orWhere('id' , 'LIKE' , $this->search)
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'products' => $products ,
            'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.product.index' ,$data);
    }

    public function disableProductStatus($id)
    {
        $product = Product::find($id);
        $product->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.disableCategoryStatus'));
    }

    public function enableProductStatus($id)
    {
        $product = Product::find($id);
        $product->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.enableCategoryStatus'));
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        $product->delete();
    }
}

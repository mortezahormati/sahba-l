<?php

namespace App\Http\Livewire\Admin\Dashboard\Product;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public Product $product;

    public $readyToLoad = false;

    public function mount()
    {
        $this->product = new Product();
    }

    public function render()
    {
        $products = DB::table('products')->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table')) ;
        return view('livewire.admin.dashboard.product.trash' , compact('products'));
    }

    public function forceDeleteProduct($id)
    {
        $product = Product::withTrashed()->find($id);
        if(!is_null($product->deleted_at)){
            $product->forceDelete();
        }
        $this->emit('toast' , 'success' , __('admin.products.force-delete-suc'));
    }

    public function restoreProduct($id)
    {
        Product::withTrashed()->where('id' , $id)->first()->restore();
        $this->emit('toast' , 'success' , __('admin.products.restore-suc'));
    }
}

<?php

namespace App\Http\Livewire\Admin\Dashboard\Brand;

use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public Brand $brand;
    public $img ;


//    protected $queryString = ['search'];

    public function mount()
    {
        $this->brand = new Brand();
    }

    public function loadBrandTrash(){
        $this->readyToLoad =true;
    }
    public function render()
    {
        $brands =  DB::table('brands')->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table'));
        return view('livewire.admin.dashboard.brand.trash' , compact('brands'));
    }


    public function forceDeleteBrand($id)
    {
        $brand = Brand::withTrashed()->find($id);
        if(!is_null($brand->deleted_at)){
            $brand->forceDelete();
        }
        $this->emit('toast' , 'success' , __('admin.brands.force-delete-suc'));
    }

    public function restoreBrand($id)
    {
        Brand::withTrashed()->where('id' , $id)->first()->restore();
        $this->emit('toast' , 'success' , __('admin.brands.restore-suc'));
    }

}

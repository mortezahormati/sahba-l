<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trashed extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public Category $category;
    public $img ;



    public function mount()
    {
        $this->category = new Category();
    }


    public function render()
    {
        $categories = DB::table('categories')->whereNotNull('deleted_at')
                ->latest()
                ->paginate(config('services.paginate.table'));
        return view('livewire.admin.dashboard.categories.trashed' , compact('categories'));
    }


    public function forceDeleteCategory($id)
    {
        $category = Category::withTrashed()->find($id);
        if(!is_null($category->deleted_at)){
            $category->forceDelete();
        }
        $this->emit('toast' , 'success' , __('admin.categories.force-delete-suc'));
    }

    public function restoreCategory($id)
    {
        Category::withTrashed()->where('id' , $id)->first()->restore();
        $this->emit('toast' , 'success' , __('admin.categories.restore-suc'));
    }

}

<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\SubCategory;

use App\Models\SubCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trash extends Component
{


    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public SubCategory $subCategory;
    public $img;
    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->subCategory = new SubCategory();
    }



    public function render()
    {
        $subCategories =  DB::table('sub_categories')
            ->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table'));
        return view('livewire.admin.dashboard.categories.sub-category.trash', compact('subCategories'));
    }


    public function forceDeleteSubCategory($id)
    {
        $category = SubCategory::withTrashed()->find($id);
        if (!is_null($category->deleted_at)) {
            $category->forceDelete();
        }
        $this->emit('toast', 'success', __('admin.categories.subCategories.force-delete-suc'));
    }

    public function restoreSubCategory($id)
    {
        SubCategory::withTrashed()->where('id', $id)->first()->restore();
        $this->emit('toast', 'success', __('admin.categories.subCategories.restore-suc'));
    }

}

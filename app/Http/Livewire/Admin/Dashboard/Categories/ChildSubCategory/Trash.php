<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory;

use App\Models\ChildSubCategory;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public ChildSubCategory $childSubCategory;
    public $img;
    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->childSubCategory = new ChildSubCategory();
    }



    public function render()
    {
        $childSubCategories = DB::table('child_sub_categories')
            ->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table'));
        return view('livewire.admin.dashboard.categories.child-sub-category.trash', compact('childSubCategories'));
    }


    public function forceDeleteChildSubCategory($id)
    {
        $category = ChildSubCategory::withTrashed()->find($id);
        if (!is_null($category->deleted_at)) {
            $category->forceDelete();
        }
        $this->emit('toast', 'success', __('admin.categories.subCategories.force-delete-suc'));
    }

    public function restoreChildSubCategory($id)
    {
        ChildSubCategory::withTrashed()->where('id', $id)->first()->restore();
        $this->emit('toast', 'success', __('admin.categories.subCategories.restore-suc'));
    }

}

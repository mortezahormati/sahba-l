<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory;

use App\Models\ChildSubCategory;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public ChildSubCategory $childSubCategory;
    public $img;
    public $search;
    protected $queryString = ['search'];

    function rules(){
        return [
            'childSubCategory.title' => 'required |min:3|max:60' ,
            'childSubCategory.name' =>'required |min:3|max:60' ,
            'childSubCategory.link' =>'required|unique:child_sub_categories,link,'.($this->childSubCategory->id) ,
            'childSubCategory.status' =>'nullable' ,
            'childSubCategory.sub_parent' =>'required' ,
            'img' =>'nullable|image|max:1024' ,
        ];
    }
    public function mount()
    {
        $this->childSubCategory = new ChildSubCategory();
    }

    public function render()
    {
        $count_trash = ChildSubCategory::onlyTrashed()->count();
        $subCategories = SubCategory::where('status' , '=' , '1')->whereNull('deleted_at')->get();
        $search =$this->search;
        $childSubCategories =
            ChildSubCategory::where('title' , 'LIKE' , "%{$search}%")
                ->orWhere('name' , 'LIKE' , "%{$search}%")
                ->orWhere('link' , 'LIKE' , "%{$search}%")
                ->orWhere('id' , 'LIKE' , $search)
                ->orWhereHas('subCategory' , function ($query) use ($search){
                    $query->where('title', 'LIKE', "%{$search}%");
                })
                ->latest()->paginate(config('services.paginate.table'));
        $data = [
            'subCategories' => $subCategories,
            'childSubCategories' => $childSubCategories,
            'count_trash' => $count_trash,
        ];
        return view('livewire.admin.dashboard.categories.child-sub-category.index' ,$data);
    }
    public function childSubCategoryForm()
    {
        $this->validate();

        if($this->img){
            $this->childSubCategory->img = $this->uploadImage();
        }
        $this->childSubCategory->save();
        session()->flash('flash_message_success' , __('admin.categories.subCategories.childSubCategories.add-suc'));
        return redirect()->route('child-sub-categories.index');

    }
    public function uploadImage()
    {
        if($this->img) {
            $year = now()->year;
            $month = now()->month;
            $directory = "childSubCategory/$year/$month";
            $full_name = basename($this->img->getClientOriginalName(), '.' . $this->img->getClientOriginalExtension()) . \Str::random(3) . '.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs($directory, $full_name);
            return "$directory/$full_name";
        }
        else{
            return null;
        }
    }

    public function disableChildSubCategoryStatus($id)
    {
        $childSubCategory = ChildSubCategory::find($id);
        $childSubCategory->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.subCategories.childSubCategories.disableChildSubCategoryStatus'));
    }
    public function enableChildSubCategoryStatus($id)
    {
        $childSubCategory = ChildSubCategory::find($id);
        $childSubCategory->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.subCategories.childSubCategories.enableSChildSubCategoryStatus'));
    }

    public function deleteChildSubCategory($id)
    {
        $childSubCategory = ChildSubCategory::find($id);
        if($childSubCategory->status == 0){
            $childSubCategory->delete();
            $this->emit('toast' , 'success' , __('admin.categories.subCategories.childSubCategories.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.categories.subCategories.childSubCategories.status-not-deactive'));
        }
    }
}

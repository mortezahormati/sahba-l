<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\SubCategory;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{


    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public SubCategory $subCategory;
    public $img , $title;
    public $search;

    protected $queryString = ['search'];

    function rules(){
        return [
            'subCategory.title' => 'required |min:3|max:60' ,
            'subCategory.name' =>'required |min:3|max:60' ,
            'subCategory.link' =>'required|unique:sub_categories,link,'.($this->subCategory->id) ,
            'subCategory.status' =>'nullable' ,
            'subCategory.parent' =>'required' ,
            'img' =>'nullable|image|max:1024' ,
        ];
    }
    public function mount()
    {
        $this->subCategory = new SubCategory();
    }


    public function render()
    {
        $count_trash = SubCategory::onlyTrashed()->count();

        $categories = Category::where('status' , '=' , '1')->whereNull('deleted_at')->get();
        $search =$this->search;
        $subCategories =
            SubCategory::where('title' , 'LIKE' , "%{$search}%")
                ->orWhere('name' , 'LIKE' , "%{$search}%")
                ->orWhere('link' , 'LIKE' , "%{$search}%")
                ->orWhere('id' , 'LIKE' , $search)
                ->orWhereHas('category' , function ($query) use ($search){
                    $query->where('title', 'LIKE', "%{$search}%");
                })
                ->latest()->paginate(config('services.paginate.table')) ;
        $data = [
            'categories' => $categories ,
            'subCategories' => $subCategories,
            'count_trash' => $count_trash,
        ];
        return view('livewire.admin.dashboard.categories.sub-category.index' ,$data);
    }

    public function subCategoryForm()
    {
        $this->validate();

        if($this->img){
            $this->subCategory->img = $this->uploadImage();
        }

        $this->subCategory->save();

        session()->flash('flash_message_success' , __('admin.categories.subCategories.add-suc'));
        return redirect()->route('sub-categories.index');

    }
    public function uploadImage()
    {
        if($this->img) {
            $year = now()->year;
            $month = now()->month;
            $directory = "subCategory/$year/$month";
            $full_name = basename($this->img->getClientOriginalName(), '.' . $this->img->getClientOriginalExtension()) . \Str::random(3) . '.' . $this->img->getClientOriginalExtension();
            $this->img->storeAs($directory, $full_name);
            return "$directory/$full_name";
        }
        else{
            return null;
        }
    }

    public function disableSubCategoryStatus($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.disableCategoryStatus'));
    }
    public function enableSubCategoryStatus($id)
    {
        $subCategory = SubCategory::find($id);
        $subCategory->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.enableCategoryStatus'));
    }

    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::find($id);
        if($subCategory->status == 0){
            $subCategory->delete();
            $this->emit('toast' , 'success' , __('admin.categories.subCategories.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.categories.subCategories.status-not-deactive'));
        }

    }

}

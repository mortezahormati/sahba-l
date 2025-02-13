<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\SubCategory;

use App\Models\Category;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateSubCategory extends Component
{
    use WithFileUploads ;
    public SubCategory $subCategory;
    public $img;

    protected $rules = [
        'subCategory.title' => 'required |min:3|max:60',
        'subCategory.name' =>'required |min:3|max:60',
        'subCategory.link' =>'required',
        'subCategory.status' =>'nullable',
        'subCategory.parent' =>'required' ,
        'img' =>'nullable|image|max:1024',
    ];
    public function render()
    {
        $subCategory = $this->subCategory;
        $categories = Category::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();

        $img = $subCategory->img;
        $data = [
            'subCategory' =>$subCategory,
            'img' => $img,
            'categories' => $categories
        ];
        return view('livewire.admin.dashboard.categories.sub-category.update-sub-category', $data);
    }
    public function updateSubCategory()
    {
        $this->validate();
        if($this->img){
            $this->subCategory->img = $this->uploadImage();
        }
        $this->subCategory->save();
        if(!$this->subCategory->status){
            $this->subCategory->update([
                'status' => 0
            ]);
        }
        session()->flash('flash_message_success' ,  __('admin.categories.update-suc'));
        return redirect()->route('sub-categories.index');
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "subCategory/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).\Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
}

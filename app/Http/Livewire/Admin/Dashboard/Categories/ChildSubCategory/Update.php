<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories\ChildSubCategory;

use App\Models\ChildSubCategory;
use App\Models\SubCategory;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads;
    public ChildSubCategory $childSubCategory;
    public $img;
    public function render()
    {
        $childSubCategory = $this->childSubCategory;
        $img = $childSubCategory->img;
        $subCategories = SubCategory::where('status' , '=' , 1)->where('deleted_at' , '=' , null)->get();
        $data = [
            'childSubCategory' =>$childSubCategory,
            'img' => $img,
            'subCategories' => $subCategories
        ];
        return view('livewire.admin.dashboard.categories.child-sub-category.update', $data);
    }
    protected $rules = [
        'childSubCategory.title' => 'required |min:3|max:60',
        'childSubCategory.name' => 'required |min:3|max:60',
        'childSubCategory.link' => 'required',
        'childSubCategory.status' => 'nullable',
        'childSubCategory.sub_parent' => 'required',
        'img' => 'nullable|image|max:1024',
    ];

    public function updateChildSubCategory()
    {
        $this->validate();
        if (isset($this->img)) {
            $this->childSubCategory->img = $this->uploadImage();
        }
        $this->childSubCategory->save();
        if(!$this->childSubCategory->status){
            $this->childSubCategory->update([
                'status' => 0
            ]);
        }
        session()->flash('flash_message_success' ,  __('admin.categories.update-suc'));
        return redirect()->route('child-sub-categories.index');
    }
    public function uploadImage()
    {
        $year = now()->year;
        $month = now()->month;
        $directory = "childSubCategory/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.' . $this->img->getClientOriginalExtension()) . \Str::random(3) . '.' . $this->img->getClientOriginalExtension();
        $this->img->storeAs($directory, $full_name);
        return "$directory/$full_name";
    }
}

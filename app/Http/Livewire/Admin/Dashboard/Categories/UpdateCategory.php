<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdateCategory extends Component
{
    use WithFileUploads ;
    public Category $category;
    public $img;

    protected $rules = [
        'category.title' => 'required |min:3|max:60' ,
        'category.name' =>'required |min:3|max:60' ,
        'category.link' =>'required' ,
        'category.status' =>'nullable' ,
        'img' =>'nullable|image|max:1024' ,
    ];
    public function render()
    {
        $category = $this->category;

        $img = $category->img;
        return view('livewire.admin.dashboard.categories.update-category', compact('category' , 'img'));
    }
    public function updateCategory()
    {

        $this->validate();
        if(isset($this->img)){
           $this->category->img = $this->uploadImage();
        }
        $this->category->save();
        if(!$this->category->status){
            $this->category->update([
               'status' => 0
            ]);
        }
        session()->flash('flash_message_success' ,  __('admin.categories.add-suc'));
        return redirect()->route('categories.index');
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "Category/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).\Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
}

<?php

namespace App\Http\Livewire\Admin\Dashboard\Categories;


use App\Models\AiLogReport;
use App\Models\Category;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Category $category;
    public $img ;
    public $readyToLoad = false;
    public $search;
    protected $queryString = ['search'];

    function rules(){
        return[
            'category.title' => 'required |min:3|max:60' ,
            'category.name' =>'required |min:3|max:60' ,
            'category.link' =>'required|unique:categories,link,'.($this->category->id),
            'category.status' =>'nullable' ,
            'img' =>'required|image|max:1024' ,
        ];
    }
    public function mount()
    {
        $this->category = new Category();
    }


    public function render()
    {
        $count_trash = Category::onlyTrashed()->count();
        $categories =
                    Category::where('title' , 'LIKE' , "%{$this->search}%")
                            ->orWhere('name' , 'LIKE' , "%{$this->search}%")
                            ->orWhere('link' , 'LIKE' , "%{$this->search}%")
                            ->orWhere('id' , 'LIKE' , $this->search)
                    ->latest()->paginate(config('services.paginate.table')) ;
        $data =[
          'categories' => $categories ,
          'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.categories.index' ,$data);
    }

    public function categoryForm()
    {
        $this->validate();
        if(isset($this->img)){
            $this->category->img = $this->uploadImage();
        }
         $this->category->save();
        session()->flash('flash_message_success' , __('admin.categories.add-suc'));
        return redirect()->route('categories.index');

    }


    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "Category/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
    public function disableCategoryStatus($id)
    {
        $category = Category::find($id);
        $category->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.disableCategoryStatus'));
    }
    public function enableCategoryStatus($id)
    {
        $category = Category::find($id);
        $category->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.categories.enableCategoryStatus'));
    }


    public function deleteCategory($id)
    {
        $category = Category::find($id);
        if($category->status == 0){
            $category->delete();
            $this->emit('toast' , 'success' , __('admin.categories.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.categories.status-not-deactive'));
        }
    }
}

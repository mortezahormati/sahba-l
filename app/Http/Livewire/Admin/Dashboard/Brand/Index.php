<?php

namespace App\Http\Livewire\Admin\Dashboard\Brand;

use App\Models\Brand;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Brand $brand;
    public $img ;
    public $search;
    protected $queryString = ['search'];

    function rules(){
        return[
            'brand.title' => 'required |min:3|max:60' ,
            'brand.name' =>'required |min:3|max:60' ,
            'brand.link' =>'required|unique:brands,link,'.($this->brand->id),
            'brand.status' =>'nullable' ,
            'img' =>'required|image|max:1024' ,
        ];
    }
    public function mount()
    {
        $this->brand = new Brand();
    }

    public function render()
    {
        $count_trash = Brand::onlyTrashed()->count();
        $brands =
            Brand::where('title' , 'LIKE' , "%{$this->search}%")
                ->orWhere('name' , 'LIKE' , "%{$this->search}%")
                ->orWhere('link' , 'LIKE' , "%{$this->search}%")
                ->orWhere('id' , 'LIKE' , $this->search)
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'brands' => $brands ,
            'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.brand.index' ,$data);
    }

    public function brandForm()
    {
        $this->validate();
        if(isset($this->img)){
            $this->brand->img = $this->uploadImage();
        }
        $this->brand->save();
        session()->flash('flash_message_success' , __('admin.brands.add-suc'));
        return redirect()->route('brands.index');
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "Brand/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
    public function disableBrandStatus($id)
    {
        $brand = Brand::find($id);
        $brand->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
    }
    public function enableBrandStatus($id)
    {
        $brand = Brand::find($id);
        $brand->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
    }


    public function deleteBrand($id)
    {
        $brand = Brand::find($id);
        if($brand->status == 0){
            $brand->delete();
            $this->emit('toast' , 'success' , __('admin.brands.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.brands.status-not-deactive'));
        }
    }




}

<?php

namespace App\Http\Livewire\Admin\Dashboard\Brand;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads ;
    public Brand $brand;
    public $img;

    function rules(){
        return[
            'brand.title' => 'required |min:3|max:60' ,
            'brand.name' =>'required |min:3|max:60' ,
            'brand.link' =>'required|unique:brands,link,'.($this->brand->id),
            'brand.status' =>'nullable' ,
            'img' =>'nullable|image|max:1024' ,
        ];
    }

    public function render()
    {
        $brand = $this->brand;
        $img = $brand->img;
        $data = [
            'brand' => $brand ,
            'img' => $img
        ];
        return view('livewire.admin.dashboard.brand.update', $data);
    }

    public function updateBrand()
    {
        $this->validate();
        if(isset($this->img)){
            $this->brand->img = $this->uploadImage();
        }
        $this->brand->save();
        if(!$this->brand->status){
            $this->brand->update([
                'status' => 0
            ]);
        }
        session()->flash('flash_message_success' ,  __('admin.brands.update-suc'));
        return redirect()->route('brands.index');
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "Brand/$year/$month";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).\Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }

}

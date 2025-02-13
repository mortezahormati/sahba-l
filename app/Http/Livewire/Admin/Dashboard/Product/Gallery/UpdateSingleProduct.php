<?php

namespace App\Http\Livewire\Admin\Dashboard\Product\Gallery;

use App\Models\Gallery;
use App\Models\Product;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class UpdateSingleProduct extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Gallery $gallery;
    public $img;

    function rules(){
        return[
            'gallery.name' => 'required |min:3|max:60' ,
            'gallery.position' => 'nullable' ,
            'gallery.status' =>'nullable' ,
            'gallery.product_id' =>'nullable',
            'img' =>'required|image|max:1024',
        ];
    }

    public function galleryForm()
    {
        dd($this->validate());
        $this->validate();

        if(isset($this->img)){
            $this->gallery->img = $this->uploadImage();
        }
        $this->gallery->save();

        session()->flash('flash_message_success' , __('admin.gallery.add-suc'));

        return redirect()->route('products.gallery.index');

    }

    public function render()
    {
        $gallery = $this->gallery;
        $img = $gallery->img;
        $data = [
          'gallery' => $gallery ,
            'img' => $img
        ];
        return view('livewire.admin.dashboard.product.gallery.update-single-product' , $data);
    }

    public function uploadImage()
    {
        $year = now()->year ;
        $month = now()->month;
        $directory = "Gallery/$year/$month/";
        $full_name = basename($this->img->getClientOriginalName(), '.'.$this->img->getClientOriginalExtension()).Str::random(3).'.'.$this->img->getClientOriginalExtension();
        $this->img->storeAs($directory , $full_name);
        return "$directory/$full_name";
    }
    public function disableGalleryStatus($id)
    {
        $gallery = Gallery::find($id);
        $gallery->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.products.gallery.disableGalleryStatus'));
    }
    public function enableGalleryStatus($id)
    {
        $gallery = Gallery::find($id);
        $gallery->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.products.gallery.enableGalleryStatus'));
    }

    public function deleteGallery($id)
    {
        $gallery  =Gallery::find($id);
        if($gallery->status == 0){
            $gallery->delete();
            $this->emit('toast' , 'success' , __('admin.products.gallery.remove-complete'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.products.gallery.status-not-deactive'));
        }
    }


}

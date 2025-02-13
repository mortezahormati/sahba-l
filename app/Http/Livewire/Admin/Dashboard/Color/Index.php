<?php

namespace App\Http\Livewire\Admin\Dashboard\Color;

use App\Models\Color;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Color $color;
    public $search;


    protected $queryString = ['search'];

    function rules(){
        return[
            'color.name' => 'required |min:3|max:60' ,
            'color.color_palette' => 'required |min:3|max:10' ,
        ];
    }
    public function mount()
    {
        $this->color = new Color();
    }

    public function render()
    {
        $count_trash = Color::onlyTrashed()->count();
        $colors =
            Color::where('name' , 'LIKE' , "%{$this->search}%")
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'colors' => $colors ,
            'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.color.index' ,$data);
    }

    public function colorForm()
    {

        $this->validate();
        $color = $this->color->save();
        session()->flash('flash_message_success', __('admin.colors.add-suc'));
        return redirect()->route('colors.index');
    }

//    public function disableColorStatus($id)
//    {
//        $color = Color::find($id);
//        $color->update([
//            'status' => 0
//        ]);
//        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
//    }

//    public function enableColorStatus($id)
//    {
//        $color = Color::find($id);
//        $color->update([
//            'status' => 1
//        ]);
//        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
//    }

    public function deleteColor($id)
    {
        $color = Color::find($id);

            $color->forceDelete();
            $this->emit('toast' , 'success' , __('admin.colors.remove'));

    }

}

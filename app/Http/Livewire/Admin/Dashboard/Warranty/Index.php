<?php

namespace App\Http\Livewire\Admin\Dashboard\Warranty;

use App\Models\Warranty;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Warranty $warranty;
    public $search;
    protected $queryString = ['search'];

    function rules(){
        return[
            'warranty.name' => 'required |min:3|max:60' ,
            'warranty.status' =>'nullable' ,
        ];
    }
    public function mount()
    {
        $this->warranty = new Warranty();
    }

    public function render()
    {
        $count_trash = Warranty::onlyTrashed()->count();
        $warranties =
            Warranty::where('name' , 'LIKE' , "%{$this->search}%")
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'warranties' => $warranties ,
            'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.warranty.index' ,$data);
    }

    public function warrantyForm()
    {
        $this->validate();
        if($this->warranty->status == null ){
            $this->warranty->status = 0 ;
        }
        $this->warranty->save();
        session()->flash('flash_message_success', __('admin.warranties.add-suc'));
        return redirect()->route('warranties.index');
    }

    public function disableWarrantyStatus($id)
    {
        $warranty = Warranty::find($id);
        $warranty->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
    }

    public function enableWarrantyStatus($id)
    {
        $warranty = Warranty::find($id);
        $warranty->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
    }

    public function deleteWarranty($id)
    {
        $warranty = Warranty::find($id);
        if($warranty->status == 0){
            $warranty->delete();
            $this->emit('toast' , 'success' , __('admin.warranties.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.warranties.status-not-deactive'));
        }
    }



}

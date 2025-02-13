<?php

namespace App\Http\Livewire\Admin\Dashboard\Warranty;

use App\Models\Warranty;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;


    public $paginationTheme = 'bootstrap';
    public Warranty $warranty;
    public $img ;


//    protected $queryString = ['search'];

    public function mount()
    {
        $this->warranty = new Warranty();
    }


    public function render()
    {
        $warranties =  DB::table('warranties')->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table')) ;
        return view('livewire.admin.dashboard.warranty.trash' , compact('warranties'));
    }


    public function forceDeleteWarranty($id)
    {
        $warranty = Warranty::withTrashed()->find($id);
        if(!is_null($warranty->deleted_at)){
            $warranty->forceDelete();
        }
        $this->emit('toast' , 'success' , __('admin.warranties.force-delete-suc'));
    }

    public function restoreWarranty($id)
    {
        Warranty::withTrashed()->where('id' , $id)->first()->restore();
        $this->emit('toast' , 'success' , __('admin.warranties.restore-suc'));
    }

}

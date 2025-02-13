<?php

namespace App\Http\Livewire\Admin\Dashboard\Warranty;

use App\Models\Warranty;
use Livewire\Component;
use Livewire\WithFileUploads;

class Update extends Component
{
    use WithFileUploads ;
    public Warranty $warranty;


    function rules(){
        return[
            'warranty.name' =>'required |min:3|max:60' ,
            'warranty.status' =>'nullable' ,
        ];
    }

    public function render()
    {
        $warranty = $this->warranty;
        $data = [
            'warranty' => $warranty ,
        ];
        return view('livewire.admin.dashboard.warranty.update', $data);
    }
    public function updateWarranty()
    {
        $this->validate();
        $this->warranty->save();
        if(!$this->warranty->status){
            $this->warranty->update([
                'status' => 0
            ]);
        }
        $this->emit('toast' , 'success' , __('admin.warranties.add-suc'));
        return redirect(route('warranties.index'));
    }

}

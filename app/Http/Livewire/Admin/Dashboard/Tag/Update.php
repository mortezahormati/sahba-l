<?php

namespace App\Http\Livewire\Admin\Dashboard\Tag;

use App\Models\Tag;
use Livewire\Component;

class Update extends Component
{
    public Tag $tag;

    function rules(){
        return[
            'tag.name' =>'required |min:3|max:60' ,
            'tag.link' =>'required|unique:tags,link,'.($this->tag->id),
            'tag.status' =>'nullable' ,
        ];
    }


    public function render()
    {
       $tag = $this->tag;
        $data = [
            'tag' => $tag ,
        ];
        return view('livewire.admin.dashboard.tag.update', $data);
    }

    public function updateTag()
    {
        $this->validate();
        $this->tag->save();
        if(!$this->tag->status){
            $this->tag->update([
                'status' => 0
            ]);
        }
        session()->flash('flash_message_success' ,  __('admin.tags.update-suc'));
        return redirect()->route('tags.index');
    }


}

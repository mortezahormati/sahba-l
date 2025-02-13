<?php

namespace App\Http\Livewire\Admin\Dashboard\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public Tag $tag;
    public $search;
    protected $queryString = ['search'];

    function rules(){
        return[
            'tag.name' => 'required |min:3|max:60' ,
            'tag.status' =>'nullable' ,
            'tag.link' =>'required|unique:tags,link,'.($this->tag->id),
        ];
    }
    public function mount()
    {
        $this->tag = new Tag();
    }

    public function render()
    {
        $count_trash = Tag::onlyTrashed()->count();
        $tags =
            Tag::where('name' , 'LIKE' , "%{$this->search}%")
                ->latest()->paginate(config('services.paginate.table'));
        $data =[
            'tags' => $tags ,
            'count_trash' => $count_trash
        ];
        return view('livewire.admin.dashboard.tag.index' ,$data);
    }

    public function tagForm()
    {
        $this->validate();
        if($this->tag->status == null ){
            $this->tag->status = 0 ;
        }
        $this->tag->save();
        session()->flash('flash_message_success', __('admin.tags.add-suc'));
        return redirect()->route('tags.index');
    }

    public function disableTagStatus($id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
    }

    public function enableTagStatus($id)
    {
        $tag = Tag::find($id);
        $tag->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
    }

    public function deleteTag($id)
    {
        $tag = Tag::find($id);
        if($tag->status == 0){
            $tag->delete();
            $this->emit('toast' , 'success' , __('admin.tags.remove-suc-to-trash'));
        }else{
            $this->emit('toast' , 'danger' , __('admin.tags.status-not-deactive'));
        }
    }
}

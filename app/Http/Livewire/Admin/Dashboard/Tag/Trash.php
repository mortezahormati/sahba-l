<?php

namespace App\Http\Livewire\Admin\Dashboard\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Trash extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $paginationTheme = 'bootstrap';
    public Tag $tag;
    public $img ;


//    protected $queryString = ['search'];

    public function mount()
    {
        $this->tag = new Tag();
    }

    public function render()
    {
        $tags =  DB::table('tags')->whereNotNull('deleted_at')
            ->latest()
            ->paginate(config('services.paginate.table'));
        return view('livewire.admin.dashboard.tag.trash' , compact('tags'));
    }


    public function forceDeleteTag($id)
    {
        $tag = Tag::withTrashed()->find($id);
        if(!is_null($tag->deleted_at)){
            $tag->forceDelete();
        }
        $this->emit('toast' , 'success' , __('admin.tags.force-delete-suc'));
    }

    public function restoreTag($id)
    {
        Tag::withTrashed()->where('id' , $id)->first()->restore();
        $this->emit('toast' , 'success' , __('admin.tags.restore-suc'));
    }

}

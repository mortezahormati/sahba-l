<?php

namespace App\Http\Livewire\Admin\Dashboard\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Morilog\Jalali\Jalalian;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $paginationTheme = 'bootstrap';
    public User $user;
    public $search;
    protected $queryString = ['search'];

    public function mount()
    {
        $this->user = new User();
    }

    public function render()
    {
        $users =
            User::with('roles')->where('name' , 'LIKE' , "%{$this->search}%")
                ->orWhere('family' , 'LIKE' , "%{$this->search}%")
                ->latest()->paginate(config('services.paginate.t-20'));
        $created_at_carbon = Jalalian::fromDateTime($this->user->created_at )->format('Y-m-d');
        $data =[
            'users' => $users ,
            'created_at_carbon' => $created_at_carbon
        ];
        return view('livewire.admin.dashboard.users.index' ,$data);
    }



    public function disableUserStatus($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => 0
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.disableBrandStatus'));
    }

    public function enableUserStatus($id)
    {
        $user = User::find($id);
        $user->update([
            'status' => 1
        ]);
        $this->emit('toast' , 'success' , __('admin.brands.enableBrandStatus'));
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        if($user->status == 0){
            $user->delete();
            $this->emit('toast' , 'success' , __('admin.tags.remove-suc-to-trash'));
        }
    }
}

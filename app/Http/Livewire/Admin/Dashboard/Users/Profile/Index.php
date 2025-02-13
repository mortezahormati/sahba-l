<?php

namespace App\Http\Livewire\Admin\Dashboard\Users\Profile;

use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;

    public $paginationTheme = 'bootstrap';
    public User $user;
    public $img;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        $user = $this->user;
        $img = $this->img;
        $data = [
            'user' => $user,
            'img' => $img
        ];
        return view('livewire.admin.dashboard.users.profile.index', $data);
    }
}

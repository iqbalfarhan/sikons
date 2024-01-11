<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Badge extends Component
{

    protected $listeners = ['reloadUser' => '$refresh'];

    public User $user;

    public function mount(User $user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.pages.user.badge');
    }
}

<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\Datel;
use App\Models\User;
use Livewire\Component;

class Profile extends Component
{
    public UserForm $form;

    public function mount(){
        $user = User::find(auth()->id());
        $this->form->setUser($user);
    }

    public function render()
    {
        return view('livewire.pages.user.profile', [
            'user' => auth()->user(),
            'datels' => Datel::get()->groupBy('witel'),
        ]);
    }
}

<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Raw extends Component
{
    public function render()
    {
        return view('livewire.pages.user.raw', [
            'datas' => User::get()
        ]);
    }
}

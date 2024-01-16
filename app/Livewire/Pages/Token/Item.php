<?php

namespace App\Livewire\Pages\Token;

use App\Models\Kwhmeter;
use Livewire\Component;

class Item extends Component
{
    public ?Kwhmeter $token;

    public function mount($token = null){
        $this->token = Kwhmeter::find($token);
    }

    public function render()
    {
        return view('livewire.pages.token.item');
    }
}

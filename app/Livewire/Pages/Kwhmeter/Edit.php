<?php

namespace App\Livewire\Pages\Kwhmeter;

use App\Models\Kwhmeter;
use App\Models\Token;
use Livewire\Component;

class Edit extends Component
{
    public ?Kwhmeter $kwhmeter;
    public ?Token $token;

    public $tanggal;

    public function render()
    {
        return view('livewire.pages.kwhmeter.edit');
    }
}

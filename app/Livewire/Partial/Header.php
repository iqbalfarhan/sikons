<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Header extends Component
{
    public $title;

    public function mount($title = "Aplikasi sikons"){
        $this->title = $title;
    }

    public function render()
    {
        return view('livewire.partial.header');
    }
}

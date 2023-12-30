<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Header extends Component
{
    public $title = "Selamat datang";
    public $desc;

    public function render()
    {
        return view('livewire.partial.header');
    }
}

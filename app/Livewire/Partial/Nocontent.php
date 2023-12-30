<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Nocontent extends Component
{

    public $title = "Not found";
    public $desc = "Konten yang anda tidak dapat ditemukan";
    public function render()
    {
        return view('livewire.partial.nocontent');
    }
}

<?php

namespace App\Livewire\Partial;

use Livewire\Attributes\On;
use Livewire\Component;

class Preview extends Component
{
    public $show = false;
    public $image = "";

    #[On('previewImage')]
    public function previewImage($image){
        $this->show = true;
        $this->image = $image;
    }

    public function render()
    {
        return view('livewire.partial.preview');
    }
}

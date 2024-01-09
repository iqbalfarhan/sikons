<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{
    public $theme;
    public $url;

    public function mount(){
        $this->theme = session('theme');
        $this->url = url()->current();
    }

    public function setTheme($theme){
        session(['theme' => $theme]);
        $this->theme = $theme;

        return redirect($this->url);
    }

    public function render()
    {
        return view('livewire.partial.navbar');
    }
}

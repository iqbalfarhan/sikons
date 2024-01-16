<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{
    public $theme;
    public $sidebar;
    public $url;

    public function mount(){
        $this->theme = session('theme');
        $this->sidebar = session('sidebar', 'expand');

        $this->url = url()->current();
    }

    public function setTheme($theme){
        session(['theme' => $theme == "system" ? null : $theme]);
        $this->theme = $theme;

        return redirect($this->url);
    }

    public function setSidebar(string $value){
        session(['sidebar' => $value]);
        $this->sidebar = $value;

        return redirect($this->url);
    }

    public function render()
    {
        return view('livewire.partial.navbar');
    }
}

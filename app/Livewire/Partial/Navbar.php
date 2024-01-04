<?php

namespace App\Livewire\Partial;

use Illuminate\Support\Facades\Route;
use Livewire\Component;

class Navbar extends Component
{
    public $theme;

    public function mount(){
        $this->theme = session('theme');
    }

    public function setTheme($theme){
        session(['theme' => $theme]);
        $this->theme = $theme;

        return redirect()->back();

        // $this->redirect(Route::current());
    }

    public function render()
    {
        return view('livewire.partial.navbar');
    }
}

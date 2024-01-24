<?php

namespace App\Livewire\Pages\Dashboard;

use Livewire\Component;

class Lembur extends Component
{
    public $tanggal;

    public function mount(){
        $this->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.dashboard.lembur');
    }
}

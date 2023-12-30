<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Index extends Component
{
    public $tanggal;

    public function mount()
    {
        $this->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.laporan.index', [
            'datas' => Laporan::today()->limit(24)->get()
        ]);
    }
}

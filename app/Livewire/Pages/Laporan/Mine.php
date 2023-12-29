<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Mine extends Component
{
    public function render()
    {
        return view('livewire.pages.laporan.index', [
            'datas' => Laporan::today()->limit(24)->get()
        ]);
    }
}

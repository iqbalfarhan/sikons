<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Download extends Component
{
    public function render()
    {
        return view('livewire.pages.laporan.download', [
            'datas' => Laporan::get()
        ]);
    }
}

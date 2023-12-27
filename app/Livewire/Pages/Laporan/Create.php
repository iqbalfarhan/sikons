<?php

namespace App\Livewire\Pages\Laporan;

use Livewire\Component;

class Create extends Component
{
    public function render()
    {
        return view('livewire.pages.laporan.create', [
            'lokasis' => auth()->user()->datel->lokasis->pluck('name', 'id')
        ]);
    }
}

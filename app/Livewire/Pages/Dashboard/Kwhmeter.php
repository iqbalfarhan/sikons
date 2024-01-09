<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Datel;
use App\Models\Lokasi;
use App\Models\Token;
use Livewire\Component;

class Kwhmeter extends Component
{
    public $datel_id;
    public $lokasi_id;

    public function render()
    {
        return view('livewire.pages.dashboard.kwhmeter', [
            'datas' => Token::when($this->lokasi_id, fn($q) => $q->where('lokasi_id', $this->lokasi_id))
                ->when($this->datel_id, fn($q) => $q->whereHas('lokasi', fn($w) => $w->where('datel_id', $this->datel_id)))
                ->with('lokasi.datel')->with('kwhmeters')->get(),
            'datels' => Datel::get()->groupBy('witel'),
            'lokasis' => Lokasi::where('datel_id', $this->datel_id)->pluck('name', 'id')
        ]);
    }
}

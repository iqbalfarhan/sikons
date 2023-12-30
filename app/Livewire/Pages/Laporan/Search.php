<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Datel;
use App\Models\Laporan;
use App\Models\Lokasi;
use Livewire\Component;

class Search extends Component
{
    public $result;
    public $tanggal;
    public $witel;
    public $datel;
    public $lokasi_id;
    public $waktu;

    public function cari(){
        $this->result = Laporan::when($this->tanggal, function($q){
            return $q->whereDate('created_at', $this->tanggal);
        })->when($this->waktu, function($q){
            return $q->where('waktu', $this->waktu);
        })->when($this->datel, function($q){
            return $q->datel($this->datel);
        })->get();
    }

    public function mount(){
        $this->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.laporan.search', [
            'datas' => $this->result ?? collect(),
            'witels' => Datel::get()->groupBy('witel'),
            'lokasis' => $this->datel ? Lokasi::datelname($this->datel)->pluck('name', 'id') : collect()
        ]);
    }
}

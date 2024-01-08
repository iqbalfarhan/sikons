<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Datel;
use App\Models\Laporan;
use App\Models\Lokasi;
use Livewire\Component;

class Search extends Component
{
    public $result;

    public $jenis;
    public $tanggal;
    public $bulan;
    public $range = [];

    public $witel;
    public $datel;
    public $lokasi_id;

    public $waktu;
    public $lingkungan;
    public $bbm;
    public $perangkat;
    public $apar;
    public $apd;
    public $cuaca;
    public $pln;
    public $genset;
    public $gedung;

    public function cari(){
        $this->result = Laporan::when($this->tanggal, function($q){
            return $q->whereDate('created_at', $this->tanggal);
        })->when($this->bulan, function($q){
            return $q->whereMonth('tanggal', $this->bulan);
        })->when($this->range, function($q){
            return $q->whereBetween('tanggal', $this->range);
        })->when($this->datel, function($q){
            return $q->datel($this->datel);
        })->when($this->waktu, function($q){
            return $q->where('waktu', $this->waktu);
        })->when($this->lingkungan, function($q){
            return $q->where('lingkungan', $this->lingkungan);
        })->when($this->bbm, function($q){
            return $q->where('bbm', $this->bbm);
        })->when($this->perangkat, function($q){
            return $q->where('perangkat', $this->perangkat);
        })->when($this->apar, function($q){
            return $q->where('apar', $this->apar);
        })->when($this->apd, function($q){
            return $q->where('apd', $this->apd);
        })->when($this->cuaca, function($q){
            return $q->where('cuaca', $this->cuaca);
        })->when($this->pln, function($q){
            return $q->where('pln', $this->pln);
        })->when($this->genset, function($q){
            return $q->where('genset', $this->genset);
        })->when($this->gedung, function($q){
            return $q->where('gedung', $this->gedung);
        })->get();
    }

    public function updatedJenis() {
        $this->reset('tanggal');
        $this->reset('bulan');
        $this->reset('range');
    }

    public function resetFilter(){
        $this->reset();
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

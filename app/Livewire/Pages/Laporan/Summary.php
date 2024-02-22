<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Lokasi;
use Livewire\Component;

class Summary extends Component
{
    public $no = 1;
    public $periode;
    public $bulan;
    public $tahun;

    public function updatedPeriode($periode){
        list($tahun, $bulan) = explode("-", $periode);
        $this->bulan = $bulan;
        $this->tahun = $tahun;
    }

    public function mount(){
        $this->periode = date("Y-m");
        $this->bulan = date("m");
        $this->tahun = date("Y");
    }

    public function render()
    {
        $datas = Lokasi::with('laporans')->whereHas('datel', fn($datel) => $datel->whereIn('witel', config('sikons.witels')))->get()->groupBy('datel.witel');

        return view('livewire.pages.laporan.summary', [
            'datas' => $datas
        ]);
    }
}

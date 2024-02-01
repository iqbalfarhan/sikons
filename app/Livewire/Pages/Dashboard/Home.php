<?php

namespace App\Livewire\Pages\Dashboard;

use App\Models\Datel;
use App\Models\Laporan;
use App\Models\Lokasi;
use Livewire\Component;

class Home extends Component
{
    public $area;
    public $tanggal;

    public function mount(){
        $this->tanggal = date('Y-m-d');
    }

    public function gantiarea($witel){
        if ($this->area) {
            $this->reset('area');
        }
        else{
            $this->area = $witel;
        }
    }

    public function render()
    {
        if ($this->area) {
            $datas = Laporan::select(['lokasi_id', 'waktu', 'lingkungan', 'cuaca', 'pln'])->where('tanggal', $this->tanggal)->with('lokasi.datel')->get()->groupBy('lokasi.datel.name');
        }
        else{
            $datas = Laporan::select(['lokasi_id', 'waktu', 'lingkungan', 'cuaca', 'pln'])->where('tanggal', $this->tanggal)->with('lokasi.datel')->get()->groupBy('lokasi.datel.witel');
        }


        $laporan = Laporan::where('tanggal', $this->tanggal)->get();


        return view('livewire.pages.dashboard.home', [
            'witels' => $this->area ? Datel::where('witel', $this->area)->pluck('name') : Datel::$witels,
            'datas' => $datas,
            'laporan' => $laporan,
            'location_count' => $this->area ? Lokasi::whereHas('datel', fn($q) => $q->where('witel', $this->area))->count() : Lokasi::count()
        ]);
    }
}

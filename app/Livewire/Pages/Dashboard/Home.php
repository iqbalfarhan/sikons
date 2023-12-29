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

    public function render()
    {
        if ($this->area) {
            $datas = Laporan::select('lokasi_id', 'waktu', 'lingkungan', 'cuaca', 'pln')->with('lokasi.datel')->get()->groupBy('lokasi.datel.name');
        }
        else{
            $datas = Laporan::select('lokasi_id', 'waktu', 'lingkungan', 'cuaca', 'pln')->with('lokasi.datel')->get()->groupBy('lokasi.datel.witel');
        }

        return view('livewire.pages.dashboard.home', [
            'witels' => $this->area ? Datel::where('witel', $this->area)->pluck('name') : Datel::$witels,
            'datas' => $datas
        ]);
    }
}

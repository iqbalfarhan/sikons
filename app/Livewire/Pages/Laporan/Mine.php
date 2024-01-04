<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use App\Models\Lokasi;
use Livewire\Component;

class Mine extends Component
{
    public $tanggal;
    public $lokasi_id;

    public function render()
    {
        $me = auth()->user();

        $datas = Laporan::where('user_id', $me->id)->when($this->tanggal, function ($q){
                $q->whereDate('created_at', $this->tanggal);
            })->when($this->lokasi_id, function ($q){
                $q->where('lokasi_id', $this->lokasi_id);
            })->latest()->limit(12)->get();

        return view('livewire.pages.laporan.mine', [
            'datas' => $datas,
            'lokasis' => Lokasi::datelname($me->datel->name)->pluck('name', 'id')
        ]);
    }
}

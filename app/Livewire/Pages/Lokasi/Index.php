<?php

namespace App\Livewire\Pages\Lokasi;

use App\Models\Lokasi;
use Livewire\Component;

class Index extends Component
{
    public $cari = "";

    public function delete(Lokasi $lokasi){
        $lokasi->delete();
    }

    public function render()
    {
        return view('livewire.pages.lokasi.index', [
            'datas' => Lokasi::when($this->cari, function($q){
                return $q->where('name', 'like', "%".$this->cari."%")->orWhereHas('datel', function($datel){
                    return $datel->where('name', 'like', "%".$this->cari."%")->orWhere('witel', 'like', "%".$this->cari."%");
                });
            })->get()
        ]);
    }
}

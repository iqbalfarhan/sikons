<?php

namespace App\Livewire\Pages\Laporan;

use App\Models\Laporan;
use Livewire\Component;

class Show extends Component
{
    public $laporan;

    public function deleteLaporan(){
        $this->laporan->delete();
        $user = auth()->user();
        $route = $user->hasRole('petugas') ? route('laporan.mine') : route('laporan.index');
        return $this->redirect($route, navigate: true);
    }

    public function mount(Laporan $laporan){
        $this->laporan = $laporan;
    }

    public function render()
    {
        return view('livewire.pages.laporan.show');
    }
}

<?php

namespace App\Livewire\Pages\Laporan;

use App\Livewire\Forms\LaporanForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;

    public $ev_lingkungan;
    public $ev_gedung;

    public LaporanForm $form;

    public function simpan(){
        $evling = $this->ev_lingkungan->store(date('Y-m-d'));
        $this->form->ev_lingkungan = $evling;

        $evged = $this->ev_gedung->store(date('Y-m-d'));
        $this->form->ev_gedung = $evged;
        $this->form->validate();
        $this->form->update();

        redirect()->route('laporan.mine');
    }

    public function updatedEvLingkungan(){
        $this->form->ev_lingkungan = $this->ev_lingkungan->hashName(date('Y-m-d'));
    }

    public function updatedEvGedung(){
        $this->form->ev_gedung = $this->ev_gedung->hashName(date('Y-m-d'));
    }

    public function mount(Laporan $laporan){
        $this->form->user_id = auth()->id();
        $this->form->setLaporan($laporan);
    }

    public function render()
    {
        return view('livewire.pages.laporan.edit', [
            'lokasis' => auth()->user()->datel->lokasis->pluck('name', 'id')
        ]);
    }
}

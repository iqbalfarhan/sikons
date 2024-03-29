<?php

namespace App\Livewire\Pages\Laporan;

use App\Livewire\Forms\LaporanForm;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $ev_lingkungan;
    public $ev_gedung;

    public LaporanForm $form;

    public function simpan(){
        if ($this->ev_lingkungan) {
            $filename = implode(".", [
                uniqid(),
                $this->ev_lingkungan->getClientOriginalExtension()
            ]);
            $evling = $this->ev_lingkungan->storeAs(date('Y-m-d'), $filename);
            $this->form->ev_lingkungan = $evling;
        }

        if ($this->ev_gedung) {
            $filename = implode(".", [
                uniqid(),
                $this->ev_gedung->getClientOriginalExtension()
            ]);
            $evged = $this->ev_gedung->storeAs(date('Y-m-d'), $filename);
            $this->form->ev_gedung = $evged;
        }


        $this->form->validate();
        $this->form->store();

        redirect()->route('laporan.mine');
    }

    public function updatedEvLingkungan(){
        $this->form->ev_lingkungan = $this->ev_lingkungan->hashName(date('Y-m-d'));
    }

    public function updatedEvGedung(){
        $this->form->ev_gedung = $this->ev_gedung->hashName(date('Y-m-d'));
    }

    public function mount(){
        $this->form->user_id = auth()->id();
        $this->form->tanggal = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.pages.laporan.create', [
            'lokasis' => auth()->user()->datel->lokasis->pluck('name', 'id')
        ]);
    }
}

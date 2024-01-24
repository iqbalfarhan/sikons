<?php

namespace App\Livewire\Pages\Lokasi;

use App\Livewire\Forms\LokasiForm;
use App\Models\Datel;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public LokasiForm $form;

    public function simpan(){
        $this->form->store();
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.lokasi.create', [
            'datels' => Datel::get()->groupBy('witel'),
        ]);
    }
}

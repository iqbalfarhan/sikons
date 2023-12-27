<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\Datel;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public $witel = "REGIONAL";
    public UserForm $form;

    public function simpan(){
        $this->form->store();

        $this->reset('show');

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.user.create', [
            'witels' => Datel::$witels,
            'datels' => Datel::where('witel', $this->witel)->pluck('name', 'id')
        ]);
    }
}

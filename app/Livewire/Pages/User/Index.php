<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $cari = "";

    protected $listeners = ['reload' => '$refresh'];

    public function render()
    {
        return view('livewire.pages.user.index', [
            'datas' => User::when($this->cari, function($q){
                return $q->where('name', 'like', "%".$this->cari."%")
                ->orWhere('username', 'like', "%".$this->cari."%");
            })->get()
        ]);
    }
}

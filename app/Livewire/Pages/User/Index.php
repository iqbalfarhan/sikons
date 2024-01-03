<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Livewire\Component;

class Index extends Component
{
    public $cari = "";

    protected $listeners = ['reload' => '$refresh'];

    public function deleteUser(User $user){
        $user->delete();
    }

    public function render()
    {
        return view('livewire.pages.user.index', [
            'datas' => User::when($this->cari, function($q){
                $cari = $this->cari;
                return $q->where('name', 'like', "%".$this->cari."%")
                    ->orWhere('username', 'like', "%".$this->cari."%")
                    ->orWhereHas('datel', function($datel) use ($cari){
                        return $datel->where('name', 'like', "%".$cari."%")
                            ->orWhere('witel', 'like', "%".$cari."%");
                    });
            })->get()
        ]);
    }
}

<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\Datel;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public $mode = "create";
    public $showPassword = false;
    public $witel = "REGIONAL";
    public UserForm $form;

    #[On('editUser')]
    public function editUser(User $user){
        $this->show = true;
        $this->mode = "edit";
        $this->form->setUser($user);
    }

    public function simpan(){
        if ($this->form->user) {
            $this->form->store();
        }
        else{
            $this->form->update();
        }

        $this->reset('show');
        $this->dispatch('reload');
    }

    public function toggleShowPassword(){
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.pages.user.create', [
            'witels' => Datel::get()->groupBy('witel'),
            'datels' => Datel::where('witel', $this->witel)->pluck('name', 'id')
        ]);
    }
}

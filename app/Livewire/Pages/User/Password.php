<?php

namespace App\Livewire\Pages\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\On;
use Livewire\Component;

class Password extends Component
{

    public ?User $user;
    public $show = false;
    public $showPassword = false;
    public $password = "sikons2024";

    #[On('editPassword')]
    public function editPassword(User $user){
        $this->user = $user;
        $this->show = true;
    }

    public function simpan(){
        $valid = $this->validate([
            'password' => 'required',
        ]);
        $valid['password'] = Hash::make($this->password);

        $this->user->update($valid);
        $this->reset();
    }

    public function toggleShowPassword(){
        $this->showPassword = !$this->showPassword;
    }

    public function render()
    {
        return view('livewire.pages.user.password');
    }
}

<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    #[Validate('required')]
    public $name = "";

    #[Validate('required')]
    public $username = "";

    #[Validate('required')]
    public $password = "sikons2024";

    public $telp = "";
    public $photo = "";

    #[Validate('required')]
    public $datel_id = "";


    public function setUser(User $user){
        $this->user = $user;

        $this->name = $user->name;
        $this->username = $user->username;
        $this->telp = $user->telp;
        $this->photo = $user->photo;
        $this->password = "";
        $this->datel_id = $user->datel_id;
    }

    public function store(){
        $this->validate();
        User::create($this->all());
        $this->reset();
    }

    public function update(){
        $this->validate();
        $this->user->update($this->all());
        $this->reset();
    }
}

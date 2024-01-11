<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserForm extends Form
{
    public ?User $user;

    public $name = "";
    public $username = "";
    public $password = "sikons2024";
    public $telp = "";
    public $photo;
    public $datel_id = "";
    public $role = "petugas";

    public function setUser(User $user){
        $this->user = $user;

        $this->name = $user->name;
        $this->username = $user->username;
        $this->telp = $user->telp;
        $this->photo = $user->photo;
        $this->password = "";
        $this->datel_id = $user->datel_id;
        $this->role = $user->getRoleNames()->first();
    }

    public function store(){
        $valid = $this->validate([
            'name' =>'required',
            'username' =>'required',
            'password' => 'required',
            'telp' =>'',
            'datel_id' =>'required',
        ]);

        $valid['password'] = Hash::make($this->password);
        $user = User::create($valid);
        $user->syncRoles($this->role);
        $this->reset();
    }

    public function update(){
        $valid = $this->validate([
            'name' =>'required',
            'username' =>'required',
            'password' => '',
            'telp' =>'',
            'photo' =>'',
            'datel_id' =>'required',
        ]);

        $valid['password'] = $this->password ? Hash::make($this->password) : $this->user->password;

        $this->user->update($valid);
        $this->user->syncRoles($this->role);
        $this->reset();
    }
}

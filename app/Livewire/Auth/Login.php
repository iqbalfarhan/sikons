<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $username;
    public $password;

    public function login(){

        $valid = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);


        if (Auth::attempt($valid)) {
            $this->flash('success', 'Login successful');
            return redirect()->route('home');
        }
        else{
            $this->alert('error', 'Login failed');
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

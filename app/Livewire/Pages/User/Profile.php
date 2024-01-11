<?php

namespace App\Livewire\Pages\User;

use App\Livewire\Forms\UserForm;
use App\Models\Datel;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    public UserForm $form;
    public User $user;
    public $photo;

    public function mount(){
        $this->user = User::find(auth()->id());
        $this->form->setUser($this->user);
    }

    public function simpan(){
        if ($this->photo) {
            $filename = implode(".", [
                uniqid(),
                $this->photo->getClientOriginalExtension()
            ]);
            $photo = $this->photo->storeAs('user', $filename);
            $this->form->photo = $photo;
        }

        $this->form->update();
        $this->alert('success', 'Profile berhasil diupdate');
        $this->mount();
        $this->dispatch('reloadUser');
    }

    public function render()
    {
        return view('livewire.pages.user.profile', [
            'user' => auth()->user(),
            'datels' => Datel::get()->groupBy('witel'),
        ]);
    }
}

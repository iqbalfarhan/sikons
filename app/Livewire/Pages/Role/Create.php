<?php

namespace App\Livewire\Pages\Role;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends Component
{
    public $show = false;
    public $tab = "role";

    #[Validate('required', message:":attribute harus diisi", as : 'Nama permission atau role harus diisi')]
    public $name = "";
    public $tabs = ["role", "permission"];

    public function simpan(){
        $this->validate();

        if ($this->tab == "role") {
            Role::create(["name" => $this->name]);
        }
        elseif ($this->tab == "permission") {
            Permission::create(["name" => $this->name]);
        }

        $this->dispatch('reload');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.role.create');
    }
}

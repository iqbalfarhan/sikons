<?php

namespace App\Livewire\Pages\Role;

use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class EditPermission extends Component
{
    public $show = false;
    public $name;
    public ?Permission $permission;

    #[On('editPermission')]
    public function editPermission(Permission $permission){
        $this->permission = $permission;
        $this->name = $permission->name;

        $this->show = true;
    }

    public function simpan(){
        $this->validate([
            'name' =>'required',
            'permission' =>'required',
        ]);

        $this->permission->update([
            'name' => $this->name
        ]);

        $this->show = false;
        $this->name = "";

        $this->dispatch('reload');
    }

    public function render()
    {
        return view('livewire.pages.role.edit-permission');
    }
}

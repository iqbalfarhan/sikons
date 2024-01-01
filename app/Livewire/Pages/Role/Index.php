<?php

namespace App\Livewire\Pages\Role;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{

    protected $listeners = ['reload' => '$refresh'];

    public function delete(Permission $permit){
        $permit->delete();
    }

    public function render()
    {
        return view('livewire.pages.role.index', [
            'roles' => Role::pluck('name'),
            'permits' => Permission::get(),
        ]);
    }
}

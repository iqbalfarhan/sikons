<?php

namespace App\Livewire\Pages\Role;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    use LivewireAlert;

    public $cari;

    protected $listeners = ['reload' => '$refresh'];

    public function assignRole(Permission $permission, $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
        } else {
            $permission->assignRole($role);
        }

    }

    public function deleteRole(Role $role)
    {
        $role->delete();
        $this->alert('success', "Role deleted successfully");
    }

    public function deletePermission(Permission $permission)
    {
        $permission->delete();
        $this->alert('success', "Permission deleted successfully");
    }

    public function render()
    {
        return view('livewire.pages.role.index', [
            'roles' => Role::whereNot('name', 'superadmin')->pluck('name'),
            'permits' => Permission::when($this->cari, fn($s) => $s->where('name', 'like', '%'.$this->cari.'%'))->orderBy('name')->get(),
        ]);
    }
}

<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Role and permissions',
    ])

    <div class="flex justify-between">
        <input type="text" class="input input-bordered" placeholder="Cari permission">
        <div class="flex gap-1">
            <label for="createRole" class="btn btn-primary">
                <x-tabler-circle-plus class="icon-5" />
                <span>Role or permission</span>
            </label>
        </div>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead class="text-center">
                <tr>
                    <th rowspan="2">Permission name</th>
                    <th colspan="{{ $roles->count() ?? 1 }}">Roles</th>
                    <th rowspan="2">action</th>
                </tr>
                <tr>
                    @foreach ($roles as $role)
                        <th>{{ $role }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($permits as $permit)
                    <tr>
                        <td>{{ $permit->name }}</td>
                        @foreach ($roles as $role)
                            <td>
                                <input type="checkbox" class="toggle toggle-sm checked:toggle-primary"
                                    @checked($permit->hasRole($role))
                                    wire:change.prevent="assignRole({{ $permit->id }}, '{{ $role }}')" />
                            </td>
                        @endforeach
                        <td>
                            <div class="flex gap-1 justify-center">
                                <button class="btn btn-xs btn-success btn-square">
                                    <x-tabler-edit class="icon-4" />
                                </button>
                                <button class="btn btn-xs btn-error btn-square"
                                    wire:click="delete({{ $permit->id }})">
                                    <x-tabler-trash class="icon-4" />
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @livewire('pages.role.create')
</div>

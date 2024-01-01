<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'User management'])

    <div class="flex flex-col lg:flex-row justify-between items-center gap-2">
        <input type="search" class="input input-bordered w-full lg:w-fit" wire:model.live="cari" placeholder="Cari user">
        <label for="userCreate" class="btn w-full lg:w-fit">
            <x-tabler-plus class="icon-5" />
            <span>Tambah user</span>
        </label>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>Name</th>
                <th>Username</th>
                <th>Datel Witel</th>
                <th>No telpon</th>
                <th>Role</th>
                <th class="text-center">Actions</th>
            </thead>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->username }}</td>
                    <td class="font-medium">{{ $data->datel->name }} {{ $data->datel->witel }}</td>
                    <td>{{ $data->telp }}</td>
                    <td>petugas</td>
                    <td class="text-center">
                        <div class="flex gap-1 justify-center">
                            <button class="btn btn-xs btn-success btn-square"
                                wire:click="$dispatch('editUser', {'user': {{ $data->id }}})">
                                <x-tabler-edit class="icon-4" />
                            </button>
                            <button class="btn btn-xs btn-accent btn-square">
                                <x-tabler-key class="icon-4" />
                            </button>
                            <button class="btn btn-xs btn-error btn-square">
                                <x-tabler-trash class="icon-4" />
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @livewire('pages.user.create')
</div>

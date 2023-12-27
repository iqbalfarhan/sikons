<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'User management'])

    <div class="flex justify-between items-center">
        <input type="search" class="input input-bordered" wire:model.live="cari" placeholder="Cari user">
        <button class="btn btn-ghost">
            <x-tabler-plus class="icon-5" />
            <span>Tambah user</span>
        </button>
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Witel Datel</th>
                <th>Lokasi</th>
                <th>Timezone</th>
                <th>PLN</th>
                <th class="text-center">Actions</th>
            </thead>
            @foreach ($datas as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>
                        {{ $data->datel->name }}
                        {{ $data->datel->witel }}
                    </td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->timezone }}</td>
                    <td>{{ $data->tokens->count() }} Token</td>
                    <td class="text-center">
                        <div class="flex gap-1 justify-center">
                            <button class="btn btn-xs btn-success btn-square">
                                <x-tabler-edit class="icon-4" />
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
</div>

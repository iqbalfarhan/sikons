<div class="page-wrapper">
    @livewire('partial.header', ['title' => 'Management data lokasi'])

    <div class="flex flex-col lg:flex-row justify-between items-center gap-2">
        <input type="search" class="input input-bordered" wire:model.live="cari" placeholder="Cari user">
        <label for="lokasiCreate" class="btn w-full lg:w-fit">
            <x-tabler-plus class="icon-5" />
            <span>Tambah lokasi</span>
        </label>
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
                    <td>{{ $data->datel->label }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->timezone }}</td>
                    <td>{{ $data->tokens->count() }} Token</td>
                    <td class="text-center">
                        <div class="flex gap-1 justify-center">
                            <a href="{{ route('lokasi.edit', $data) }}" class="btn btn-xs btn-success btn-square"
                                wire:navigate>
                                <x-tabler-edit class="icon-4" />
                            </a>
                            <button class="btn btn-xs btn-error btn-square" wire:click="delete({{ $data->id }})">
                                <x-tabler-trash class="icon-4" />
                            </button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

    @livewire('pages.lokasi.create')
</div>

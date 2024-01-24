<div class="page-wrapper">
    <div class="flex justify-between gap-4">
        @livewire('partial.header', [
            'title' => 'Ruangan lembur',
            'desc' => 'Data diambil dari aplikasi GePee',
        ])
        <button class="btn">
            <x-tabler-reload class="icon-5" />
            <span class="hidden md:flex">Reload data</span>
        </button>
    </div>

    <div class="flex flex-col md:flex-row justify-between gap-4">
        <input type="date" class="input input-bordered" wire:model="tanggal">
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Yang mengajukan lembur</th>
                <th>Ruangan</th>
                <th>Jam</th>
                <th>Status</th>
            </thead>
            <tbody>
                <tr>
                    <td colspan="100%">
                        @livewire('partial.nocontent')
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

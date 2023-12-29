<div class="page-wrapper">
    @livewire('partial.header')

    <div class="flex flex-col lg:flex-row gap-4">
        <input type="date" class="input input-bordered" placeholder="Search" wire:model.live="tanggal">
        <input type="search" class="input input-bordered" placeholder="Search">
    </div>

    <div class="divider text-xs opacity-75">{{ $datas->count() }} Laporan</div>

    <div class="grid lg:grid-cols-3 gap-6">
        @foreach ($datas as $data)
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        @endforeach
    </div>
</div>

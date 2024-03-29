<div class="page-wrapper space-y-6">
    @livewire('partial.header', [
        'title' => 'Laporan saya',
    ])

    <div class="flex flex-col md:flex-row gap-2">
        <select class="select select-bordered" wire:model.live="lokasi_id">
            <option value="">Pilih lokasi</option>
            @foreach ($lokasis as $lokasiid => $lokasiname)
                <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
            @endforeach
        </select>
        <input type="date" wire:model.live="tanggal" class="input input-bordered">
    </div>

    <div class="divider text-xs opacity-75">{{ $datas->count() }} Laporan ditemukan</div>

    @if ($datas->hasPages())
        <div class="py-6">
            {{ $datas->links() }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($datas as $data)
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent')
            </div>
        @endforelse
    </div>

    @if ($datas->hasPages())
        <div class="py-6">
            {{ $datas->links() }}
        </div>
    @endif
</div>

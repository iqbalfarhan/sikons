<div class="page-wrapper max-w-xl space-y-10">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])
    <img src="{{ $laporan->thumbnail }}" alt="" class="w-full rounded-lg"
        wire:click="$dispatch('previewImage', {'image': '{{ $laporan->thumbnail }}'})">

    <div class="space-y-2">
        <div class="font-semibold text-xl">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
            {{ $laporan->tanggal ?? $laporan->created_at->format('d F Y') }}.</div>

        <p class="text-sm">{{ $laporan->desc }}</p>
    </div>

    <div class="flex flex-row gap-2  overflow-x-auto">
        @for ($i = 0; $i < 2; $i++)
            <div class="avatar">
                <div class="w-24">
                    <img src="{{ $laporan->thumbnail }}" alt="" class="w-full rounded-lg">
                </div>
            </div>
        @endfor
    </div>

    <button class="btn btn-outline btn-xs">
        <x-tabler-user class="icon-3" />
        <span>{{ $laporan->user->name }}</span>
    </button>
</div>

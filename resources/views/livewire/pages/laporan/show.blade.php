<div class="page-wrapper max-w-2xl space-y-10">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])

    <img src="{{ $laporan->thumbnail }}" alt="" class="w-full rounded-lg"
        wire:click="$dispatch('previewImage', {'image': '{{ $laporan->thumbnail }}'})">

    <div class="space-y-4">
        <div class="font-semibold text-xl">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
            {{ $laporan->tanggal->format('d F Y') }}.</div>

        <div class="text-sm">{{ $laporan->desc }}</div>

        <button class="btn btn-primary btn-outline btn-xs">
            <x-tabler-user class="icon-4" />
            <span>{{ $laporan->user->name }}</span>
        </button>
    </div>

    @if ($laporan->ev_gedung)
        <div class="flex flex-col gap-2">
            <div class="font-semibold text-xl">
                Eviden kondisi gedung
            </div>
            <div class="avatar">
                <div class="w-20">
                    <img src="{{ Storage::url($laporan->ev_gedung) }}" alt="" class="w-full rounded-lg"
                        wire:click="$dispatch('previewImage', {'image': '{{ Storage::url($laporan->ev_gedung) }}'})">
                </div>
            </div>
        </div>
    @endif

    <div class="flex flex-col md:flex-row gap-2">
        <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-sm text-accent">
            <x-tabler-edit class="icon-4" />
            <span>Edit laporan</span>
        </a>
        <button class="btn btn-sm text-error" wire:click="deleteLaporan">
            <x-tabler-trash class="icon-4" />
            <span>Delete laporan</span>
        </button>
    </div>
</div>

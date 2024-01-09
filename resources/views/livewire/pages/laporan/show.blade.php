<div class="page-wrapper max-w-3xl space-y-10">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])

    <img src="{{ $laporan->thumbnail }}" alt="" class="w-full rounded-lg"
        wire:click="$dispatch('previewImage', {'image': '{{ $laporan->thumbnail }}'})">

    <div class="space-y-2">
        <div class="font-semibold text-xl">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
            {{ $laporan->tanggal->format('d F Y') }}.</div>

        <p class="text-sm">{{ $laporan->desc }}</p>
    </div>

    @if ($laporan->ev_gedung)
        <div class="flex flex-col gap-2">
            <div class="font-semibold text-xl">
                Eviden kondisi gedung
            </div>
            <img src="{{ Storage::url($laporan->ev_gedung) }}" alt="" class="w-full rounded-lg"
                wire:click="$dispatch('previewImage', {'image': '{{ Storage::url($laporan->ev_gedung) }}'})">
        </div>
    @endif


    <div class="flex flex-col lg:flex-row gap-2">
        <button class="btn btn-success">
            <x-tabler-user class="icon-5" />
            <span>{{ $laporan->user->name }}</span>
        </button>
        <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-accent">
            <x-tabler-edit class="icon-5" />
            <span>Edit laporan</span>
        </a>
        <a href="{{ route('laporan.edit', $laporan) }}" class="btn btn-error">
            <x-tabler-trash class="icon-5" />
            <span>Delete laporan</span>
        </a>
    </div>
</div>

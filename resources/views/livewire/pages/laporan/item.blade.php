<div class="card border bg-base-200 shadow-lg w-full">
    <figure class="border-b">
        <a href="{{ route('laporan.show', $laporan) }}" class="avatar w-full aspect-video">
            <div class="w-full aspect-video">
                <img src="{{ $laporan->thumbnail }}" class="">
            </div>
        </a>
    </figure>
    <div class="card-body py-4 px-6">
        <div class="flex flex-col">
            <div class="font-medium">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }}</div>
            <small>{{ $laporan->catatan }} oleh {{ $laporan->user->name }}</small>
        </div>
    </div>
</div>

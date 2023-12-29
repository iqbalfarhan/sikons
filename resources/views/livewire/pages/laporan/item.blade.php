<div class="card border bg-base-200 shadow-lg w-full">
    <figure class="border-b">
        <img src="{{ Storage::url($laporan->ev_lingkungan) }}" class="w-full aspect-video">
    </figure>
    <div class="card-body py-4">
        <div class="flex flex-col">
            <div class="font-medium">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }}</div>
            <small>{{ $laporan->catatan }} oleh {{ $laporan->user->name }}</small>
        </div>
    </div>
</div>

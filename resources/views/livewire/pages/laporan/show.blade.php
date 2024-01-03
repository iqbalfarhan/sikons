<div class="page-wrapper max-w-2xl">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])
    <div class="card bg-base-200 shadow-lg">
        <figure class="overflow-hidden w-full aspect-video">
            <img src="{{ $laporan->thumbnail }}" alt="" class="w-full h-full">
        </figure>
        <div class="card-body space-y-4">
            <div class="flex flex-col">
                <div class="font-medium">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
                    {{ $laporan->tanggal ?? $laporan->created_at->format('d F Y') }}.</div>
            </div>
            <p class="text-sm">{{ $laporan->desc }}</p>
        </div>
        <div class="divider m-0 p-0"></div>
        <div class="card-body">
            <div class="card-actions">
                <button class="btn btn-outline btn-xs">
                    <x-tabler-user class="icon-3" />
                    <span>{{ $laporan->user->name }}</span>
                </button>
            </div>
        </div>
    </div>
</div>

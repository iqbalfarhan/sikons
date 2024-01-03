<div class="page-wrapper max-w-xl">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])
    <img src="{{ $laporan->thumbnail }}" alt="" class="w-full rounded-lg">

    <div class="font-semibold text-xl">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
        {{ $laporan->tanggal ?? $laporan->created_at->format('d F Y') }}.</div>

    <p class="text-sm">{{ $laporan->desc }}</p>
    <button class="btn btn-outline btn-xs">
        <x-tabler-user class="icon-3" />
        <span>{{ $laporan->user->name }}</span>
    </button>
</div>

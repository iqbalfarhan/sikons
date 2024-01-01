<div class="page-wrapper max-w-3xl">
    @livewire('partial.header', [
        'title' => 'Detail laporan',
    ])
    <div class="card bg-base-200 shadow-lg">
        <figure>
            <img src="{{ $laporan->thumbnail }}" alt="">
        </figure>
        <div class="card-body">
            <div class="flex flex-col">
                <div class="font-medium">Laporan {{ $laporan->waktu }} {{ $laporan->lokasi->name }} tanggal
                    {{ $laporan->tanggal ?? $laporan->created_at }}</div>
                <small>Petugas jaga : {{ $laporan->user->name }}</small>
            </div>
        </div>
    </div>
    <p>{{ $laporan->desc }} berikut ini rinciannya :</p>
    <table class="table table-xs">
        @foreach (['lingkungan', 'bbm', 'perangkat', 'apar', 'apd', 'cuaca', 'pln', 'genset', 'gedung', 'catatan'] as $item)
            <tr>
                <td>{{ $item }}</td>
                <td>:</td>
                <td>{{ $laporan->$item }}</td>
            </tr>
        @endforeach
    </table>
</div>

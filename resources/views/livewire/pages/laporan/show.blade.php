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
    <p>Dilaporkan bahwa kondisi lapangan saat jaga aman, stok bbm aman berada di atas 50 persen, semua perangkat dalam
        keadaan normal, alat pemadan api ringan dalam keadaan baik, alat pelindung diri juga dalam kondisi lengkap. Saat
        berjaga kondisi dalam keadaan cerah Listrik PLN dalam keadaan ON, genset dalam keadaan OFF dan kondisi gedung
        normal tidak ada kebocoran atau kerusakan. berikut ini rinciannya :</p>
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

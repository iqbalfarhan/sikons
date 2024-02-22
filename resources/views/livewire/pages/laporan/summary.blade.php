<div class="page-wrapper max-w-3xl">

    <div class="flex justify-between">
        @livewire('partial.header', [
            'title' => 'Summary laporan',
        ])
    </div>

    <div class="flex justify-between">
        <input type="month" class="input input-bordered" wire:model.live="periode">
        <a class="btn btn-primary" href="{{ route('laporan.summarysnap', [$periode, uniqid()]) }}" target="_blank">
            <x-tabler-download class="icon-5" />
            <span>Download</span>
        </a>
    </div>

    <div class="table-wrapper">
        <table class="table text-center">
            <thead>
                <th>No</th>
                <th>Witel</th>
                <th>Jumlah gedung</th>
                <th>Score waktu</th>
                <th>Laporan</th>
                <th>Persentase</th>
            </thead>
            <tbody class="table-sm">
                @foreach ($datas as $wtl => $lokasi)
                    @php
                        $laporans = $lokasi->flatMap->laporans;
                        $lapored = $laporans
                            ->unique(function ($laporan) {
                                return $laporan->only(['tanggal', 'waktu', 'lokasi_id']);
                            })
                            ->count();
                        $laporbulanan = cal_days_in_month(CAL_GREGORIAN, $bulan, $tahun) * $lokasi->count() * 3;
                    @endphp
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td class="w-full text-left font-semibold">{{ $wtl }}</td>
                        <td>{{ $lokasi->count() }}</td>
                        <td>{{ $laporans->sum('score') }}</td>
                        <td>{{ $lapored }} / {{ $laporbulanan }}</td>
                        <td>{{ Sikons::persentase($lapored, $laporbulanan) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="p-4 border-t text-[8pt] opacity-75">
            <ul>
                <li>Summary laporan sikons periode {{ date('F Y', strtotime($periode)) }}</li>
                <li>Laporan : (laporan yang dibuat/laporan seharusnya)</li>
            </ul>
        </div>
    </div>
</div>

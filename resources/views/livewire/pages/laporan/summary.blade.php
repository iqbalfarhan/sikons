<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Summary laporan',
    ])

    <div class="flex justify-between">
        <input type="month" class="input input-bordered" wire:model.live="periode">
    </div>

    <div class="table-wrapper">
        <table class="table">
            <thead>
                <th>Witel</th>
                <th>Jumlah gedung</th>
                <th>Score waktu</th>
                <th>Laporan</th>
                <th>Persentase</th>
            </thead>
            <tbody>
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
                        <td>{{ $wtl }}</td>
                        <td>
                            <div class="badge">
                                <span>{{ $lokasi->count() }}</span>
                            </div>
                        </td>
                        <td>{{ $laporans->sum('score') }}</td>
                        <td>{{ $lapored }} / {{ $laporbulanan }}</td>
                        <td>{{ Sikons::persentase($lapored, $laporbulanan) }}%</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

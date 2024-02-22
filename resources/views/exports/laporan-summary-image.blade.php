<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="table-wrapper rounded-none">
            <div class="flex justify-between p-4 border-b">
                @livewire('partial.header', [
                    'title' => 'Summary laporan',
                    'desc' => 'Periode ' . date('F Y', strtotime($periode)),
                ])
            </div>
            <table class="table text-center table-zebra" cellpadding="5px">
                <thead>
                    <th>No</th>
                    <th>Witel</th>
                    <th>Gedung</th>
                    <th>Score</th>
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
                            <td class="text-left font-semibold">{{ $wtl }}</td>
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
    </body>

</html>

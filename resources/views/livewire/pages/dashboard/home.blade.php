<div class="page-wrapper max-w-full">
    @livewire('partial.header', ['title' => 'Halaman home'])
    <div class="flex gap-2">
        <select class="select select-bordered" wire:model.live="area">
            <option value="">SEMUA WITEL</option>
            @foreach (\App\Models\Datel::$witels as $optwtl)
                <option value="{{ $optwtl }}">{{ $optwtl }}</option>
            @endforeach
        </select>
        <input type="date" class="input input-bordered" placeholder="" wire:model.live="tanggal">
        <button class="btn bordered">
            <x-tabler-camera />
            <span>Capture</span>
        </button>
    </div>
    <div>
        {{-- <pre>@json($datas, JSON_PRETTY_PRINT)</pre> --}}
    </div>
    <div class="table-wrapper">
        <div class="card-body py-4">
            <div class="flex justify-between">
                <div class="font-medium text-sm">SUMMARY SIKONS {{ $area ? 'WITEL ' . $area : 'SEMUA WITEL' }}</div>
                <div class="font-medium text-sm">{{ date('d F Y', strtotime($tanggal)) }}</div>
            </div>
        </div>
        <table class="table text-center border-t table-xs">
            <thead>
                <tr>
                    <th rowspan="2">WITEL</th>
                    <th rowspan="2">STO</th>
                    <th colspan="6">LAPORAN MASUK</th>
                    <th colspan="2" class="td-green">KONDISI</th>
                    <th colspan="3" class="td-teal">CUACA</th>
                    <th colspan="2" class="td-yellow">PLN</th>
                </tr>
                <tr>
                    <th>PG</th>
                    <th>%</th>
                    <th>SR</th>
                    <th>%</th>
                    <th>ML</th>
                    <th>%</th>
                    <th class="td-green">AMAN</th>
                    <th class="td-red">TIDAK</th>
                    <th class="td-teal">CERAH</th>
                    <th class="td-yellow">MENDUNG</th>
                    <th class="td-red">HUJAN</th>
                    <th class="td-yellow">ON</th>
                    <th class="td-red">OFF</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($witels as $witel)
                    @php
                        $total[$witel] = $area ? \App\Models\Lokasi::datelname($witel)->count() : \App\Models\Lokasi::witel($witel)->count();
                    @endphp
                    <tr>
                        <td>
                            <button wire:click="$set('area', '{{ $witel }}')"
                                class="btn btn-ghost btn-xs">{{ $witel }}</button>
                        </td>
                        <td>{{ $total[$witel] }}</td>
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'pagi')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'pagi')->count(), $total[$witel]) : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'sore')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'sore')->count(), $total[$witel]) : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'malam')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'malam')->count(), $total[$witel]) : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('lingkungan', 'aman')->count() : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('lingkungan', 'tidak aman')->count() : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('cuaca', 'cerah')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('cuaca', 'mendung')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->whereNotIn('cuaca', ['cerah', 'mendung'])->count() : '' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('pln', 'on')->count() : '' }}</td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('pln', 'off')->count() : '' }}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th>{{ Sikons::persen(4, 10) }}</th>
            </tfoot>
        </table>
    </div>
</div>

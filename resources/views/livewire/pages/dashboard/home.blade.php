<div class="page-wrapper  max-w-full">
    @livewire('partial.header', ['title' => 'Halaman home'])
    <div class="flex flex-col md:flex-row gap-2 justify-between">
        <div class="flex flex-col md:flex-row gap-2">
            <select class="select select-bordered" wire:model.live="area">
                <option value="">SEMUA WITEL</option>
                @foreach (\App\Models\Datel::$witels as $optwtl)
                    <option value="{{ $optwtl }}">{{ $optwtl }}</option>
                @endforeach
            </select>
            <input type="date" class="input input-bordered" placeholder="" wire:model.live="tanggal">
        </div>
        <button class="btn bordered">
            <x-tabler-camera class="icon-5" />
            <span>Capture</span>
        </button>
    </div>
    <div class="table-wrapper w-full">
        <div class="card-body p-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="font-semibold text-sm">SUMMARY SIKONS {{ $area ? 'WITEL ' . $area : 'SEMUA WITEL' }}</div>
                <div class="font-medium text-sm">{{ date('d F Y', strtotime($tanggal)) }}</div>
            </div>
        </div>
        <table class="table text-center border-t table-xs w-full">
            <thead>
                <tr>
                    <th rowspan="2">WITEL</th>
                    <th rowspan="2">STO</th>
                    <th colspan="6">LAPORAN MASUK</th>
                    <th colspan="2">KONDISI</th>
                    <th colspan="3">CUACA</th>
                    <th colspan="2">PLN</th>
                </tr>
                <tr>
                    <th>Pagi</th>
                    <th>%</th>
                    <th>Sore</th>
                    <th>%</th>
                    <th>Malam</th>
                    <th>%</th>
                    <th>aman</th>
                    <th>tidak</th>
                    <th>cerah</th>
                    <th>mendung</th>
                    <th>hujan</th>
                    <th>on</th>
                    <th>off</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($witels as $witel)
                    @php
                        $total[$witel] = $area ? \App\Models\Lokasi::datelname($witel)->count() : \App\Models\Lokasi::witel($witel)->count();
                    @endphp
                    <tr>
                        <td class="text-left">
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
                <th class="text-left">
                    <button class="btn btn-ghost btn-xs">TOTAL</button>
                </th>
                <th>{{ $location_count }}</th>
                <th>{{ count($datas->where('waktu', 'pagi')->toArray()) }}</th>
            </tfoot>
        </table>
    </div>
</div>

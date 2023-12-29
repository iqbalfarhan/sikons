<div class="page-wrapper max-w-full">
    @livewire('partial.header', ['title' => 'Halaman home'])
    <div class="flex flex-col lg:flex-row gap-2">
        <select class="select select-bordered" wire:model.live="area">
            <option value="">SEMUA WITEL</option>
            @foreach (\App\Models\Datel::$witels as $optwtl)
                <option value="{{ $optwtl }}">{{ $optwtl }}</option>
            @endforeach
        </select>
        <input type="date" class="input input-bordered" placeholder="" wire:model.live="tanggal">
        <button class="btn bordered">
            <x-tabler-camera class="icon-5" />
            <span>Capture</span>
        </button>
    </div>
    <div>
        {{-- <pre>@json($datas, JSON_PRETTY_PRINT)</pre> --}}
    </div>
    <div class="table-wrapper">
        <div class="card-body p-4">
            <div class="flex justify-between">
                <div class="font-semibold text-sm">SUMMARY SIKONS {{ $area ? 'WITEL ' . $area : 'SEMUA WITEL' }}</div>
                <div class="font-medium text-sm">{{ date('d F Y', strtotime($tanggal)) }}</div>
            </div>
        </div>
        <table class="table text-center border-t table-xs">
            <thead class="text-black">
                <tr>
                    <th rowspan="2">WITEL</th>
                    <th rowspan="2">STO</th>
                    <th colspan="6">LAPORAN MASUK</th>
                    <th colspan="2">KONDISI</th>
                    <th colspan="3">CUACA</th>
                    <th colspan="2">PLN</th>
                </tr>
                <tr>
                    <th>PG</th>
                    <th>%</th>
                    <th>SR</th>
                    <th>%</th>
                    <th>ML</th>
                    <th>%</th>
                    <th>
                        <div class="icon-center tooltip" data-tip="aman">
                            <x-tabler-check class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="tidak aman">
                            <x-tabler-x class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="cerah">
                            <x-tabler-sun class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="mendung">
                            <x-tabler-cloud class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="hujan">
                            <x-tabler-cloud-rain class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="on">
                            <x-tabler-bulb class="icon-4" />
                        </div>
                    </th>
                    <th>
                        <div class="icon-center tooltip" data-tip="off">
                            <x-tabler-bulb-off class="icon-4" />
                        </div>
                    </th>
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
            </tfoot>
        </table>
    </div>
</div>

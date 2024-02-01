<div class="page-wrapper max-w-full">
    @livewire('partial.header')
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
        <button class="btn btn-outline btn-primary" onclick="showalert()">
            <x-tabler-camera class="icon-5" />
            <span>Capture</span>
        </button>
    </div>
    <div class="table-wrapper w-full" id="elementToCopy">
        <div class="card-body p-4">
            <div class="flex flex-col md:flex-row justify-between">
                <div class="font-semibold text-sm">SUMMARY SIKONS {{ $area ? 'WITEL ' . $area : 'SEMUA WITEL' }}</div>
                <div class="font-medium text-sm">{{ date('d F Y', strtotime($tanggal)) }}</div>
            </div>
        </div>
        <table class="table text-center border-y table-xs w-full">
            <thead class="uppercase">
                <tr>
                    <th rowspan="2" class="bg-orange-500 text-black">WITEL {{ $area }}</th>
                    <th rowspan="2" class="bg-orange-400 text-black">STO</th>
                    <th colspan="6" class="bg-purple-400 text-black">LAPORAN MASUK</th>
                    <th colspan="2" class="bg-green-500 text-black">LINGKUNGAN</th>
                    <th colspan="3" class="bg-cyan-400 text-black">CUACA</th>
                    <th colspan="2" class="bg-yellow-400 text-black">PLN</th>
                </tr>
                <tr>
                    <th class="bg-purple-300 text-black">Pagi</th>
                    <th class="bg-purple-300 text-black">%</th>
                    <th class="bg-purple-300 text-black">Sore</th>
                    <th class="bg-purple-300 text-black">%</th>
                    <th class="bg-purple-300 text-black">Mlam</th>
                    <th class="bg-purple-300 text-black">%</th>
                    <th class="bg-green-300 text-black">aman</th>
                    <th class="bg-green-300 text-black">tdak</th>
                    <th class="bg-yellow-300 text-black">cerah</th>
                    <th class="bg-gray-300 text-black">mndng</th>
                    <th class="bg-gray-500 text-black">hujan</th>
                    <th class="bg-yellow-300 text-black">on</th>
                    <th class="bg-yellow-300 text-black">off</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($witels as $witel)
                    @php
                        $total[$witel] = $area ? \App\Models\Lokasi::datelname($witel)->count() : \App\Models\Lokasi::witel($witel)->count();
                    @endphp
                    <tr>
                        <td class="text-left">
                            <button wire:click="gantiarea('{{ $witel }}')"
                                class="btn btn-ghost btn-xs">{{ $witel }}</button>
                        </td>
                        <td class="bg-cyan-100 text-black">{{ $total[$witel] }}</td>
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'pagi')->count() : '0' }}</td>
                        <td class="bg-green-100 text-black">
                            {{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'pagi')->count(), $total[$witel]) : '0%' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'sore')->count() : '0' }}</td>
                        <td class="bg-green-100 text-black">
                            {{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'sore')->count(), $total[$witel]) : '0%' }}
                        </td>
                        <td>{{ isset($datas[$witel]) ? $datas[$witel]->where('waktu', 'malam')->count() : '0' }}</td>
                        <td class="bg-green-100 text-black">
                            {{ isset($datas[$witel]) ? Sikons::persen($datas[$witel]->where('waktu', 'malam')->count(), $total[$witel]) : '0%' }}
                        </td>
                        <td class="bg-green-200 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('lingkungan', 'aman')->count() : '0' }}
                        </td>
                        <td class="bg-red-100 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('lingkungan', 'tidak aman')->count() : '0' }}
                        </td>
                        <td class="bg-yellow-100 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('cuaca', 'cerah')->count() : '0' }}</td>
                        <td class="bg-gray-100 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('cuaca', 'mendung')->count() : '0' }}</td>
                        <td class="bg-gray-300 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->whereNotIn('cuaca', ['cerah', 'mendung'])->count() : '0' }}
                        </td>
                        <td class="bg-green-100 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('pln', 'on')->count() : '0' }}</td>
                        <td class="bg-red-100 text-black">
                            {{ isset($datas[$witel]) ? $datas[$witel]->where('pln', 'off')->count() : '0' }}</td>

                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <th class="text-left">
                    <button class="btn btn-ghost btn-xs">TOTAL</button>
                </th>
                <th class="bg-cyan-200 text-black">{{ $location_count }}</th>
                <th class="bg-green-100 text-black">{{ $laporan->where('waktu', 'pagi')->count() }}</th>
                <th class="bg-green-200 text-black">
                    {{ Sikons::persen($laporan->where('waktu', 'pagi')->count(), $location_count) }}</th>
                <th class="bg-green-100 text-black">{{ $laporan->where('waktu', 'sore')->count() }}</th>
                <th class="bg-green-200 text-black">
                    {{ Sikons::persen($laporan->where('waktu', 'sore')->count(), $location_count) }}</th>
                <th class="bg-green-100 text-black">{{ $laporan->where('waktu', 'malam')->count() }}</th>
                <th class="bg-green-200 text-black">
                    {{ Sikons::persen($laporan->where('waktu', 'malam')->count(), $location_count) }}</th>
                <th class="bg-green-300 text-black">{{ $laporan->where('lingkungan', 'aman')->count() }}</th>
                <th class="bg-red-200 text-black">{{ $laporan->where('lingkungan', 'tidak aman')->count() }}</th>
                <th class="bg-yellow-200 text-black">{{ $laporan->where('cuaca', 'cerah')->count() }}</th>
                <th class="bg-gray-200 text-black">{{ $laporan->where('cuaca', 'mendung')->count() }}</th>
                <th class="bg-gray-400 text-black">
                    {{ $laporan->whereIn('cuaca', ['hujan ringan', 'hujan berat'])->count() }}</th>
                <th class="bg-green-200 text-black">{{ $laporan->where('pln', 'on')->count() }}</th>
                <th class="bg-red-200 text-black">{{ $laporan->where('pln', 'off')->count() }}</th>
            </tfoot>
        </table>
        <div class="card-body p-4">
            <div class="text-xs opacity-70 text-center">Update data terakhir : {{ date('d F Y H:i:s') }}</div>
        </div>
    </div>
</div>

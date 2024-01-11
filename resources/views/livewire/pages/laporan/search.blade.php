<div class="page-wrapper space-y-10">
    @livewire('partial.header', [
        'title' => 'Pencarian laporan',
    ])

    <div class="card border border-base-300">
        <div class="card-body space-y-4">
            <div class="card-title">Pencarian dengan tanggal</div>
            <div class="grid lg:grid-cols-4 gap-3">
                <select type="search" @class(['select select-bordered', 'text-success' => isset($jenis)]) wire:model.live="jenis">
                    <option value="">Pilih Jenis pencarian tanggal</option>
                    <option value="range">Range tanggal</option>
                    <option value="bulan">Bulan</option>
                    <option value="tanggal">Spesifik tanggal</option>
                </select>

                @if ($jenis == 'tanggal')
                    <input type="date"
                        class="input input-bordered @isset($tanggal) text-success @endisset @error('tanggal') input-error @enderror"
                        wire:model.live="tanggal">
                @elseif ($jenis == 'bulan')
                    <input type="month"
                        class="input input-bordered @isset($bulan) text-success @endisset @error('bulan') input-error @enderror"
                        wire:model.live="bulan">
                @elseif ($jenis == 'range')
                    <input type="date"
                        class="input input-bordered @isset($range[0]) text-success @endisset @error('range.0') input-error @enderror"
                        wire:model.live="range.0">
                    <input type="date"
                        class="input input-bordered @isset($range[1]) text-success @endisset @error('range.1') input-error @enderror"
                        wire:model.live="range.1">
                @endif
            </div>
        </div>
        <div class="divider p-0 m-0"></div>
        <div class="card-body space-y-4">
            <div class="card-title">Pencarian dengan lokasi</div>
            <div class="grid lg:grid-cols-4 gap-3">
                <select type="search" @class(['select select-bordered', 'text-success' => isset($witel)]) wire:model.live="witel">
                    <option value="">Semua witel</option>
                    @foreach ($witels as $wtl => $datels)
                        <option value="{{ $wtl }}">{{ $wtl }}</option>
                    @endforeach
                </select>
                <select type="search" @class(['select select-bordered', 'text-success' => isset($datel)]) wire:model.live="datel">
                    <option value="">Semua datel</option>
                    @isset($witel)
                        @foreach ($witels[$witel] as $datel)
                            <option value="{{ $datel->name }}">{{ $datel->name }}</option>
                        @endforeach
                    @endisset
                </select>
                <select type="search" @class([
                    'select select-bordered',
                    'text-success' => isset($lokasi_id),
                ]) wire:model.live="lokasi_id">
                    <option value="">Semua lokasi</option>
                    @foreach ($lokasis as $lokasiid => $lokasiname)
                        <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="divider p-0 m-0"></div>
        <div class="card-body space-y-4">
            <div class="card-title">Pencarian dengan parameter</div>
            <div class="grid lg:grid-cols-4 gap-3">
                <select @class(['select select-bordered', 'text-success' => isset($waktu)]) wire:model.live="waktu">
                    <option value="">Semua waktu jaga</option>
                    <option value="malam">Shift malam (23:00 - 07:00)</option>
                    <option value="pagi">Shift pagi (07:00 - 15:00)</option>
                    <option value="sore">Shift sore (15:00 - 23:00)</option>
                </select>
                <select @class([
                    'select select-bordered',
                    'text-success' => isset($lingkungan),
                ]) wire:model.live="lingkungan">
                    <option value="">Kondisi lingkungan</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($bbm)]) wire:model.live="bbm">
                    <option value="">Kondisi bbm</option>
                    <option value="aman">Aman (diatas 50%)</option>
                    <option value="tidak aman">Tidak aman (dibawah 50%)</option>
                </select>
                <select @class([
                    'select select-bordered',
                    'text-success' => isset($perangkat),
                ]) wire:model.live="perangkat">
                    <option value="">Kondisi perangkat</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($apar)]) wire:model.live="apar">
                    <option value="">Kondisi apar</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($apd)]) wire:model.live="apd">
                    <option value="">Kondisi apd</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($cuaca)]) wire:model.live="cuaca">
                    <option value="">Kondisi cuaca</option>
                    <option value="aman">Cerah</option>
                    <option value="mendung">Mendung</option>
                    <option value="hujan ringan">Hujan ringan</option>
                    <option value="hujan berat">Hujan berat</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($pln)]) wire:model.live="pln">
                    <option value="">Kondisi PLN</option>
                    <option value="on">ON</option>
                    <option value="off">OFF</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($genset)]) wire:model.live="genset">
                    <option value="">Kondisi Genset</option>
                    <option value="on">ON</option>
                    <option value="off">OFF</option>
                </select>
                <select @class(['select select-bordered', 'text-success' => isset($gedung)]) wire:model.live="gedung">
                    <option value="">Kondisi Gedung</option>
                    <option value="normal">Normal</option>
                    <option value="bocor">Bocor</option>
                    <option value="rusak">Rusak</option>
                </select>
            </div>
        </div>
        <div class="divider p-0 m-0"></div>
        <div class="card-body">
            <div class="card-actions justify-between">
                <button class="btn btn-primary" wire:click="cari">
                    <x-tabler-search class="icon-5" />
                    <span>Cari laporan</span>
                </button>
                <button type="button" class="btn btn-ghost" wire:click="resetFilter">
                    <x-tabler-x class="icon-5" />
                    <span class="hidden md:flex">Reset pencarian</span>
                </button>
            </div>
        </div>
    </div>

    @if ($result)
        <div class="flex flex-col md:flex-row justify-between">
            <button class="btn btn-accent" wire:click="cari">
                <x-tabler-download class="icon-5" />
                <span>Download hasil ({{ $datas->count() }} item)</span>
            </button>
            <button class="btn btn-ghost">
                <span>Menampilkan 25 dari {{ $datas->count() }} laporan</span>
            </button>
        </div>
        <div class="table-wrapper">
            <table class="table table-sm">
                <thead class="text-center">
                    <tr>
                        <th rowspan="2">No</th>
                        <th colspan="3">Lokasi</th>
                        <th colspan="2">Waktu</th>
                        <th colspan="9">Parameter</th>
                        <th rowspan="2">Petugas</th>
                    </tr>
                    <tr>
                        <th>Witel</th>
                        <th>Datel</th>
                        <th>Gedung</th>

                        <th>Tanggal</th>
                        <th>Waktu</th>

                        <th>Lingkungan</th>
                        <th>BBM</th>
                        <th>Perangkat</th>
                        <th>APAR</th>
                        <th>APD</th>
                        <th>Cuaca</th>
                        <th>PLN</th>
                        <th>Genset</th>
                        <th>Gedung</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas->take(25) as $data)
                        <tr>
                            <td>{{ $data->id }}</td>
                            <td>{{ $data->lokasi->datel->witel }}</td>
                            <td>{{ $data->lokasi->datel->name }}</td>
                            <td>{{ $data->lokasi->name }}</td>

                            <td>{{ $data->tanggal->format('d/m/Y') }}</td>
                            <td>{{ $data->waktu }}</td>

                            <td>{{ $data->lingkungan }}</td>
                            <td>{{ $data->bbm }}</td>
                            <td>{{ $data->perangkat }}</td>
                            <td>{{ $data->apar }}</td>
                            <td>{{ $data->apd }}</td>
                            <td>{{ $data->cuaca }}</td>
                            <td>{{ $data->pln }}</td>
                            <td>{{ $data->genset }}</td>
                            <td>{{ $data->gedung }}</td>

                            <td>{{ $data->user->name }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

</div>

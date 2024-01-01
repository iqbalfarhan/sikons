<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pencarian laporan',
    ])

    <div class="card border">
        <div class="card-body space-y-4">
            <div class="card-title">Pencarian dengan tanggal</div>
            <div class="grid lg:grid-cols-4 gap-3">
                <select type="search" class="select select-bordered" wire:model.live="jenis">
                    <option value="">Pilih Jenis pencarian tanggal</option>
                    <option value="range">range tanggal</option>
                    <option value="bulan">bulan</option>
                    <option value="tanggal">spesifik tanggal</option>
                </select>

                @if ($jenis == 'tanggal')
                    <input type="date" class="input input-bordered" placeholder="Search" wire:model.live="tanggal">
                @elseif ($jenis == 'bulan')
                    <input type="month" class="input input-bordered" placeholder="Search" wire:model.live="tanggal">
                @elseif ($jenis == 'range')
                    <input type="date" class="input input-bordered" placeholder="Search" wire:model.live="range.0">
                    <input type="date" class="input input-bordered" placeholder="Search" wire:model.live="range.1">
                @endif
            </div>
        </div>
        <div class="divider p-0 m-0"></div>
        <div class="card-body space-y-4">
            <div class="card-title">Pencarian dengan lokasi</div>
            <div class="grid lg:grid-cols-4 gap-3">
                <select type="search" class="select select-bordered" wire:model.live="witel">
                    <option value="">Semua witel</option>
                    @foreach ($witels as $wtl => $datels)
                        <option value="{{ $wtl }}">{{ $wtl }}</option>
                    @endforeach
                </select>
                <select type="search" class="select select-bordered" wire:model.live="datel">
                    <option value="">Semua datel</option>
                    @isset($witel)
                        @foreach ($witels[$witel] as $datel)
                            <option value="{{ $datel->name }}">{{ $datel->name }}</option>
                        @endforeach
                    @endisset
                </select>
                <select type="search" class="select select-bordered" wire:model.live="lokasi_id">
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
                <select class="select select-bordered" wire:model.live="waktu">
                    <option value="">Semua waktu jaga</option>
                    <option value="malam">Shift malam (23:00 - 07:00)</option>
                    <option value="pagi">Shift pagi (07:00 - 15:00)</option>
                    <option value="sore">Shift sore (15:00 - 23:00)</option>
                </select>
                <select class="select select-bordered" wire:model.live="lingkungan">
                    <option value="">Kondisi lingkungan</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select class="select select-bordered" wire:model.live="bbm">
                    <option value="">Kondisi bbm</option>
                    <option value="aman">Aman (diatas 50%)</option>
                    <option value="tidak aman">Tidak aman (dibawah 50%)</option>
                </select>
                <select class="select select-bordered" wire:model.live="perangkat">
                    <option value="">Kondisi perangkat</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select class="select select-bordered" wire:model.live="apar">
                    <option value="">Kondisi apar</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select class="select select-bordered" wire:model.live="apd">
                    <option value="">Kondisi apd</option>
                    <option value="aman">Aman</option>
                    <option value="tidak aman">Tidak aman</option>
                </select>
                <select class="select select-bordered" wire:model.live="cuaca">
                    <option value="">Kondisi cuaca</option>
                    <option value="aman">Cerah</option>
                    <option value="mendung">Mendung</option>
                    <option value="hujan ringan">Hujan ringan</option>
                    <option value="hujan berat">Hujan berat</option>
                </select>
                <select class="select select-bordered" wire:model.live="pln">
                    <option value="">Kondisi PLN</option>
                    <option value="on">ON</option>
                    <option value="off">OFF</option>
                </select>
                <select class="select select-bordered" wire:model.live="genset">
                    <option value="">Kondisi Genset</option>
                    <option value="on">ON</option>
                    <option value="off">OFF</option>
                </select>
                <select class="select select-bordered" wire:model.live="genset">
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
                <button type="button" class="btn btn-warning" wire:click="$reset">
                    <x-tabler-x class="icon-5" />
                    <span>Reset pencarian</span>
                </button>
            </div>
        </div>
    </div>


    @forelse ($datas as $data)
        <button class="btn btn-accent" wire:click="cari">
            <x-tabler-download class="icon-5" />
            <span>Download hasil</span>
        </button>
        <div class="divider text-xs opacity-75">{{ $datas->count() }} Laporan ditemukan</div>
        <div class="grid lg:grid-cols-3 gap-6">
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        </div>
    @empty
        @livewire('partial.nocontent', [
            'title' => 'Pencarian',
            'desc' => 'Silakan isi tanggal, datel, lokasi jaga atau waktu jaga dan klik cari laporan',
        ])
    @endforelse
</div>

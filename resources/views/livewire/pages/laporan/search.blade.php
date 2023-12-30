<div class="page-wrapper">
    @livewire('partial.header', [
        'title' => 'Pencarian laporan',
    ])

    <div class="card border">
        <div class="card-body space-y-4">
            <div class="grid lg:grid-cols-4 gap-3">
                <input type="date" class="input input-bordered" placeholder="Search" wire:model.live="tanggal">
                <select type="search" class="select select-bordered" wire:model.live="datel">
                    <option value="">Pilih datel</option>
                    @foreach ($witels as $witel => $datels)
                        <optgroup label="{{ $witel }}">
                            @foreach ($datels as $datel)
                                <option value="{{ $datel->name }}">{{ $datel->name }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <select type="search" class="select select-bordered" wire:model.live="lokasi_id">
                    <option value="">Pilih lokasi</option>
                    @foreach ($lokasis as $lokasiid => $lokasiname)
                        <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
                    @endforeach
                </select>
                <select class="select select-bordered" wire:model.live="waktu">
                    <option value="">Semua waktu jaga</option>
                    <option value="malam">Shift malam (23:00 - 07:00)</option>
                    <option value="pagi">Shift pagi (07:00 - 15:00)</option>
                    <option value="sore">Shift sore (15:00 - 23:00)</option>
                </select>
            </div>

            <div class="card-actions">
                <button class="btn btn-primary" wire:click="cari">
                    <x-tabler-search class="icon-5" />
                    <span>Cari laporan</span>
                </button>
                <button class="btn btn-warning" wire:click="cari">
                    <x-tabler-x class="icon-5" />
                    <span>Reset pencarian</span>
                </button>
            </div>
        </div>
    </div>

    <div class="divider text-xs opacity-75">{{ $datas->count() }} Laporan ditemukan</div>

    <div class="grid lg:grid-cols-3 gap-6">
        @forelse ($datas as $data)
            @livewire('pages.laporan.item', ['laporan' => $data], key($data->id))
        @empty
            <div class="col-span-full">
                @livewire('partial.nocontent', [
                    'title' => 'Pencarian',
                    'desc' => 'Silakan isi tanggal, datel, lokasi jaga atau waktu jaga dan klik cari laporan',
                ])
            </div>
        @endforelse
    </div>
</div>

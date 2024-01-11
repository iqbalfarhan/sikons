<div class="page-wrapper max-w-3xl space-y-10">
    <div class="">
        @livewire('partial.header', [
            'title' => 'Penggunaan listrik harian',
            'desc' => 'laporan harian tiap pagi',
        ])
    </div>

    <div class="grid md:grid-cols-2 gap-2 md:gap-6">
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Lokasi jaga</span>
                @error('lokasi_id')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <select class="select select-bordered @error('lokasi_id') select-error @enderror" wire:model.live="lokasi_id">
                <option value="">Pilih lokasi</option>
                @foreach ($lokasis as $lokasiid => $lokasiname)
                    <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Tanggal</span>
                @error('tanggal')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <input type="date" class="input input-bordered @error('tanggal') input-error @enderror"
                wire:model.live="tanggal">
        </div>
    </div>

    @if ($datas->count() > 0)
        <div class="divider text-xs opacity-75">{{ $datas->count() }} nomor pln yang harus diisi</div>

        <div class="grid md:grid-cols-2 gap-6">
            @foreach ($datas as $idtoken => $nopln)
                <div class="card border bg-base-200 shadow-lg border-base-300">
                    <figure>
                        @if (isset($input[$idtoken]['photo']))
                            <label for="photo{{ $idtoken }}">
                                <img src="{{ $input[$idtoken]['photo']->temporaryUrl() }}" alt="">
                            </label>
                        @elseif (isset($input[$idtoken]['oldphoto']) && $input[$idtoken]['oldphoto'] != '')
                            <label for="photo{{ $idtoken }}">
                                <img src="{{ Storage::url($input[$idtoken]['oldphoto']) }}" alt="dfasd"
                                    class="w-full">
                            </label>
                        @else
                            <label for="photo{{ $idtoken }}">
                                <img src="{{ url('no-image.jpg') }}" alt="nophoto" class="w-full">
                            </label>
                        @endif
                        <input type="file" id="photo{{ $idtoken }}"
                            wire:model.live="input.{{ $idtoken }}.photo" class="hidden" accept="image/*">
                    </figure>
                    <div class="card-body p-6">
                        <div class="form-control">
                            <label for="">
                                <span class="label-text">No PLN : {{ $nopln }}</span>
                            </label>
                            <input type="number"
                                class="input input-bordered w-full @error("input.{{ $idtoken }}.pemakaian") input-error @enderror"
                                placeholder="Penggunaan daya terakhir"
                                wire:model.live='input.{{ $idtoken }}.pemakaian'>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div>
            <button class="btn btn-primary" wire:click="simpan">
                <x-tabler-check class="icon-5" />
                <span>Simpan</span>
            </button>
        </div>
    @endif
</div>

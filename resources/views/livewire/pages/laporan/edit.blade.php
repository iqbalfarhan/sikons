<form class="page-wrapper lg:max-w-3xl" wire:submit="simpan">
    @livewire('partial.header', ['title' => 'Buat laporan sikons harian'])
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Lokasi jaga</span>
                @error('form.lokasi_id')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <select class="select select-bordered @error('form.lokasi_id') select-error @enderror"
                wire:model.live="form.lokasi_id">
                <option value="">Pilih lokasi</option>
                @foreach ($lokasis as $lokasiid => $lokasiname)
                    <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Waktu jaga</span>
                @error('form.waktu')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <select class="select select-bordered @error('form.waktu') select-error @enderror"
                wire:model.live="form.waktu">
                <option value="malam">Shift malam (23:00 - 07:00)</option>
                <option value="pagi">Shift pagi (07:00 - 15:00)</option>
                <option value="sore">Shift sore (15:00 - 23:00)</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Lingkungan</span>
                @error('form.lingkungan')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="lingkungan" class="radio" value="aman"
                        wire:model.live="form.lingkungan" />
                    <span class="label-text">Lingkungan aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="lingkungan" class="radio" value="tidak aman"
                        wire:model.live="form.lingkungan" />
                    <span class="label-text">Lingkungan tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Stok BBM</span>
                @error('form.bbm')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="bbm" class="radio" value="aman" wire:model.live="form.bbm" />
                    <span class="label-text">BBM aman (lebih dari 50%)</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="bbm" class="radio" value="tidak aman" wire:model.live="form.bbm" />
                    <span class="label-text">BBM tidak aman (kurang dari 50%)</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi perangkat</span>
                @error('form.perangkat')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="perangkat" class="radio" value="aman"
                        wire:model.live="form.perangkat" />
                    <span class="label-text">Perangkat aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="perangkat" class="radio" value="tidak aman"
                        wire:model.live="form.perangkat" />
                    <span class="label-text">Perangkat tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi APAR (Alat pemadam api ringan)</span>
                @error('form.apar')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apar" class="radio" value="aman" wire:model.live="form.apar" />
                    <span class="label-text">APAR aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apar" class="radio" value="tidak aman"
                        wire:model.live="form.apar" />
                    <span class="label-text">APAR tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi APD (Alat pelindung diri)</span>
                @error('form.apd')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apd" class="radio" value="aman"
                        wire:model.live="form.apd" />
                    <span class="label-text">APD aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apd" class="radio" value="aman"
                        wire:model.live="form.apd" />
                    <span class="label-text">APD tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi cuaca saat jaga</span>
                @error('form.cuaca')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" value="cerah"
                        wire:model.live="form.cuaca" />
                    <span class="label-text">Cerah</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" value="mendung"
                        wire:model.live="form.cuaca" />
                    <span class="label-text">Mendung</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" value="hujan ringan"
                        wire:model.live="form.cuaca" />
                    <span class="label-text">Hujan ringan</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" value="hujan deras"
                        wire:model.live="form.cuaca" />
                    <span class="label-text">Hujan deras</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi PLN dan Genset</span>
                @error('form.pln')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
                @error('form.genset')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="pln" class="radio" value="on"
                        wire:model.live="form.pln" />
                    <span class="label-text">PLN ON</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="pln" class="radio" value="off"
                        wire:model.live="form.pln" />
                    <span class="label-text">PLN OFF</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="genset" class="radio" value="on"
                        wire:model.live="form.genset" />
                    <span class="label-text">Genset ON</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="genset" class="radio" value="off"
                        wire:model.live="form.genset" />
                    <span class="label-text">Genset OFF</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Gedung</span>
                @error('form.gedung')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" value="normal"
                        wire:model.live="form.gedung" />
                    <span class="label-text">Normal</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" value="bocor"
                        wire:model.live="form.gedung" />
                    <span class="label-text">Bocor</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" value="rusak"
                        wire:model.live="form.gedung" />
                    <span class="label-text">Rusak</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Eviden kondisi lingkungan</span>
                @error('form.ev_lingkungan')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <input id="ev_lingkungan" type="file" class="hidden" wire:model.live="ev_lingkungan">
            <label for="ev_lingkungan" class="card w-full aspect-video shadow bg-base-200 overflow-hidden">
                @if ($ev_lingkungan)
                    <figure class="">
                        <img src="{{ $ev_lingkungan->temporaryUrl() }}" alt="">
                    </figure>
                @else
                    <figure class="">
                        <img src="{{ $laporan->thumbnail }}" alt="">
                    </figure>
                @endif
            </label>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Eviden kondisi gedung</span>
                @error('form.ev_gedung')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </label>
            <input id="ev_gedung" type="file" class="hidden" wire:model.live="ev_gedung">
            <label for="ev_gedung" class="card w-full aspect-video shadow bg-base-200 overflow-hidden">
                @if ($ev_gedung)
                    <figure class="">
                        <img src="{{ $ev_gedung->temporaryUrl() }}" alt="">
                    </figure>
                @else
                    @if ($laporan->ev_gedung)
                        <figure class="">
                            <img src="{{ Storage::url($laporan->ev_gedung) }}" alt="">
                        </figure>
                    @else
                        <figure class="">
                            <img src="{{ url('no-image.jpg') }}" alt="">
                        </figure>
                    @endif
                @endif
            </label>
        </div>
        <div class="form-control col-span-full">
            <label class="label cursor-pointer">
                <span class="label-text">Catatan jaga</span>
            </label>
            <textarea class="textarea textarea-bordered" placeholder="Catatan selama menjalankan tugas hari ini"
                wire:model.live="form.catatan"></textarea>
        </div>

    </div>

    <button class="btn btn-primary">
        <x-tabler-check class="icon-5" />
        <span>Simpan</span>
    </button>
</form>

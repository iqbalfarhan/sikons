<div class="page-wrapper max-w-3xl">
    @livewire('partial.header', ['title' => 'Buat laporan sikons harian'])
    <div class="grid lg:grid-cols-2 gap-6">
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Lokasi jaga</span>
            </label>
            <select class="select select-bordered">
                @foreach ($lokasis as $lokasiid => $lokasiname)
                    <option value="{{ $lokasiid }}">{{ $lokasiname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Waktu jaga</span>
            </label>
            <select class="select select-bordered">
                <option value="malam">Shift malam (23:00 - 07:00)</option>
                <option value="pagi">Shift pagi (07:00 - 15:00)</option>
                <option value="sore">Shift sore (15:00 - 23:00)</option>
            </select>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Lingkungan</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="lingkungan" class="radio" @checked(true) />
                    <span class="label-text">Lingkungan aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="lingkungan" class="radio" />
                    <span class="label-text">Lingkungan tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Stok BBM</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="bbm" class="radio" @checked(true) />
                    <span class="label-text">BBM aman (lebih dari 50%)</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="bbm" class="radio" />
                    <span class="label-text">BBM tidak aman (kurang dari 50%)</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi perangkat</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="perangkat" class="radio" @checked(true) />
                    <span class="label-text">Perangkat aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="perangkat" class="radio" />
                    <span class="label-text">Perangkat tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi APAR (Alat pemadam api ringan)</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apar" class="radio" @checked(true) />
                    <span class="label-text">APAR aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apar" class="radio" />
                    <span class="label-text">APAR tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi APD (Alat pelindung diri)</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apd" class="radio" @checked(true) />
                    <span class="label-text">APD aman</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="apd" class="radio" />
                    <span class="label-text">APD tidak aman</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi cuaca saat jaga</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" @checked(true) />
                    <span class="label-text">Cerah</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" />
                    <span class="label-text">Mendung</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" />
                    <span class="label-text">Hujan ringan</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="cuaca" class="radio" />
                    <span class="label-text">Hujan deras</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi PLN dan Genset</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="pln" class="radio" @checked(true) />
                    <span class="label-text">PLN ON</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="pln" class="radio" />
                    <span class="label-text">PLN OFF</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="genset" class="radio" />
                    <span class="label-text">Genset ON</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="genset" class="radio" @checked(true) />
                    <span class="label-text">Genset OFF</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label class="label cursor-pointer">
                <span class="label-text">Kondisi Gedung</span>
            </label>
            <div class="form-control">
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" @checked(true) />
                    <span class="label-text">Normal</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" />
                    <span class="label-text">Bocor</span>
                </label>
                <label class="label cursor-pointer justify-start gap-2">
                    <input type="radio" name="gedung" class="radio" />
                    <span class="label-text">Rusak</span>
                </label>
            </div>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Eviden kondisi lingkungan</span>
            </label>
            <input type="file" class="hidden">
            <div class="card w-full aspect-video border-dashed border-4 rounde">
                <div class="card-body">
                </div>
            </div>
        </div>
        <div class="form-control">
            <label for="" class="label">
                <span class="label-text">Eviden kondisi gedung</span>
            </label>
            <input type="file" class="hidden">
            <div class="avatar placeholder">
                <div class="rouded w-full aspect-video border-dashed border-4 rounded">
                    <x-tabler-camera />
                </div>
            </div>
        </div>
        <div class="form-control col-span-full">
            <label class="label cursor-pointer">
                <span class="label-text">Catatan jaga</span>
            </label>
            <textarea class="textarea textarea-bordered" placeholder="Catatan selama menjalankan tugas hari ini"></textarea>
        </div>

    </div>

    <button class="btn btn-primary">
        <x-tabler-check class="icon-5" />
        <span>Simpan</span>
    </button>
</div>

<div>
    <input type="checkbox" id="userCreate" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box w-full max-w-3xl" wire:submit="simpan">
            <h3 class="font-bold text-lg">Buat user!</h3>
            <div class="grid grid-cols-2 gap-4 py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lengkap</span>
                        @error('form.name')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.name') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.name">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Username</span>
                        @error('form.username')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.username') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.username">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Witel</span>
                        @error('witel')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <select class="select select-bordered @error('witel') select-error @enderror"
                        wire:model.live="witel">
                        <option value="">pilih witel</option>
                        @foreach ($witels as $witel)
                            <option value="{{ $witel }}">{{ $witel }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Datel</span>
                        @error('form.datel_id')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <select class="select select-bordered @error('form.datel_id') select-error @enderror"
                        wire:model="form.datel_id">
                        <option value="">pilih witel</option>
                        @foreach ($datels as $datelid => $datelname)
                            <option value="{{ $datelid }}">{{ $datelname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password</span>
                        @error('form.password')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.password') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.password">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nomor telpon</span>
                        @error('form.telp')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.telp') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.telp">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Photo</span>
                        @error('form.photo')
                            <span class="label-text-alt">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.photo') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.photo">
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="userCreate" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

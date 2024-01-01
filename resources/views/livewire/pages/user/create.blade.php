<div>
    <input type="checkbox" id="userCreate" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box w-full max-w-3xl space-y-4" wire:submit="simpan">
            @livewire('partial.header', [
                'title' => ucfirst($mode) . ' user baru',
            ])
            <div class="grid grid-cols-2 gap-4 py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lengkap</span>
                        @error('form.name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.name') input-error @enderror"
                        placeholder="Nama lengkap user" wire:model="form.name">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Datel</span>
                        @error('form.datel_id')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <select type="search" class="select select-bordered @error('form.datel_id') select-error @enderror"
                        wire:model.live="form.datel_id">
                        <option value="">Pilih datel</option>
                        @foreach ($witels as $witel => $datels)
                            <optgroup label="{{ $witel }}">
                                @foreach ($datels as $datel)
                                    <option value="{{ $datel->id }}">{{ $datel->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Username</span>
                        @error('form.username')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.username') input-error @enderror"
                        placeholder="Username login" wire:model="form.username">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password</span>
                        <button type="button" class="label-text-alt" wire:click="toggleShowPassword">
                            {{ $showPassword ? 'hide' : 'show' }}
                        </button>
                    </label>
                    <input type="{{ $showPassword ? 'text' : 'password' }}"
                        class="input input-bordered @error('form.password') input-error @enderror"
                        placeholder="Password" wire:model="form.password">
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nomor telpon</span>
                        @error('form.telp')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('form.telp') input-error @enderror"
                        placeholder="Nomor telpon" wire:model="form.telp">
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="userCreate" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

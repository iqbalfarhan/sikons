<div>
    <input type="checkbox" id="editPassword" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Edit password user</h3>
            <div class="py-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Password baru</span>
                        <button type="button" class="label-text-alt" wire:click="toggleShowPassword">
                            {{ $showPassword ? 'hide' : 'show' }}
                        </button>
                    </label>
                    <input type="{{ $showPassword ? 'text' : 'password' }}"
                        class="input input-bordered @error('password') input-error @enderror"
                        placeholder="password baru" wire:model="password">
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="editPassword" class="btn">Close!</label>
                <button class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</div>

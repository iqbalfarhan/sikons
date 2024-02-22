<div>
    <input type="checkbox" id="editPermission" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box" wire:submit="simpan">
            <h3 class="font-bold text-lg">Edit permission</h3>
            <div class="space-y-2 py-6">

                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">permission name</span>
                        @error('name')
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        @enderror
                    </label>
                    <input type="text" class="input input-bordered @error('name') input-error @enderror"
                        placeholder="Nama permission" wire:model.lazy="name">
                </div>

                @error('permission')
                    <span class="label-text-alt text-error">{{ $message }}</span>
                @enderror
            </div>
            <div class="modal-action justify-between">
                <label for="editPermission" class="btn">Close!</label>
                <button class="btn btn-primary">
                    <x-tabler-check class="icon-5" />
                    <span>Create</span>
                </button>
            </div>
        </form>
    </div>
</div>

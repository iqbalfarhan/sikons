<div>
    <input type="checkbox" id="lokasiCreate" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Create lokasi</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Datel</span>
                    </label>
                    <select class="select select-bordered @error('form.datel_id') select-error @enderror"
                        wire:model.live="form.datel_id">
                        <option value="">Pilih datel</option>
                        @foreach ($datels as $witel => $datel)
                            <optgroup label="{{ $witel }}">
                                @foreach ($datel as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nama lokasi</span>
                    </label>
                    <input wire:model="form.name"
                        class="input input-bordered @error('form.datel_id') input-error @enderror" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Timezone</span>
                    </label>
                    <input wire:model="form.timezone"
                        class="input input-bordered @error('form.timezone') input-error @enderror" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="lokasiCreate" class="btn">Close!</label>
                <button class="btn btn-primary">
                    <x-tabler-check class="icon-5" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

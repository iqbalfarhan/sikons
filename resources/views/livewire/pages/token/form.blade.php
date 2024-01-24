<div>
    <input type="checkbox" id="tokenForm" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Edit data token pln</h3>
            <div class="py-4 space-y-4">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Nomor PLN</span>
                    </label>
                    <input wire:model="nopln" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Ukuran</span>
                    </label>
                    <input wire:model="ukuran" class="input input-bordered" />
                </div>
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text">Daya</span>
                    </label>
                    <input wire:model="daya" class="input input-bordered" />
                </div>
            </div>
            <div class="modal-action justify-between">
                <label for="tokenForm" class="btn">Close!</label>
                <button class="btn btn-primary">
                    <x-tabler-check class="icon-4" />
                    <span>Simpan</span>
                </button>
            </div>
        </form>
    </div>
</div>

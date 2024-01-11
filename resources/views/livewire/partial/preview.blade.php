<div>
    <input type="checkbox" id="imagePreview" class="modal-toggle" wire:model.live="show" />
    <div class="modal backdrop-blur-xl p-4" role="dialog">
        <div class="modal-box w-full max-w-4xl p-0 max-h-screen">
            <img src="{{ $image }}" alt="" class="w-full h-full">
        </div>
        <label class="modal-backdrop" for="imagePreview">Close</label>
    </div>
</div>

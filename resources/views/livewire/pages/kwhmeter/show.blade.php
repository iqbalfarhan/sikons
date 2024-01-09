<div>
    <input type="checkbox" id="my_modal_6" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Selisih pemakaian listrik</h3>
            <div class="space-y-6 py-6">
                <pre>@json(array_keys($pemakaian), JSON_PRETTY_PRINT)</pre>
                <pre>@json(array_values($pemakaian), JSON_PRETTY_PRINT)</pre>
            </div>
            <div class="modal-action">
                <label for="my_modal_6" class="btn">Close!</label>
            </div>
        </div>
    </div>
</div>

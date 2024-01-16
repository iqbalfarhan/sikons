<div>
    <label for="editKwhmeter" class="btn btn-primary">
        <x-tabler-edit class="icon-5" />
        <span>Edit laporan penggunaan listrik</span>
    </label>

    <input type="checkbox" id="editKwhmeter" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Hello!</h3>
            <p class="py-4">This modal works with a hidden checkbox!</p>
            {{ $token->id }}
            <div class="modal-action">
                <label for="editKwhmeter" class="btn">Close!</label>
            </div>
        </div>
    </div>
</div>

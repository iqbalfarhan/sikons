<div>
    <label for="editKwhmeter" class="btn btn-primary">
        <x-tabler-edit class="icon-5" />
        <span>Edit laporan penggunaan listrik</span>
    </label>

    <input type="checkbox" id="editKwhmeter" class="modal-toggle" />
    <div class="modal" role="dialog">
        <div class="modal-box max-w-sm">
            <h3 class="font-bold text-lg">Edit input kwhmeter!</h3>
            <input type="text" wire:model="form.token_id" class="hidden">
            <div class="py-4 space-y-6">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text-alt">Tanggal penginputan</span>
                    </label>
                    <input type="date" class="input input-bordered" wire:model.live="tanggal">
                </div>


                @if ($kwhmeter)
                    <div class="card border bg-base-200 shadow-lg border-base-300">
                        {{-- <pre>@json($form->oldphoto, JSON_PRETTY_PRINT)</pre> --}}
                        <figure>
                            @if ($photo)
                                <label for="photo">
                                    <img src="{{ $form->photo }}" alt="">
                                </label>
                            @elseif (isset($form->oldphoto) && $form->oldphoto != '')
                                <label for="photo">
                                    <img src="{{ $form->oldphoto }}" alt="{{ $form->oldphoto }}" class="w-full">
                                </label>
                            @else
                                <label for="photo">
                                    <img src="{{ Sikons::noimage() }}" alt="nophoto" class="w-full">
                                </label>
                            @endif
                            <input type="file" id="photo" wire:model.live="photo" class="hidden"
                                accept="image/*">
                        </figure>
                        <div class="card-body p-6">
                            <div class="form-control">
                                <label for="">
                                    <span class="label-text">No PLN : {{ $token->nopln }}</span>
                                </label>
                                <input type="number"
                                    class="input input-bordered w-full @error('form.pemakaian') input-error @enderror"
                                    placeholder="Penggunaan daya terakhir" wire:model.live='form.pemakaian'>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="modal-action">
                <label for="editKwhmeter" class="btn">Close!</label>
            </div>
        </div>
    </div>
</div>

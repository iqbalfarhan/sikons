<div>
    <label for="editKwhmeter" class="btn btn-primary w-full lg:w-fit">
        <x-tabler-edit class="icon-5" />
        <span>Edit laporan penggunaan listrik</span>
    </label>

    <input type="checkbox" id="editKwhmeter" class="modal-toggle" wire:model.live="show" />
    <div class="modal" role="dialog">
        <form class="modal-box max-w-sm" wire:submit="simpan">
            <h3 class="font-bold text-lg">Edit input kwhmeter!</h3>
            <input type="text" wire:model="form.token_id" class="hidden">
            <div class="py-4 space-y-6">
                <div class="form-control">
                    <label for="" class="label">
                        <span class="label-text-alt">Tanggal penginputan</span>
                    </label>
                    <input type="date" class="input input-bordered" wire:model.live="tanggal">
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if ($kwhmeter)
                    <div class="card border bg-base-200 shadow-lg border-base-300">
                        <figure>
                            <label for="photo">
                                @if ($photo)
                                    <img src="{{ $photo->temporaryUrl() }}" alt="" class="w-full">
                                @elseif (isset($form->oldphoto) && $form->oldphoto != '')
                                    <img src="{{ $form->oldphoto }}" alt="{{ $form->oldphoto }}" class="w-full">
                                @else
                                    <img src="{{ Sikons::noimage() }}" alt="nophoto" class="w-full">
                                @endif
                            </label>
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
            <div class="modal-action justify-between">
                <label for="editKwhmeter" class="btn">Close!</label>
                @isset($kwhmeter)
                    <button class="btn btn-primary">simpan</button>
                @endisset
            </div>
        </form>
    </div>
</div>

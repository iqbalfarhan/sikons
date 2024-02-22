<div class="page-wrapper space-y-8">
    <div class="flex flex-col justify-between items-center gap-4">
        <div>
            <label for="inputPhoto" class="avatar" wire:click="$dispatch('editProfile', {edittype: 'photo'})">
                <div class="w-32 rounded-full">
                    @if ($photo)
                        <img src="{{ $photo->temporaryUrl() }}">
                    @else
                        <img src="{{ $user->avatar }}">
                    @endif
                </div>
            </label>
        </div>
        <input type="file" wire:model="photo" id="inputPhoto" class="hidden">
        <div class="flex flex-col items-center">
            <h1 class="text-xl font-bold">{{ $user->name }}</h1>
            <span class="text-sm">{{ $user->username }}</span>
        </div>
    </div>

    <div class="w-full max-w-2xl mx-auto space-y-4">
        <div class="card bg-base-100 border-base-300 border">
            <div class="card-body space-y-4">
                <h3 class="card-title">Pengaturan akun:</h3>
                <div class="grid lg:grid-cols-2 gap-3">
                    <div class="form control">
                        <input type="text" class="input input-bordered w-full" wire:model="form.name"
                            placeholder="Nama lengkap user">
                    </div>
                    <div class="form control">
                        <input type="text" class="input input-bordered w-full" wire:model="form.username"
                            placeholder="Username">
                    </div>
                    <div class="form control">
                        <input type="password" class="input input-bordered w-full" wire:model="form.password"
                            placeholder="Password">
                    </div>
                </div>
            </div>
            <div class="divider"></div>
            <div class="card-body space-y-4">
                <h3 class="card-title">Pengaturan lainnya:</h3>
                <div class="grid lg:grid-cols-2 gap-3">
                    <div class="form control">
                        <select class="select select-bordered w-full" wire:model.live="form.datel_id">
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
                    <div class="form control">
                        <input type="text" class="input input-bordered w-full" wire:model="form.telp"
                            placeholder="Nomor telepon">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-2xl mx-auto space-y-4 ">
        <div class="flex justify-between">
            <button class="btn btn-primary" wire:click="simpan">
                <x-tabler-check class="icon-5" />
                <span>Simpan</span>
            </button>
        </div>
    </div>
</div>

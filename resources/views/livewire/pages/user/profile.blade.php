<div class="page-wrapper space-y-8">
    <div class="flex flex-col justify-between items-center gap-4">
        <div>
            <button class="avatar" wire:click="$dispatch('editProfile', {edittype: 'photo'})">
                <div class="w-24 rounded-full">
                    <img src="https://avatars.githubusercontent.com/u/53584619?v=4">
                </div>
            </button>
        </div>
        <button class="btn btn-ghost normal-case btn-lg" wire:click="$dispatch('editProfile', {edittype: 'info'})">
            <div class="flex flex-col">
                <h1 class="text-xl font-bold">{{ $user->name }}</h1>
                <span class="text-sm">{{ $user->username }}</span>
            </div>
        </button>
    </div>

    <div class="w-full max-w-xl mx-auto space-y-4">
        <h3 class="text-lg">Pengaturan akun:</h3>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">Nama lengkap</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" wire:model="form.name">
                    </div>
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">NIK</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" wire:model="form.nik">
                    </div>
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">Username login</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" wire:model="form.username">
                    </div>
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">Password login</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" wire:model="form.password"
                            placeholder="Password">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-xl mx-auto space-y-4">
        <h3 class="text-lg">Pengaturan lokasi:</h3>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">Datel</span>
                        </label>
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
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-xl mx-auto space-y-4">
        <h3 class="text-lg">Pengaturan lainnya:</h3>
        <div class="card bg-base-200">
            <div class="card-body">
                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="form control">
                        <label for="" class="label">
                            <span class="label-text">Nomor telepon</span>
                        </label>
                        <input type="text" class="input input-bordered w-full" wire:model="form.telp">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full max-w-xl mx-auto space-y-4">
        <button class="btn btn-primary">
            <x-tabler-check class="icon-5" />
            <span>Simpan</span>
        </button>
    </div>
</div>

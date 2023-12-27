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

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Layout settings:</h3>
        <ul class="menu bg-base-200 rounded-xl">
            <li>
                <label class="justify-between">
                    <span>Stacked sidebar</span>
                    <input type="checkbox" class="toggle" wire:model.live="sidebar">
                </label>
            </li>
            <li></li>
            <li>
                <label class="justify-between">
                    <span>Enable dark mode</span>
                    <input type="checkbox" class="toggle" wire:model.live="theme">
                </label>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Account settings:</h3>
        <ul class="menu bg-base-200 rounded-xl">
            <li>
                <div class="justify-between">
                    <span>Github account</span>
                    <button class="btn btn-xs btn-ghost hover:btn-outline normal-case"
                        wire:click="$dispatch('editProfile', {edittype: 'github'})">
                        https://github.com/iqbalfarhan
                    </button>
                </div>
            </li>
        </ul>
    </div>

    <div class="w-full max-w-lg mx-auto space-y-4">
        <h3 class="text-lg">Danger zone:</h3>
        <ul class="menu bg-base-200 rounded-xl">
            <li>
                <div class="justify-between">
                    <span>Ganti password</span>
                    <button class="btn btn-xs btn-outline"
                        wire:click="$dispatch('editProfile', {edittype: 'password'})">Update</button>
                </div>
            </li>
            <li></li>
            <li>
                <label class="justify-between" wire:click="$dispatch('reload')"
                    wire:confirm.prompt="Are you sure?\n\nType DELETE to confirm|DELETE">
                    <span>Hapus akun</span>
                    <button class="btn btn-error btn-xs btn-outline">Delete</button>
                </label>
            </li>
        </ul>
    </div>

    <div>
        <input type="checkbox" id="editProfileModal" class="modal-toggle" wire:model.live="show">
        <div class="modal">
            <form class="modal-box max-w-sm" wire:submit.prevent="simpan">
                <div class="flex justify-between">
                    <h3 class="font-bold text-lg">Edit Profile : info</h3>
                    <span wire:loading=""><span class="loading loading-xs"></span></span>
                </div>
                <div class="py-4 space-y-4">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama lengkap</span>
                        </label>
                        <input type="text" placeholder="Type here" class="input input-bordered " wire:model="name">
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Alamat email</span>
                        </label>
                        <input type="email" placeholder="Type here" class="input input-bordered " wire:model="email">
                    </div>
                </div>
                <div class="modal-action justify-between">
                    <label for="editProfileModal" class="btn btn-ghost">Close</label>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

</div>

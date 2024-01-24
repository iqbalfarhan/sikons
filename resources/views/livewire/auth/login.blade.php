<div class="card w-96">
    <figure>
        <img src="{{ url('logo.png') }}" class="w-1/2">
    </figure>
    <form class="card-body space-y-4" wire:submit="login">
        <h2 class="card-title">Login ke {{ config('app.name') }}</h2>
        <div class="space-y-2 py-2">
            <input type="text"
                class="input input-bordered w-full @error('username')
                input-error
            @enderror"
                placeholder="Username" wire:model="username">

            <input type="password"
                class="input input-bordered w-full @error('password')
                input-error
            @enderror"
                placeholder="Password" wire:model="password">
        </div>
        <div class="card-actions">
            <button class="btn btn-primary w-full">
                <span>Login</span>
                <x-tabler-login class="icon-5" />
            </button>
        </div>
        <div class="text-center opacity-50 text-sm">
            Aplikasi {{ config('app.name') }}
        </div>
    </form>
</div>

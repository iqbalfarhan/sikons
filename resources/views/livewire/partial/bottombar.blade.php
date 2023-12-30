<div class="btm-nav bg-base-200 flex lg:hidden">
    <a href="{{ route('home') }}" wire:navigate @class(['active text-primary' => Route::is('home')])>
        <x-tabler-dashboard class="icon-5" />
        <small class="btm-nav-label">Home</small>
    </a>
    <a href="{{ route('laporan.create') }}" wire:navigate @class(['active text-primary' => Route::is('laporan.create')])>
        <x-tabler-circle-plus class="icon-5" />
        <small class="btm-nav-label">Baru</small>
    </a>
    <a href="{{ route('laporan.mine') }}" wire:navigate @class(['active text-primary' => Route::is('laporan.mine')])>
        <x-tabler-list class="icon-5" />
        <small class="btm-nav-label">List</small>
    </a>
    <a href="{{ route('profile') }}" wire:navigate @class(['active text-primary' => Route::is('profile')])>
        <x-tabler-user class="icon-5" />
        <small class="btm-nav-label">Profile</small>
    </a>
</div>

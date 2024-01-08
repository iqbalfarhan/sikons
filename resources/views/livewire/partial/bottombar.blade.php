<div class="btm-nav bg-base-100 flex lg:hidden border-t">
    <a href="{{ route('home') }}" wire:navigate @class(['text-primary' => Route::is('home')])>
        <x-tabler-dashboard />
    </a>
    <a href="{{ route('laporan.create') }}" wire:navigate @class(['text-primary' => Route::is('laporan.create')])>
        <x-tabler-circle-plus />
    </a>
    <a href="{{ route('laporan.mine') }}" wire:navigate @class(['text-primary' => Route::is('laporan.mine')])>
        <x-tabler-list />
    </a>
    <a href="{{ route('profile') }}" wire:navigate @class(['text-primary' => Route::is('profile')])>
        <x-tabler-user />
    </a>
</div>

<div class="btm-nav bg-base-100 flex lg:hidden border-t border-base-300">
    @can('home')
        <a href="{{ route('home') }}" wire:navigate>
            <button class="btn btn-square {{ Route::is('home') ? 'btn-primary' : 'btn-ghost' }}">
                <x-tabler-dashboard />
            </button>
        </a>
    @endcan
    @can('laporan.mine')
        <a href="{{ route('laporan.mine') }}" wire:navigate>
            <button class="btn btn-square {{ Route::is('laporan.mine') ? 'btn-primary' : 'btn-ghost' }}">
                <x-tabler-list />
            </button>
        </a>
    @endcan
    @can('laporan.create')
        <a href="{{ route('laporan.create') }}" wire:navigate @class([
            'text-primary' => Route::is('laporan.create'),
        ])>
            <button class="btn btn-square {{ Route::is('laporan.create') ? 'btn-primary' : 'btn-ghost' }}">
                <x-tabler-circle-plus />
            </button>
        </a>
    @endcan
    @if (auth()->user()->hasRole('guest'))
        @can('laporan.search')
            <a href="{{ route('laporan.search') }}" wire:navigate @class([
                'text-primary' => Route::is('laporan.search'),
            ])>
                <button class="btn btn-square {{ Route::is('laporan.search') ? 'btn-primary' : 'btn-ghost' }}">
                    <x-tabler-search />
                </button>
            </a>
        @endcan
    @endif
    @can('laporan.listrik')
        <a href="{{ route('laporan.listrik') }}" wire:navigate @class([
            'text-primary' => Route::is('laporan.listrik'),
        ])>
            <button class="btn btn-square {{ Route::is('laporan.listrik') ? 'btn-primary' : 'btn-ghost' }}">
                <x-tabler-bolt />
            </button>
        </a>
    @endcan
    @can('profile')
        <a href="{{ route('profile') }}" wire:navigate @class(['text-primary' => Route::is('profile')])>
            <button class="btn btn-square {{ Route::is('profile') ? 'btn-primary' : 'btn-ghost' }}">
                <x-tabler-user />
            </button>
        </a>
    @endcan
</div>

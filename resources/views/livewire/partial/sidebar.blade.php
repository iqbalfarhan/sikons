<ul class="menu p-4 w-80 min-h-full text-base-content space-y-4 bg-base-100 border-r border-base-300">
    <li>
        @livewire('pages.user.badge', ['user' => auth()->user()])
    </li>
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            @can('home')
                <li>
                    <a href="{{ route('home') }}" @class([
                        'menu-active' => Route::is('home'),
                    ]) wire:navigate>
                        <x-tabler-dashboard class="icon-5" />
                        <span>Dashboard</span>
                    </a>
                </li>
            @endcan
            @can('kwhmeter')
                <li>
                    <a href="{{ route('kwhmeter') }}" @class([
                        'menu-active' => Route::is(['kwhmeter', 'token.show']),
                    ]) wire:navigate>
                        <x-tabler-bolt class="icon-5" />
                        <span>KWH meter</span>
                    </a>
                </li>
            @endcan
            @can('simaru')
                <li>
                    <a href="{{ route('simaru') }}" @class([
                        'menu-active' => Route::is('simaru'),
                    ]) wire:navigate>
                        <x-tabler-package class="icon-5" />
                        <span>Aplikasi SIMARU</span>
                    </a>
                </li>
            @endcan
            @can('lembur')
                <li>
                    <a href="{{ route('lembur') }}" @class([
                        'menu-active' => Route::is('lembur'),
                    ]) wire:navigate>
                        <x-tabler-clock class="icon-5" />
                        <span>Ruangan lembur</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
    @canany(['laporan.index', 'laporan.search', 'laporan.mine', 'laporan.create', 'laporan.listrik'])
        <li>
            <h2 class="menu-title">Laporan sikons</h2>
            <ul>
                @can('laporan.summary')
                    <li>
                        <a href="{{ route('laporan.summary') }}" @class([
                            'menu-active' => Route::is(['laporan.summary', 'laporan.show']),
                        ]) wire:navigate>
                            <x-tabler-api class="icon-5" />
                            <span>Summary laporan</span>
                        </a>
                    </li>
                @endcan
                @can('laporan.index')
                    <li>
                        <a href="{{ route('laporan.index') }}" @class([
                            'menu-active' => Route::is(['laporan.index', 'laporan.show']),
                        ]) wire:navigate>
                            <x-tabler-file-text class="icon-5" />
                            <span>Laporan hari ini</span>
                        </a>
                    </li>
                @endcan
                @can('laporan.search')
                    <li>
                        <a href="{{ route('laporan.search') }}" @class([
                            'menu-active' => Route::is('laporan.search'),
                        ]) wire:navigate>
                            <x-tabler-file-search class="icon-5" />
                            <span>Cari laporan</span>
                        </a>
                    </li>
                @endcan
                @can('laporan.mine')
                    <li>
                        <a href="{{ route('laporan.mine') }}" @class([
                            'menu-active' => Route::is('laporan.mine'),
                        ]) wire:navigate>
                            <x-tabler-file-digit class="icon-5" />
                            <span>Laporan saya</span>
                        </a>
                    </li>
                @endcan
                @can('laporan.create')
                    <li>
                        <a href="{{ route('laporan.create') }}" @class([
                            'menu-active' => Route::is('laporan.create'),
                        ]) wire:navigate>
                            <x-tabler-file-plus class="icon-5" />
                            <span>Buat laporan</span>
                        </a>
                    </li>
                @endcan
                @can('laporan.listrik')
                    <li>
                        <a href="{{ route('laporan.listrik') }}" @class([
                            'menu-active' => Route::is('laporan.listrik'),
                        ]) wire:navigate>
                            <x-tabler-bolt class="icon-5" />
                            <span>Penggunaan listrik</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcanany
    @canany(['user.index', 'lokasi.index', 'database.adminer', 'role.index'])
        <li>
            <h2 class="menu-title">Admin area</h2>
            <ul>
                @can('user.index')
                    <li>
                        <a href="{{ route('user.index') }}" @class([
                            'menu-active' => Route::is('user.index'),
                        ]) wire:navigate>
                            <x-tabler-users class="icon-5" />
                            <span>User management</span>
                        </a>
                    </li>
                @endcan
                @can('lokasi.index')
                    <li>
                        <a href="{{ route('lokasi.index') }}" @class([
                            'menu-active' => Route::is(['lokasi.index', 'lokasi.edit']),
                        ]) wire:navigate>
                            <x-tabler-building class="icon-5" />
                            <span>Lokasi management</span>
                        </a>
                    </li>
                @endcan
                @can('database.adminer')
                    <li>
                        <a href="/adminer" target="_blank">
                            <x-tabler-database class="icon-5" />
                            <span>Adminer database</span>
                        </a>
                    </li>
                @endcan
                @can('role.index')
                    <li>
                        <a href="{{ route('role.index') }}" @class([
                            'menu-active' => Route::is('role.index'),
                        ]) wire:navigate>
                            <x-tabler-square-asterisk class="icon-5" />
                            <span>Role & permissions</span>
                        </a>
                    </li>
                @endcan
            </ul>
        </li>
    @endcanany
    <li>
        <h2 class="menu-title">Account setting</h2>
        <ul>
            @can('profile')
                <li>
                    <a href="{{ route('profile') }}" @class([
                        'menu-active' => Route::is('profile'),
                    ]) wire:navigate>
                        <x-tabler-user class="icon-5" />
                        <span>Edit profile</span>
                    </a>
                </li>
            @endcan
            <li>
                <button wire:click="logout">
                    <x-tabler-logout class="icon-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>

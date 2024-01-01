<ul class="menu p-4 w-80 min-h-full text-base-content space-y-4 bg-base-100 border-r">
    <li>
        <div class="flex gap-3">
            <div class="avatar placeholder">
                <div class="bg-base-200 text-base-content  mask w-10 mask-squircle">
                    <x-tabler-user class="icon-5" />
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-base font-bold capitalize">{{ auth()->user()->name }}</div>
                <div class="text-xs opacity-75">{{ auth()->user()->datel->name }}</div>
            </div>
        </div>
    </li>
    <li>
        <h2 class="menu-title">Dashboard</h2>
        <ul>
            <li>
                <a href="{{ route('home') }}" @class(['active' => Route::is('home')]) wire:navigate>
                    <x-tabler-dashboard class="icon-5" />
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('kwhmeter') }}" @class(['active' => Route::is('kwhmeter')]) wire:navigate>
                    <x-tabler-bolt class="icon-5" />
                    <span>KWH Meter</span>
                </a>
            </li>
            <li>
                <a href="{{ route('simaru') }}" @class(['active' => Route::is('simaru')]) wire:navigate>
                    <x-tabler-package class="icon-5" />
                    <span>Aplikasi SIMARU</span>
                </a>
            </li>
            <li>
                <a href="{{ route('lembur') }}" @class(['active' => Route::is('lembur')]) wire:navigate>
                    <x-tabler-clock class="icon-5" />
                    <span>Ruangan lembur</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Laporan sikons</h2>
        <ul>
            <li>
                <a href="{{ route('laporan.index') }}" @class(['active' => Route::is('laporan.index')]) wire:navigate>
                    <x-tabler-file-text class="icon-5" />
                    <span>Laporan hari ini</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.search') }}" @class(['active' => Route::is('laporan.search')]) wire:navigate>
                    <x-tabler-file-search class="icon-5" />
                    <span>Cari laporan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.mine') }}" @class(['active' => Route::is('laporan.mine')]) wire:navigate>
                    <x-tabler-file-digit class="icon-5" />
                    <span>Laporan saya</span>
                </a>
            </li>
            <li>
                <a href="{{ route('laporan.create') }}" @class(['active' => Route::is('laporan.create')]) wire:navigate>
                    <x-tabler-file-plus class="icon-5" />
                    <span>Buat laporan</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Admin area</h2>
        <ul>
            <li>
                <a href="{{ route('user.index') }}" @class(['active' => Route::is('user.index')]) wire:navigate>
                    <x-tabler-users class="icon-5" />
                    <span>User management</span>
                </a>
            </li>
            <li>
                <a href="{{ route('lokasi.index') }}" @class(['active' => Route::is('lokasi.index')]) wire:navigate>
                    <x-tabler-building class="icon-5" />
                    <span>Lokasi management</span>
                </a>
            </li>
            <li>
                <a href="/adminer" target="_blank">
                    <x-tabler-database class="icon-5" />
                    <span>Adminer database</span>
                </a>
            </li>
            <li>
                <a href="{{ route('role.index') }}" @class(['active' => Route::is('role.index')]) wire:navigate>
                    <x-tabler-square-asterisk class="icon-5" />
                    <span>Role & permissions</span>
                </a>
            </li>
        </ul>
    </li>
    <li>
        <h2 class="menu-title">Account setting</h2>
        <ul>
            <li>
                <a href="{{ route('profile') }}" @class(['active' => Route::is('profile')]) wire:navigate>
                    <x-tabler-user class="icon-5" />
                    <span>Edit profile</span>
                </a>
            </li>
            <li>
                <button wire:click="logout">
                    <x-tabler-logout class="icon-5" />
                    <span>Logout</span>
                </button>
            </li>
        </ul>
    </li>
</ul>

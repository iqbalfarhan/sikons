<div class="navbar bg-base-100 border-b border-base-300">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-ghost btn-circle">
            <x-tabler-menu-2 class="icon-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a href="{{ route('home') }}" class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        {{-- <button class="btn btn-circle btn-ghost">
            <div class="indicator">
                <span class="indicator-item badge badge-xs badge-error animate-pulse"></span>
                <x-tabler-bell-ringing class="icon-5" />
            </div>
        </button> --}}
        <div class="dropdown dropdown-bottom dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <x-tabler-settings class="icon-5" />
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-4 shadow bg-base-200 rounded-box w-72">
                <li class="menu-title text-sm">Pengaturan tema</li>
                <li>
                    <button @class(['menu-active' => $theme == 'dark']) wire:click="setTheme('dark')">
                        <x-tabler-moon class="icon-5" />
                        <span>Dark</span>
                    </button>
                </li>
                <li>
                    <button @class(['menu-active' => $theme == 'light']) wire:click="setTheme('light')">
                        <x-tabler-sun class="icon-5" />
                        <span>Light</span>
                    </button>
                </li>
                <li>
                    <button @class(['menu-active' => $theme == null]) wire:click="setTheme('system')">
                        <x-tabler-device-desktop class="icon-5" />
                        <span>System</span>
                    </button>
                </li>
                <li></li>
                <li class="menu-title text-sm">Pengaturan sidebar</li>
                <li>
                    <button @class(['menu-active' => $sidebar == 'expand']) wire:click="setSidebar('expand')">
                        <x-tabler-layout-sidebar-left-expand class="icon-5" />
                        <span>Buka sidebar</span>
                    </button>
                </li>
                <li>
                    <button @class(['menu-active' => $sidebar == 'collapse']) wire:click="setSidebar('collapse')">
                        <x-tabler-layout-sidebar-left-collapse class="icon-5" />
                        <span>Tutup Sidebar</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

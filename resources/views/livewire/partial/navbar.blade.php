<div class="navbar bg-base-100 border-b border-base-300">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-ghost btn-circle">
            <x-tabler-menu class="icon-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        <button class="btn btn-circle btn-ghost">
            <div class="indicator">
                <span class="indicator-item badge badge-xs badge-error animate-pulse"></span>
                <x-tabler-bell-ringing class="icon-5" />
            </div>
        </button>
        <div class="dropdown dropdown-bottom dropdown-end hidden lg:flex">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <x-tabler-moon class="icon-5" />
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
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
                    <button @class(['menu-active' => $theme == 'system']) wire:click="setTheme('system')">
                        <x-tabler-device-desktop class="icon-5" />
                        <span>System</span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</div>

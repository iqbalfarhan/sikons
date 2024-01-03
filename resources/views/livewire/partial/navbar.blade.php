<div class="navbar bg-base-100 border-b">
    <div class="navbar-start">
        <label for="drawer" class="btn btn-ghost btn-circle">
            <x-tabler-menu class="icon-5" />
        </label>
    </div>
    <div class="navbar-center">
        <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
    </div>
    <div class="navbar-end">
        <div class="dropdown dropdown-bottom dropdown-end">
            <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                <x-tabler-moon class="icon-5" />
            </div>
            <ul tabindex="0" class="dropdown-content z-[1] menu p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a>
                        <x-tabler-moon class="icon-5" />
                        <span>Dark</span>
                    </a>
                </li>
                <li>
                    <a>
                        <x-tabler-sun class="icon-5" />
                        <span>Light</span>
                    </a>
                </li>
                <li>
                    <a>
                        <x-tabler-device-desktop class="icon-5" />
                        <span>System</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>

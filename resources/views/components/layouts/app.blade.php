<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-theme="{{ session('theme') }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        {{-- <meta name="viewport" content="viewport-fit=cover"> --}}

        <title>{{ $title ?? config('app.name') }}</title>
        @vite('resources/css/app.css')
    </head>

    <body class="min-h-screen">
        @auth
            <div class="drawer lg:drawer-open">
                <input id="drawer" type="checkbox" class="drawer-toggle" />
                <div class="drawer-content">
                    @livewire('partial.navbar')
                    <div class="container">
                        {{ $slot }}
                    </div>
                    @livewire('partial.footer')
                    @livewire('partial.preview')
                    @livewire('partial.bottombar')
                </div>
                <div class="drawer-side">
                    <label for="drawer" aria-label="close sidebar" class="drawer-overlay"></label>
                    @livewire('partial.sidebar')
                </div>
            </div>
        @endauth
        @guest
            <div class="grid place-content-center w-full min-h-screen">
                <div class="navbar bg-base-100 absolute">
                    <div class="flex-1">
                        <a class="btn btn-ghost text-xl">{{ config('app.name') }}</a>
                    </div>
                    <div class="flex-none">
                        <ul class="menu menu-horizontal px-1">
                            <li @class(['hidden' => Route::is('login')])><a href="{{ route('login') }}">Login</a></li>
                            <li @class(['hidden' => Route::is('register')])><a href="{{ route('register') }}">Register</a></li>
                        </ul>
                    </div>
                </div>
                {{ $slot }}
            </div>
        @endguest

        {{-- @livewireScripts --}}
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <x-livewire-alert::scripts />

    </body>

</html>

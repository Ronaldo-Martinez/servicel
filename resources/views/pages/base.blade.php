<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
    <nav class="navbar navbar-dark bg-nav p-0 fixed-top">
        <div class="container">
            <a class="navbar-brand p-0" href="/">
                <img src="/logo2.webp" alt="Logo servicel" class="logo">
            </a>
            <div class="d-none d-lg-block ">
                <div class="nav d-flex">
                    <a class="nav-link {{ request()->routeIs('inicio') ? 'active' : '' }}" aria-current="page" href="#">INICIO</a>
                    <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : '' }}" href="#">NOSOTROS</a>
                    <a class="nav-link {{ request()->routeIs('alquiler') ? 'active' : '' }}" href="#">ALQUILER</a>
                    <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : '' }}" href="#">CONTACTO</a>
                </div>
            </div>

            <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-end text-dark bg-nav-movil" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                <div class="offcanvas-header">
                    <div class="text-warning text-center" id="offcanvasDarkNavbarLabel"></div>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body justify-content-center align-items-center d-flex">
                    <ul class=" flex-grow-1 pe-3">
                    <a class="nav-link {{ request()->routeIs('inicio') ? 'active' : 'text-white' }}" aria-current="page" href="#">INICIO</a>
                    <a class="nav-link {{ request()->routeIs('nosotros') ? 'active' : 'text-white' }}" href="#">NOSOTROS</a>
                    <a class="nav-link {{ request()->routeIs('alquiler') ? 'active' : 'text-white' }}" href="#">ALQUILER</a>
                    <a class="nav-link {{ request()->routeIs('contacto') ? 'active' : 'text-white' }}" href="#">CONTACTO</a>
                    </ul>
                    
                </div>
            </div>
        </div>
    </nav>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>

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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="bg-nav navbar  p-0 fixed-top">
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

        <footer class="bg-secondary">
            <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-lg-4 justify-content-center align-items-center d-flex">
                    <div class=" my-4">
                        <ul class="pe-3">
                        <h2 class="nav-link justify-content-center text-white fs-5 py-3 text-center">Enlaces</h2>
                        <a class="nav-link justify-content-center {{ request()->routeIs('inicio') ? 'active-footer' : 'text-white' }}" aria-current="page" href="#">INICIO</a>
                        <a class="nav-link justify-content-center {{ request()->routeIs('nosotros') ? 'active-footer' : 'text-white' }}" href="#">NOSOTROS</a>
                        <a class="nav-link justify-content-center {{ request()->routeIs('alquiler') ? 'active-footer' : 'text-white' }}" href="#">ALQUILER</a>
                        <a class="nav-link justify-content-center {{ request()->routeIs('contacto') ? 'active-footer' : 'text-white' }}" href="#">CONTACTO</a>
                        </ul>         
                    </div>
                </div>
                <!--Información de contacto-->
                <div class="col-12 col-lg-4 my-4 border-start border-end border-warning  text-white text-center">
                    <div class="border-top border-warning d-block d-sm-none">
                    </div>
                    <h2 class="nav-link justify-content-center  text-white fs-5 py-3">Contáctanos</h2>
                    <a class="d-flex align-items-center justify-content-center nav-link text-white" href="tel:+50322882451"> 
                        <span class="material-symbols-outlined text-warning">
                            call
                        </span>+ 503 2288 - 2451
                    </a>
                    <a class="d-flex align-items-center justify-content-center nav-link text-white" href="tel:+50254674528"> 
                        <span class="material-symbols-outlined text-warning">
                            call
                        </span>+ 502 5467 - 4528
                    </a>
                    <h2 class="text-white fs-5 py-3 fw-bold">Horarios de oficinas administrativas</h2>
                    <div class="text-white text-center fs-5">
                        <p class="m-0">Lunes a Viernes</p>
                        <p>7:30 A.M. a 4:30 P.M.</p>
                        <p class="m-0">Sábados</p>
                        <p>7:30 A.M. a 12:00 M</p>
                        <p class="fs-5 fw-bold">Brindamos soporte técnico las 24 horas</p>
                    </div>
                    <div class="border-bottom border-warning d-block d-sm-none">
                    </div>
                </div>
                <!--Redes Sociales-->
                <div class="col-12 col-lg-4 align-items-center justify-content-center d-flex">
                    <div class="my-4">
                        <h2 class="nav-link  text-white fs-5 py-3 text-center">Síguenos en nuestras redes sociales</h2>
                        <div class="d-flex justify-content-center">
                            <a href="">
                                <img class="icon" src="/img/fb.webp" alt="Facebook icon">
                            </a>
                            <a href="">
                                <img class="icon" src="/img/instagram.webp" alt="instagram icon">
                            </a>
                            <a href="">
                                <img class="icon" src="/img/whatsapp.webp" alt="whatsapp Icon">
                            </a>
                        </div>
                        <div class="align-items-center justify-content-center d-flex pt-2">
                            <img class="img-logo d-flex justify-content-end" src="/logo2.webp" alt="Logo servicel">
                        </div>
                    </div>
                </div>
                <div class="col-12 text-center text-white">
                    <p class="fs-4 m-2">© {{ date('Y') }} Todos los derechos reservados | SERVICEL S.A de C.V. </p>
                </div>
            </div>
            </div>
        </footer>
    </div>
</body>
</html>

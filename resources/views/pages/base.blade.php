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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}?v={{ file_exists(public_path('css/app.css')) ? filemtime(public_path('css/app.css')) : time() }}">

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div id="app">
        <nav class="bg-nav navbar  p-0 fixed-top">
            <div class="container">
                <a class="navbar-brand p-0" href="/">
                    <img src="/logo1.webp" alt="Logo servicel" class="logo">
                </a>
                <div class="d-none d-lg-block ">
                    <div class="nav d-flex">
                        <a class="nav-link {{ request()->routeIs('inicio') ? 'active-nav' : '' }}" aria-current="page" href="{{ route('inicio') }}">INICIO</a>
                        <a class="nav-link {{ request()->routeIs('nosotros') ? 'active-nav' : '' }}" href="{{ route('nosotros') }}">NOSOTROS</a>
                        <a class="nav-link {{ request()->routeIs('servicios') ? 'active-nav' : '' }}" href="{{ route('servicios') }}">SERVICIOS</a>
                        <div class="nav-link d-flex align-items-center dropdown {{ request()->routeIs('alquiler-sv') ? 'active-nav' : (request()->routeIs('alquiler-gt') ? 'active-nav' : '')  }} ">
                            <div class="dropdown-toggle d-flex align-items-center h-100"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              ALQUILER
                            </div>
                            <ul class="dropdown-menu">
                              <li><a class="dropdown-item" href="{{ route('alquiler-sv') }}">EL SALVADOR</a></li>
                              <li><a class="dropdown-item" href="{{ route('alquiler-gt') }}">GUATEMALA</a></li>
                            </ul>
                        </div>
                        <a class="nav-link {{ request()->routeIs('contacto') ? 'active-nav' : '' }}" href="{{ route('contacto') }}">CONTACTO</a>
                        @include('pages.redes')
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
                            <a class="nav-link {{ request()->routeIs('inicio') ? 'active-nav' : 'text-white' }}" aria-current="page" href="{{ route('inicio') }}">INICIO</a>
                            <a class="nav-link {{ request()->routeIs('nosotros') ? 'active-nav' : 'text-white' }}" href="{{ route('nosotros') }}">NOSOTROS</a>
                            <a class="nav-link {{ request()->routeIs('servicios') ? 'active-nav' : 'text-white' }}" href="{{ route('servicios') }}">SERVICIOS</a>
                            <div class="nav-link d-flex align-items-center dropdown {{ request()->routeIs('nosotros') ? 'active-nav' : 'text-white' }}">
                                <div class="dropdown-toggle d-flex align-items-center h-100"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ALQUILER
                                </div>
                                <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ route('alquiler-sv') }}">EL SALVADOR</a></li>
                                <li><a class="dropdown-item" href="{{ route('alquiler-gt') }}">GUATEMALA</a></li>
                                </ul>
                            </div>
                            <a class="nav-link {{ request()->routeIs('alquiler') ? 'active-nav' : 'text-white' }}" href="#">ALQUILER</a>
                            <a class="nav-link {{ request()->routeIs('contacto') ? 'active-nav' : 'text-white' }}" href="{{ route('contacto') }}">CONTACTO</a>
                            <div class="text-white pt-5">
                                <p class="text-center fs-6 text-uppercase fw-bold">Ubicación de nuestra oficina central</p>
                                <p class="text-center m-0">Residencial utila, senda Isis casa G-2 Santa Tecla</p>
                                <p class="text-center">La Libertad, El Salvador</p>
                            </div>
                            <div class="d-flex justify-content-center pt-4">
                                @include('pages.redes')
                            </div>
                        </ul>            
                    </div>
                </div>
            </div>
        </nav>

        <main>
            @yield('content')
            <div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Seleccione su País.</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <p class="fs-6 m-0 fw-bold">El Salvador</p>
                                    <div class="d-flex justify-content-center">
                                        <a class="d-none d-sm-block d-sm-none d-md-block d-flex align-items-center btn px-1" href="https://web.whatsapp.com/send?phone=50378730450&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+" target="_blank">
                                            <img class="icon" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">
                                        </a>
                                        <a class="d-lg-none d-xl-block d-xl-none d-xxl-block d-flex align-items-center btn px-1" href="https://api.whatsapp.com/send?phone=50378730450&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+" target="_blank">
                                            <img class="icon" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">
                                        </a>
                                    </div>
                                </div>
                                <div class="col-6 text-center">
                                    <p class="fs-6 m-0 fw-bold">Guatemala</p>
                                    <div class="d-flex justify-content-center">
                                        <a class="d-none d-sm-block d-sm-none d-md-block d-flex align-items-center btn px-1" href="https://web.whatsapp.com/send?phone=50254674528&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+" target="_blank">
                                            <img class="icon" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">
                                        </a>
                                        <a class="d-lg-none d-xl-block d-xl-none d-xxl-block d-flex align-items-center btn px-1" href="https://api.whatsapp.com/send?phone=50254674528&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+" target="_blank">
                                            <img class="icon" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="site-footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row g-4 text-start">
                        <!-- Column 1: Brand & Social -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <div class="mb-4">
                                <img class="footer-logo mb-3" src="/logo2.webp" alt="Logo servicel">
                                <p class="small text-white mt-3" style="line-height: 1.6; text-align: justify;">
                                    Líderes en alquiler de maquinaria pesada y servicios de terracería con más de 30 años de experiencia construyendo el futuro de la región.
                                </p>
                            </div>
                            <div class="mt-4">
                                <div class="d-flex gap-2">
                                    @include('pages.redes')
                                </div>
                            </div>
                        </div>

                        <!-- Column 2: Navigation Links -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <h3 class="footer-title">Enlaces</h3>
                            <ul class="footer-links">
                                <li>
                                    <a class="{{ request()->routeIs('inicio') ? 'active-footer' : '' }}" href="{{ route('inicio') }}">Inicio</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('nosotros') ? 'active-footer' : '' }}" href="{{ route('nosotros') }}">Nosotros</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('servicios') ? 'active-footer' : '' }}" href="{{ route('servicios') }}">Servicios</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('alquiler-sv') ? 'active-footer' : '' }}" href="{{ route('alquiler-sv') }}">Alquiler El Salvador</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('alquiler-gt') ? 'active-footer' : '' }}" href="{{ route('alquiler-gt') }}">Alquiler Guatemala</a>
                                </li>
                                <li>
                                    <a class="{{ request()->routeIs('contacto') ? 'active-footer' : '' }}" href="{{ route('contacto') }}">Contacto</a>
                                </li>
                            </ul>
                        </div>

                        <!-- Column 3: Contact Info -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <h3 class="footer-title">Contáctanos</h3>
                            
                            <div class="mb-4">
                                <span class="d-block text-white-50 small fw-bold mb-2" style="letter-spacing: 1px;">EL SALVADOR</span>
                                <a class="contact-item" href="tel:+50322882451">
                                    <span class="material-symbols-outlined contact-icon">call</span>
                                    + 503 2288 - 2451
                                </a>
                                <a class="contact-item" href="tel:+50376285412">
                                    <span class="material-symbols-outlined contact-icon">call</span>
                                    + 503 7628 - 5412
                                </a>
                            </div>

                            <div>
                                <span class="d-block text-white-50 small fw-bold mb-2" style="letter-spacing: 1px;">GUATEMALA</span>
                                <a class="contact-item" href="tel:+50254674528">
                                    <span class="material-symbols-outlined contact-icon">call</span>
                                    + 502 5467 - 4528
                                </a>
                                <a class="contact-item" href="tel:+50247003189">
                                    <span class="material-symbols-outlined contact-icon">call</span>
                                    + 502 4700 - 3189
                                </a>
                            </div>
                        </div>

                        <!-- Column 4: Schedules -->
                        <div class="col-12 col-md-6 col-lg-3">
                            <h3 class="footer-title">Horarios</h3>
                            <div class="schedule-card mb-3">
                                <div class="mb-3">
                                    <span class="d-block text-white fw-bold small">Lunes a Viernes</span>
                                    <span class="small text-white-50">7:30 A.M. a 4:30 P.M.</span>
                                </div>
                                <div class="mb-0">
                                    <span class="d-block text-white fw-bold small">Sábados</span>
                                    <span class="small text-white-50">7:30 A.M. a 12:00 M.</span>
                                </div>
                            </div>
                            
                            <div class="support-badge w-100 justify-content-center">
                                <span class="material-symbols-outlined me-2 fs-5">support_agent</span>
                                Soporte telefónico 24/7
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="footer-bottom">
                <div class="container text-center">
                    <p class="mb-0 small text-white-50">
                        &copy; {{ date('Y') }} Todos los derechos reservados | <strong>SERVICEL S.A. de C.V.</strong>
                    </p>
                </div>
            </div>
        </footer>
    </div>
</body>
</html>

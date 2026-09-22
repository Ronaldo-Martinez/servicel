<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Servicel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet"
        href="{{ asset('css/app.css') }}?v={{ file_exists(public_path('css/app.css')) ? filemtime(public_path('css/app.css')) : time() }}">

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/custom.js') }}" defer></script>
</head>

<body class="{{ request()->routeIs('login', 'password.force-change') ? 'bg-login-clean' : '' }}">
    <div id="app" class="min-vh-100 d-flex flex-column">
        @if(!request()->routeIs('login', 'password.force-change'))
            <nav class="navbar-premium-admin navbar navbar-expand-md navbar-dark shadow-sm">
                <div class="container">
                    <a class="navbar-brand d-flex align-items-center gap-2" href="{{ url('/') }}">
                        <img src="{{ asset('logo1.webp') }}" alt="Logo Servicel" height="36" class="d-inline-block">
                        <span class="fw-bold">{{ config('app.name', 'Servicel') }}</span>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto align-items-center">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('login') }}">Iniciar Sesión</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <a class="nav-link-dash {{ request()->routeIs('home') ? 'active-dash' : '' }}"
                                    href="{{ URL::to('home') }}">Inicio</a>
                                <a class="nav-link-dash {{ request()->routeIs('pais.index') ? 'active-dash' : '' }}"
                                    href="{{ URL::to('pais') }}">Paises</a>
                                <a class="nav-link-dash {{ request()->routeIs('tipo-maquinas.index') ? 'active-dash' : '' }}"
                                    href="{{ URL::to('tipo-maquinas') }}">Tipo de Maquinas</a>
                                <a class="nav-link-dash {{ request()->routeIs('maquinas.index') ? 'active-dash' : '' }}"
                                    href="{{ URL::to('maquinas') }}">Maquinas</a>
                                @if(Auth::user()->isAdmin())
                                    <a class="nav-link-dash {{ request()->routeIs('usuarios.*') ? 'active-dash' : '' }}"
                                        href="{{ route('usuarios.index') }}">Usuarios</a>
                                @endif
                                <li class="nav-item dropdown ms-2">
                                    <a id="navbarDropdown" class="nav-link-dash dropdown-toggle" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="navbarDropdown">
                                        <div class="px-3 py-2 border-bottom">
                                            <div class="fw-bold text-dark small">{{ Auth::user()->name }}</div>
                                            <div class="text-muted text-truncate" style="font-size: 0.75rem;">{{ Auth::user()->email }}</div>
                                            <span class="badge {{ Auth::user()->isAdmin() ? 'bg-primary' : 'bg-secondary' }} mt-1" style="font-size: 0.65rem;">
                                                {{ ucfirst(Auth::user()->role) }}
                                            </span>
                                        </div>
                                        <a class="dropdown-item py-2 text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            Cerrar sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        @endif

        <main class="{{ request()->routeIs('login', 'password.force-change') ? 'p-0' : 'py-4 flex-grow-1' }}">
            @yield('content')
        </main>
    </div>
</body>

</html>
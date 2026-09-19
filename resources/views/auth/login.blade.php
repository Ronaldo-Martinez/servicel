@extends('layouts.app')

@section('content')
<div class="auth-page-wrapper">
    <!-- Botón para regresar al sitio principal -->
    <a href="{{ url('/') }}" class="auth-btn-back">
        <x-icon name="arrow_back" />
        <span>Volver a Servicel</span>
    </a>

    <!-- Tarjeta Central de Autenticación -->
    <div class="auth-card-container">
        <div class="auth-card">
            <!-- Header de la tarjeta con logo de Servicel -->
            <div class="auth-card-header text-center">
                <a href="{{ url('/') }}" title="Servicel Inicio">
                    <img src="{{ asset('logo1.webp') }}" alt="Logo Servicel" class="auth-brand-logo">
                </a>
                <div class="auth-badge-wrapper mt-3">
                    <span class="auth-badge">Panel Administrativo</span>
                </div>
                <h1 class="auth-title">Iniciar Sesión</h1>
                <p class="auth-subtitle">Ingresa tus credenciales para acceder al sistema</p>
            </div>

            <!-- Formulario de Login -->
            <form method="POST" action="{{ route('login') }}" class="auth-form">
                @csrf

                <!-- Campo Correo Electrónico -->
                <div class="auth-field-group mb-3">
                    <label for="email" class="auth-label">Correo Electrónico</label>
                    <div class="auth-input-wrapper @error('email') has-error @enderror">
                        <span class="auth-input-icon">
                            <x-icon name="mail" />
                        </span>
                        <input id="email" 
                               type="email" 
                               class="auth-input @error('email') is-invalid @enderror" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autocomplete="email" 
                               autofocus 
                               placeholder="ejemplo@servicel.com">
                    </div>
                    @error('email')
                        <span class="auth-error-msg" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Campo Contraseña -->
                <div class="auth-field-group mb-3">
                    <label for="password" class="auth-label">Contraseña</label>
                    <div class="auth-input-wrapper @error('password') has-error @enderror">
                        <span class="auth-input-icon">
                            <x-icon name="lock" />
                        </span>
                        <input id="password" 
                               type="password" 
                               class="auth-input @error('password') is-invalid @enderror" 
                               name="password" 
                               required 
                               autocomplete="current-password" 
                               placeholder="••••••••">
                        <button type="button" 
                                class="auth-pwd-toggle" 
                                id="btnTogglePassword" 
                                title="Mostrar / ocultar contraseña" 
                                aria-label="Mostrar u ocultar contraseña">
                            <span id="eyeOpen"><x-icon name="visibility" /></span>
                            <span id="eyeClosed" class="d-none"><x-icon name="visibility_off" /></span>
                        </button>
                    </div>
                    @error('password')
                        <span class="auth-error-msg" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Opciones: Recordar sesión y badge de seguridad -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div class="form-check auth-checkbox">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">
                            Recordar sesión
                        </label>
                    </div>
                    <span class="auth-secure-tag">
                        <x-icon name="verified_user" class="text-warning" />
                        <span>Acceso Seguro</span>
                    </span>
                </div>

                <!-- Botón de Ingreso -->
                <button type="submit" class="auth-btn-submit">
                    <span>Ingresar al Sistema</span>
                    <x-icon name="arrow_forward" />
                </button>
            </form>

            <!-- Pie de la tarjeta -->
            <div class="auth-card-footer text-center">
                <p class="auth-copyright">© {{ date('Y') }} Servicel S.A. de C.V. • Todos los derechos reservados</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const toggleBtn = document.getElementById('btnTogglePassword');
    const pwdInput = document.getElementById('password');
    const eyeOpen = document.getElementById('eyeOpen');
    const eyeClosed = document.getElementById('eyeClosed');

    if (toggleBtn && pwdInput) {
        toggleBtn.addEventListener('click', function(e) {
            e.preventDefault();
            if (pwdInput.type === 'password') {
                pwdInput.type = 'text';
                eyeOpen.classList.add('d-none');
                eyeClosed.classList.remove('d-none');
            } else {
                pwdInput.type = 'password';
                eyeOpen.classList.remove('d-none');
                eyeClosed.classList.add('d-none');
            }
        });
    }
});
</script>
@endsection


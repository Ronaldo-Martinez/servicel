@extends('layouts.app')

@section('template_title')
    Actualizar Contraseña
@endsection

@section('content')
<div class="auth-page-wrapper">
    <!-- Botón para cerrar sesión si el usuario no desea continuar ahora -->
    <a href="{{ route('logout') }}" class="auth-btn-back" onclick="event.preventDefault(); document.getElementById('logout-form-force').submit();">
        <x-icon name="logout" />
        <span>Cerrar sesión</span>
    </a>
    <form id="logout-form-force" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- Tarjeta Central -->
    <div class="auth-card-container">
        <div class="auth-card">
            <!-- Header de la tarjeta con logo de Servicel -->
            <div class="auth-card-header text-center">
                <img src="{{ asset('logo1.webp') }}" alt="Logo Servicel" class="auth-brand-logo">
                <div class="auth-badge-wrapper mt-3">
                    <span class="auth-badge" style="background-color: #fef3c7; color: #b45309; border-color: #fde68a;">
                        <x-icon name="lock_reset" style="font-size: 0.9rem;" class="align-middle me-1" />
                        Primer Inicio de Sesión
                    </span>
                </div>
                <h1 class="auth-title">Crea tu Contraseña</h1>
                <p class="auth-subtitle">
                    Hola <strong>{{ $user->name }}</strong>, por seguridad debes cambiar tu contraseña provisional por una clave personal definitiva para continuar.
                </p>
            </div>

            <!-- Formulario de Actualización Forzada -->
            <form method="POST" action="{{ route('password.force-change.update') }}" class="auth-form">
                @csrf

                <!-- Campo Nueva Contraseña -->
                <div class="auth-field-group mb-3">
                    <label for="password" class="auth-label">Nueva Contraseña Personal</label>
                    <div class="auth-input-wrapper @error('password') has-error @enderror">
                        <span class="auth-input-icon">
                            <x-icon name="lock" />
                        </span>
                        <input id="password" 
                               type="password" 
                               class="auth-input @error('password') is-invalid @enderror" 
                               name="password" 
                               required 
                               autocomplete="new-password" 
                               placeholder="Mínimo 8 caracteres">
                        <button type="button" 
                                class="auth-pwd-toggle" 
                                id="btnTogglePassword1" 
                                title="Mostrar / ocultar contraseña" 
                                aria-label="Mostrar u ocultar contraseña">
                            <span id="eyeOpen1"><x-icon name="visibility" /></span>
                            <span id="eyeClosed1" class="d-none"><x-icon name="visibility_off" /></span>
                        </button>
                    </div>
                    @error('password')
                        <span class="auth-error-msg" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <!-- Campo Confirmar Contraseña -->
                <div class="auth-field-group mb-4">
                    <label for="password_confirmation" class="auth-label">Confirmar Nueva Contraseña</label>
                    <div class="auth-input-wrapper">
                        <span class="auth-input-icon">
                            <x-icon name="check_circle" />
                        </span>
                        <input id="password_confirmation" 
                               type="password" 
                               class="auth-input" 
                               name="password_confirmation" 
                               required 
                               autocomplete="new-password" 
                               placeholder="Repite tu contraseña">
                        <button type="button" 
                                class="auth-pwd-toggle" 
                                id="btnTogglePassword2" 
                                title="Mostrar / ocultar contraseña" 
                                aria-label="Mostrar u ocultar contraseña">
                            <span id="eyeOpen2"><x-icon name="visibility" /></span>
                            <span id="eyeClosed2" class="d-none"><x-icon name="visibility_off" /></span>
                        </button>
                    </div>
                </div>

                <!-- Requisitos sugeridos -->
                <div class="p-3 mb-4 rounded-3 border bg-light text-muted small">
                    <div class="fw-bold text-dark mb-1 d-flex align-items-center gap-1">
                        <x-icon name="security" style="font-size: 1rem; color: #253266;" />
                        Recomendaciones para una clave segura:
                    </div>
                    <ul class="mb-0 ps-3">
                        <li>Longitud mínima de 8 caracteres.</li>
                        <li>Combina letras mayúsculas, minúsculas y números.</li>
                        <li>No utilices información predecible como nombres o fechas.</li>
                    </ul>
                </div>

                <!-- Botón de Envío -->
                <button type="submit" class="auth-btn-submit">
                    <span>Guardar Contraseña y Continuar</span>
                    <x-icon name="arrow_forward" />
                </button>
            </form>

            <!-- Pie de la tarjeta -->
            <div class="auth-card-footer text-center">
                <p class="auth-copyright">© {{ date('Y') }} Servicel S.A. de C.V. • Acceso Restringido</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    function setupToggle(btnId, inputId, openId, closedId) {
        const btn = document.getElementById(btnId);
        const input = document.getElementById(inputId);
        const open = document.getElementById(openId);
        const closed = document.getElementById(closedId);

        if (btn && input) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                if (input.type === 'password') {
                    input.type = 'text';
                    open.classList.add('d-none');
                    closed.classList.remove('d-none');
                } else {
                    input.type = 'password';
                    open.classList.remove('d-none');
                    closed.classList.add('d-none');
                }
            });
        }
    }

    setupToggle('btnTogglePassword1', 'password', 'eyeOpen1', 'eyeClosed1');
    setupToggle('btnTogglePassword2', 'password_confirmation', 'eyeOpen2', 'eyeClosed2');
});
</script>
@endsection

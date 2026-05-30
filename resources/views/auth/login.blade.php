@extends('layouts.app')

@section('content')
<div class="premium-login-container position-relative">
    <!-- Botón para regresar al Home -->
    <a href="/" class="btn-back-home">
        <span class="material-symbols-outlined">arrow_back</span>
        Volver al Inicio
    </a>
    
    <div class="premium-login-card">
        <div class="row g-0 align-items-stretch">
            <!-- Left video pane (visible only on large screens) -->
            <div class="col-lg-7 d-none d-lg-block">
                <div class="video-pane h-100">
                    <video src="/video/headerContacto.mp4" muted autoplay loop loading="lazy"></video>
                    <div class="video-overlay"></div>
                    <div class="video-content">
                        <img src="/logo2.webp" alt="Logo Servicel" class="mb-4">
                    </div>
                </div>
            </div>
            
            <!-- Right form pane -->
            <div class="col-12 col-lg-5">
                <div class="form-pane d-flex flex-column justify-content-center h-100">
                    <div class="form-header">
                        <h2 class="form-title">Iniciar Sesión</h2>
                        <p class="form-subtitle">Bienvenido al panel administrativo de Servicel.</p>
                        <div class="form-accent-bar"></div>
                    </div>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        
                        <!-- Email Input -->
                        <div class="mb-4">
                            <label for="email" class="form-label">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ejemplo@servicel.com">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Password Input -->
                        <div class="mb-4">
                            <label for="password" class="form-label">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="••••••••">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <!-- Remember me -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Recuérdeme
                                </label>
                            </div>
                        </div>
                        
                        <!-- Submit Button -->
                        <button type="submit" class="btn-login-submit">
                            Iniciar Sesión
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

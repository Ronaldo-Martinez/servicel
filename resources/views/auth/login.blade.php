@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card rounded-0 bg-white">
        <div class="row justify-content-center align-items-center" style="height: 80vh;">
            <div class="col-12 col-lg-8 d-none d-lg-block p-0" style="height: 80vh;">
                <div class="container card rounded-0 ">
                    <div class="d-flex content-nosotros">
                        <div class="header-video-login">
                            <video src="/video/headerContacto.mp4" muted autoplay loop loading="lazy"></video>
                        </div>
                        <div class="header-overlay-login"></div>
                        <div class="header-content">
                            <img src="/logo2.webp" alt="Logo servicel">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card-body">
                    <div class="fs-5 py-3 text-center">Iniciar Sesión</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="col-form-label text-md-end">Correo Electrónico</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label text-md-end">Contraseña</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        Recuérdeme 
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex mb-0 justify-content-center">
                            
                                <button type="submit" class="btn btn-secondary">
                                    Iniciar Sesión
                                </button>

                                
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

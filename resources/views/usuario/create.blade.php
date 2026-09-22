@extends('layouts.app')

@section('template_title')
    Crear Usuario
@endsection

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card-premium-admin">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="card-title mb-1">Registrar Nuevo Usuario</h2>
                        <p class="text-muted small mb-0">Configura la cuenta y el método de acceso para el colaborador</p>
                    </div>
                    <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-1">
                        <x-icon name="arrow_back" style="font-size: 1rem;" />
                        Volver
                    </a>
                </div>

                @if ($errors->any())
                    <div class="alert alert-danger m-4 mb-0 rounded-3">
                        <ul class="mb-0 ps-3">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('usuarios.store') }}" autocomplete="off">
                        @csrf

                        <!-- Datos Básicos -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label fw-bold">Nombre Completo <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Ej: Carlos Mendoza" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="carlos@servicel.com" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Rol -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Rol y Permisos <span class="text-danger">*</span></label>
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <label class="p-3 border rounded-3 d-flex align-items-start gap-3 cursor-pointer h-100" style="background-color: #f8fafc; cursor: pointer;">
                                        <input type="radio" name="role" value="operador" class="form-check-input mt-1" {{ old('role', 'operador') === 'operador' ? 'checked' : '' }}>
                                        <div>
                                            <div class="fw-bold text-dark">Operador</div>
                                            <small class="text-muted">Gestiona el catálogo de maquinaria, países, tipos y fotos. No puede administrar otros usuarios.</small>
                                        </div>
                                    </label>
                                </div>
                                <div class="col-12 col-md-6">
                                    <label class="p-3 border rounded-3 d-flex align-items-start gap-3 cursor-pointer h-100" style="background-color: #f8fafc; cursor: pointer;">
                                        <input type="radio" name="role" value="admin" class="form-check-input mt-1" {{ old('role') === 'admin' ? 'checked' : '' }}>
                                        <div>
                                            <div class="fw-bold text-dark">Administrador</div>
                                            <small class="text-muted">Control total del sistema, incluyendo alta, edición, bloqueo de usuarios y configuraciones.</small>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Modo de Contraseña y Acceso -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Mecanismo de Acceso Inicial</label>
                            <div class="border rounded-3 p-3 bg-light">
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="mode" id="mode_auto" value="auto" {{ old('mode', 'auto') === 'auto' ? 'checked' : '' }} onchange="togglePasswordMode()">
                                    <label class="form-check-label fw-bold" for="mode_auto">
                                        Generar contraseña temporal automática y enviar por correo (Recomendado)
                                    </label>
                                    <p class="text-muted small mb-0 ms-1">
                                        El sistema generará una clave segura provisional y se la enviará al correo del usuario. Al iniciar sesión por primera vez, el sistema le exigirá crear su propia contraseña personal.
                                    </p>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="mode" id="mode_manual" value="manual" {{ old('mode') === 'manual' ? 'checked' : '' }} onchange="togglePasswordMode()">
                                    <label class="form-check-label fw-bold" for="mode_manual">
                                        Establecer contraseña manual ahora
                                    </label>
                                </div>

                                <!-- Campo de Contraseña Manual -->
                                <div id="manual_password_wrapper" class="mt-3 ps-4" style="{{ old('mode') === 'manual' ? '' : 'display: none;' }}">
                                    <div class="row g-2">
                                        <div class="col-12 col-md-7">
                                            <label for="password" class="form-label small fw-bold">Contraseña Inicial (mínimo 8 caracteres):</label>
                                            <input type="password" name="password" id="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="••••••••">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="must_change_password" id="must_change_password" value="1" {{ old('must_change_password', true) ? 'checked' : '' }}>
                                        <label class="form-check-label small text-muted" for="must_change_password">
                                            Exigir cambio de contraseña tras el primer inicio de sesión
                                        </label>
                                    </div>
                                    <div class="form-check mt-1">
                                        <input class="form-check-input" type="checkbox" name="send_email" id="send_email" value="1" {{ old('send_email', true) ? 'checked' : '' }}>
                                        <label class="form-check-label small text-muted" for="send_email">
                                            Enviar también un correo con estas credenciales
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex justify-content-end gap-2 pt-2 border-top">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn-premium-create border-0">
                                <x-icon name="person_add" />
                                Guardar Usuario
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePasswordMode() {
        const isManual = document.getElementById('mode_manual').checked;
        document.getElementById('manual_password_wrapper').style.display = isManual ? 'block' : 'none';
        if (!isManual) {
            document.getElementById('password').value = '';
        }
    }
</script>
@endsection

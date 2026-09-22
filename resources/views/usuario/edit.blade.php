@extends('layouts.app')

@section('template_title')
    Editar Usuario: {{ $usuario->name }}
@endsection

@section('content')
<div class="container py-3">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-8">
            <div class="card-premium-admin">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <h2 class="card-title mb-1">Editar Usuario: {{ $usuario->name }}</h2>
                        <p class="text-muted small mb-0">Actualiza los datos de la cuenta, permisos o estado de acceso</p>
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
                    <form method="POST" action="{{ route('usuarios.update', $usuario->id) }}">
                        @csrf
                        @method('PATCH')

                        <!-- Datos Principales -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label for="name" class="form-label fw-bold">Nombre Completo <span class="text-danger">*</span></label>
                                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $usuario->name) }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 col-md-6">
                                <label for="email" class="form-label fw-bold">Correo Electrónico <span class="text-danger">*</span></label>
                                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $usuario->email) }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Rol y Estado -->
                        <div class="row g-3 mb-4">
                            <div class="col-12 col-md-6">
                                <label for="role" class="form-label fw-bold">Rol en la Plataforma</label>
                                @if(Auth::id() == $usuario->id)
                                    <input type="text" class="form-control" value="Administrador" disabled>
                                    <small class="text-muted">No puedes modificar el rol de tu propia cuenta activa.</small>
                                    <input type="hidden" name="role" value="admin">
                                @else
                                    <select name="role" id="role" class="form-select @error('role') is-invalid @enderror">
                                        <option value="operador" {{ old('role', $usuario->role) === 'operador' ? 'selected' : '' }}>Operador (Gestión de maquinaria y catálogo)</option>
                                        <option value="admin" {{ old('role', $usuario->role) === 'admin' ? 'selected' : '' }}>Administrador (Control total y usuarios)</option>
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                @endif
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label fw-bold">Estado de Acceso</label>
                                @if(Auth::id() == $usuario->id)
                                    <div class="p-2 border rounded bg-light">
                                        <span class="badge bg-success">Activo</span>
                                        <small class="text-muted ms-2">Tu propia cuenta siempre permanece activa.</small>
                                        <input type="hidden" name="status" value="1">
                                    </div>
                                @else
                                    <div class="form-check form-switch p-2 border rounded bg-light ps-5">
                                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" {{ old('status', $usuario->status) ? 'checked' : '' }}>
                                        <label class="form-check-label fw-bold" for="status">
                                            Permitir inicio de sesión (Activo)
                                        </label>
                                        <small class="d-block text-muted">Si se desactiva, el usuario no podrá acceder al sistema ni con su contraseña correcta.</small>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Seguridad y Contraseña -->
                        <div class="mb-4">
                            <label class="form-label fw-bold">Actualización de Contraseña (Opcional)</label>
                            <div class="border rounded-3 p-3 bg-light">
                                <div class="row g-2 mb-2">
                                    <div class="col-12 col-md-7">
                                        <label for="password" class="form-label small">Nueva Contraseña Manual:</label>
                                        <input type="password" name="password" id="password" class="form-control form-control-sm @error('password') is-invalid @enderror" placeholder="Dejar en blanco para no modificar">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="force_change_next_login" id="force_change_next_login" value="1" {{ $usuario->must_change_password ? 'checked' : '' }}>
                                    <label class="form-check-label small fw-bold" for="force_change_next_login">
                                        Forzar cambio de contraseña en el próximo inicio de sesión
                                    </label>
                                    <small class="d-block text-muted">Si está marcado, se solicitará al usuario crear una nueva contraseña en cuanto ingrese al sistema.</small>
                                </div>
                            </div>
                        </div>

                        <!-- Botones de Acción -->
                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn-premium-create border-0">
                                <x-icon name="save" />
                                Guardar Cambios
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

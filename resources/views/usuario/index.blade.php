@extends('layouts.app')

@section('template_title')
    Gestión de Usuarios
@endsection

@section('content')
<div class="container-fluid">
    <!-- Métricas KPI Rápidas -->
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-navy">
                    <x-icon name="group" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Total Usuarios</span>
                    <h2 class="kpi-value">{{ $totalUsers }}</h2>
                    <span class="kpi-subtext">Cuentas registradas</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-yellow">
                    <x-icon name="check_circle" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Usuarios Activos</span>
                    <h2 class="kpi-value">{{ $activeUsers }}</h2>
                    <span class="kpi-subtext">Con acceso al sistema</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-navy">
                    <x-icon name="admin_panel_settings" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Administradores</span>
                    <h2 class="kpi-value">{{ $adminUsers }}</h2>
                    <span class="kpi-subtext">Control total</span>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-yellow">
                    <x-icon name="lock_reset" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Primer Login Pendiente</span>
                    <h2 class="kpi-value">{{ $pendingFirstLoginUsers }}</h2>
                    <span class="kpi-subtext">Contraseña temporal activa</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Alertas Flash -->
    @if ($message = Session::get('success'))
        <div class="alert alert-success d-flex align-items-center justify-content-between mb-3 shadow-sm rounded-3">
            <div class="d-flex align-items-center gap-2">
                <x-icon name="check_circle" style="font-size: 1.3rem;" />
                <span>{{ $message }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="alert alert-danger d-flex align-items-center justify-content-between mb-3 shadow-sm rounded-3">
            <div class="d-flex align-items-center gap-2">
                <x-icon name="error" style="font-size: 1.3rem;" />
                <span>{{ $message }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Banner especial si se generó contraseña temporal -->
    @if (Session::has('created_temp_password'))
        <div class="alert alert-warning border-0 shadow-sm rounded-3 mb-4 p-3" style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-left: 5px solid #f59e0b !important;">
            <div class="d-flex align-items-start gap-3">
                <div class="p-2 rounded-circle bg-white text-warning shadow-sm">
                    <x-icon name="key" style="font-size: 1.5rem;" />
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold text-dark mb-1">Contraseña temporal de respaldo para: <span class="text-primary">{{ Session::get('created_user_email') }}</span></h6>
                    <p class="mb-2 text-muted small">Copia esta clave de respaldo si el usuario no tiene acceso a su correo electrónico en este momento. Se le pedirá cambiarla al ingresar:</p>
                    <div class="d-inline-flex align-items-center gap-2 bg-white px-3 py-1 rounded-2 border">
                        <code class="fw-bold fs-6 text-dark" id="tempPassCode">{{ Session::get('created_temp_password') }}</code>
                        <button type="button" class="btn btn-sm btn-link text-decoration-none p-0" onclick="navigator.clipboard.writeText('{{ Session::get('created_temp_password') }}'); this.innerText='¡Copiado!';">
                            Copiar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Tabla Principal de Usuarios -->
    <div class="card-premium-admin">
        <div class="card-header">
            <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 w-100">
                <div>
                    <h2 class="card-title mb-1">Gestión de Usuarios</h2>
                    <p class="text-muted small mb-0">Control de credenciales, roles y accesos al sistema Servicel</p>
                </div>

                <div class="d-flex gap-2 align-items-center flex-wrap">
                    <a href="{{ route('usuarios.create') }}" class="btn-premium-create">
                        <x-icon name="person_add" />
                        Registrar Usuario
                    </a>
                </div>
            </div>
        </div>

        <!-- Filtros y Búsqueda -->
        <div class="p-3 border-bottom bg-light">
            <form method="GET" action="{{ route('usuarios.index') }}" class="row g-2 align-items-center">
                <div class="col-12 col-md-5">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <x-icon name="search" style="font-size: 1.1rem; color: #64748b;" />
                        </span>
                        <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control border-start-0" placeholder="Buscar por nombre o correo...">
                    </div>
                </div>
                <div class="col-6 col-md-3">
                    <select name="role" class="form-select">
                        <option value="">Todos los roles</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="operador" {{ request('role') == 'operador' ? 'selected' : '' }}>Operador</option>
                    </select>
                </div>
                <div class="col-6 col-md-2">
                    <select name="status" class="form-select">
                        <option value="">Todos los estados</option>
                        <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Activos</option>
                        <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactivos</option>
                    </select>
                </div>
                <div class="col-12 col-md-2 d-flex gap-2">
                    <button type="submit" class="btn btn-secondary w-100">Filtrar</button>
                    @if(request()->hasAny(['buscar', 'role', 'status']))
                        <a href="{{ route('usuarios.index') }}" class="btn btn-outline-secondary" title="Limpiar filtros">
                            <x-icon name="restart_alt" />
                        </a>
                    @endif
                </div>
            </form>
        </div>

        <div class="card-body p-0">
            <div class="table-premium-admin-wrapper">
                <table class="table-premium-admin">
                    <thead>
                        <tr>
                            <th>Usuario / Perfil</th>
                            <th>Correo Electrónico</th>
                            <th>Rol</th>
                            <th>Estado de Acceso</th>
                            <th>Seguridad</th>
                            <th style="width: 220px; text-align: right;">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div style="width: 40px; height: 40px; border-radius: 50%; background: linear-gradient(135deg, #171e3b 0%, #253266 100%); color: #fed116; display: flex; align-items: center; justify-content: center; font-weight: bold; font-size: 1rem; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
                                            {{ strtoupper(substr($user->name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark">{{ $user->name }}</div>
                                            <small class="text-muted">ID #{{ $user->id }}</small>
                                            @if(Auth::id() == $user->id)
                                                <span class="badge bg-light text-primary border ms-1" style="font-size: 0.7rem;">(Tú)</span>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="text-secondary">{{ $user->email }}</span>
                                </td>
                                <td>
                                    @if($user->role === 'admin')
                                        <span class="badge" style="background-color: #171e3b; color: #fed116; font-weight: 600; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem;">
                                            <x-icon name="shield" style="font-size: 0.9rem;" class="align-middle me-1" />
                                            Administrador
                                        </span>
                                    @else
                                        <span class="badge bg-light text-dark border" style="font-weight: 600; padding: 6px 12px; border-radius: 20px; font-size: 0.75rem;">
                                            <x-icon name="engineering" style="font-size: 0.9rem;" class="align-middle me-1" />
                                            Operador
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status)
                                        <span class="badge-pill-custom badge-pill-active">
                                            <span class="status-dot active" style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; margin-right: 4px; background-color: #10b981;"></span>
                                            Activo
                                        </span>
                                    @else
                                        <span class="badge-pill-custom badge-pill-inactive">
                                            <span class="status-dot inactive" style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; margin-right: 4px; background-color: #ef4444;"></span>
                                            Inactivo / Bloqueado
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    @if($user->must_change_password)
                                        <span class="badge bg-warning text-dark border" style="font-size: 0.75rem;" title="El usuario debe cambiar su clave temporal al ingresar">
                                            <x-icon name="lock_reset" style="font-size: 0.85rem;" class="align-middle" />
                                            Cambio pendiente
                                        </span>
                                    @else
                                        <span class="badge bg-light text-success border" style="font-size: 0.75rem;">
                                            <x-icon name="verified_user" style="font-size: 0.85rem;" class="align-middle" />
                                            Contraseña fija
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <div class="action-group justify-content-end d-flex gap-2 align-items-center">
                                        <!-- Alternar Estado (Activar/Desactivar) -->
                                        @if(Auth::id() != $user->id)
                                            <form action="{{ route('usuarios.toggle-status', $user->id) }}" method="POST" class="m-0">
                                                @csrf
                                                @method('PATCH')
                                                @if($user->status)
                                                    <button type="submit" class="btn-action-circle btn-action-status-active" title="Desactivar / Bloquear acceso">
                                                        <x-icon name="toggle_on" style="font-size: 1.25rem;" />
                                                    </button>
                                                @else
                                                    <button type="submit" class="btn-action-circle btn-action-status-inactive" title="Activar acceso">
                                                        <x-icon name="toggle_off" style="font-size: 1.25rem;" />
                                                    </button>
                                                @endif
                                            </form>
                                        @endif

                                        <!-- Reenviar / Generar nueva contraseña temporal -->
                                        <form action="{{ route('usuarios.resend-temp-password', $user->id) }}" method="POST" class="m-0" onsubmit="return confirm('¿Deseas generar una nueva clave temporal para {{ $user->name }} y enviarla por correo?');">
                                            @csrf
                                            <button type="submit" class="btn-action-circle btn-action-clone" title="Restablecer clave temporal y reenviar">
                                                <x-icon name="key" style="font-size: 1.25rem;" />
                                            </button>
                                        </form>

                                        <!-- Editar datos -->
                                        <a class="btn-action-circle btn-action-edit" href="{{ route('usuarios.edit', $user->id) }}" title="Editar usuario">
                                            <x-icon name="edit" style="font-size: 1.25rem;" />
                                        </a>

                                        <!-- Eliminar usuario -->
                                        @if(Auth::id() != $user->id)
                                            <form action="{{ route('usuarios.destroy', $user->id) }}" method="POST" class="m-0" onsubmit="return confirm('¿Estás seguro de eliminar permanentemente al usuario {{ $user->name }}?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn-action-circle btn-action-delete" title="Eliminar usuario">
                                                    <x-icon name="delete" style="font-size: 1.25rem;" />
                                                </button>
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <div class="mb-2">
                                        <x-icon name="person_search" style="font-size: 2.5rem; color: #cbd5e1;" />
                                    </div>
                                    <p class="mb-0">No se encontraron usuarios registrados con los criterios seleccionados.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($users->hasPages())
                <div class="p-3 border-top d-flex justify-content-end">
                    {!! $users->links() !!}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

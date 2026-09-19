@extends('layouts.app')

@section('template_title')
    Maquina
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-premium-admin">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <h2 class="card-title">
                                {{ __('Maquina') }}
                            </h2>

                            <div class="float-right">
                                <a href="{{ route('maquinas.create') }}" class="btn-premium-create" data-placement="left">
                                    <x-icon name="add" />
                                    Registrar Nuevo
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4 mb-0">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-premium-admin-wrapper">
                            <table class="table-premium-admin">
                                <thead>
                                    <tr>
                                        <th>País</th>
                                        <th>Tipo de Maquinaria</th>
                                        <th>Marca</th>
                                        <th>Modelo</th>
                                        <th>Estado</th>
                                        <th style="width: 150px; text-align: right;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maquinas as $maquina)
                                        <tr>
                                            <td>
                                                <span class="badge-pill-custom badge-pill-country">
                                                    {{ $maquina->pais->nombre }}
                                                </span>
                                            </td>
                                            <td>
                                                <span class="badge-pill-custom badge-pill-type">
                                                    {{ $maquina->tipoMaquina->nombre }}
                                                </span>
                                            </td>
                                            <td><strong>{{ $maquina->marca }}</strong></td>
                                            <td>{{ $maquina->modelo }}</td>
                                            <td>
                                                @if($maquina->status)
                                                    <span class="badge-pill-custom badge-pill-active">
                                                        <span class="status-dot active" style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; margin-right: 4px;"></span>
                                                        Activo
                                                    </span>
                                                @else
                                                    <span class="badge-pill-custom badge-pill-inactive">
                                                        <span class="status-dot inactive" style="display: inline-block; width: 6px; height: 6px; border-radius: 50%; margin-right: 4px;"></span>
                                                        Inactivo
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="action-group justify-content-end d-flex gap-2 align-items-center">
                                                    <!-- Botón de Alternar Estado (Activar/Desactivar) -->
                                                    <form action="{{ route('maquinas.toggle-status', $maquina->id) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('PATCH')
                                                        @if($maquina->status)
                                                            <button type="submit" class="btn-action-circle btn-action-status-active" title="Desactivar Máquina">
                                                                <x-icon name="toggle_on" style="font-size: 1.25rem;" />
                                                            </button>
                                                        @else
                                                            <button type="submit" class="btn-action-circle btn-action-status-inactive" title="Activar Máquina">
                                                                <x-icon name="toggle_off" style="font-size: 1.25rem;" />
                                                            </button>
                                                        @endif
                                                    </form>

                                                    <a class="btn-action-circle btn-action-show" href="{{ route('maquinas.show',$maquina->id) }}" title="Ver">
                                                        <x-icon name="visibility" style="font-size: 1.25rem;" />
                                                    </a>
                                                    <form action="{{ route('maquinas.clone', $maquina->id) }}" method="POST" class="m-0">
                                                        @csrf
                                                        <button type="submit" class="btn-action-circle btn-action-clone" title="Clonar Máquina">
                                                            <x-icon name="content_copy" style="font-size: 1.25rem;" />
                                                        </button>
                                                    </form>
                                                    <a class="btn-action-circle btn-action-edit" href="{{ route('maquinas.edit',$maquina->id) }}" title="Editar">
                                                        <x-icon name="edit" style="font-size: 1.25rem;" />
                                                    </a>

                                                    <form action="{{ route('maquinas.destroy',$maquina->id) }}" method="POST" class="m-0">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn-action-circle btn-action-delete" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar esta máquina?')">
                                                            <x-icon name="delete" style="font-size: 1.25rem;" />
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $maquinas->links() !!}
            </div>
        </div>
    </div>
@endsection

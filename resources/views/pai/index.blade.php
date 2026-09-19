@extends('layouts.app')

@section('template_title')
    Pais
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card-premium-admin">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
                            <h2 class="card-title">
                                {{ __('Pais') }}
                            </h2>

                             <div class="float-right">
                                 <a href="{{ route('pais.create') }}" class="btn-premium-create" data-placement="left">
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
                                        <th style="width: 80px;">No</th>
										<th>Nombre</th>
										<th>Codigo Pais</th>
										<th>Numero Telefono</th>
                                        <th style="width: 150px; text-align: right;">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $i = 0; @endphp
                                    @foreach ($pais as $pai)
                                        <tr>
                                            <td>{{ ++$i }}</td>
											<td><strong>{{ $pai->nombre }}</strong></td>
											<td>
                                                <span class="badge-pill-custom badge-pill-country">
                                                    +{{ $pai->codigo_pais }}
                                                </span>
                                            </td>
											<td>{{ $pai->numero_telefono }}</td>
                                            <td>
                                                <div class="action-group justify-content-end">
                                                    <form action="{{ route('pais.destroy',$pai->id) }}" method="POST" class="m-0 d-flex gap-2">
                                                         <a class="btn-action-circle btn-action-show" href="{{ route('pais.show',$pai->id) }}" title="Ver">
                                                             <x-icon name="visibility" style="font-size: 1.25rem;" />
                                                         </a>
                                                         <a class="btn-action-circle btn-action-edit" href="{{ route('pais.edit',$pai->id) }}" title="Editar">
                                                             <x-icon name="edit" style="font-size: 1.25rem;" />
                                                         </a>
                                                         @csrf
                                                         @method('DELETE')
                                                         <button type="submit" class="btn-action-circle btn-action-delete" title="Eliminar" onclick="return confirm('¿Seguro que deseas eliminar este país?')">
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
                {!! $pais->links() !!}
            </div>
        </div>
    </div>
@endsection

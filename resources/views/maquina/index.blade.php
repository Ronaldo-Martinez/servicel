@extends('layouts.app')

@section('template_title')
    Maquina
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Maquina') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('maquinas.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  Registrar Nuevo
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Pais</th>
										<th>Tipo de Maquina</th>
										<th>Modelo</th>
										<th>Marca</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($maquinas as $maquina)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $maquina->pais->nombre }}</td>
											<td>{{ $maquina->tipoMaquina->nombre }}</td>
											<td>{{ $maquina->modelo }}</td>
											<td>{{ $maquina->marca }}</td>

                                            <td>
                                                <form action="{{ route('maquinas.destroy',$maquina->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('maquinas.show',$maquina->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('maquinas.edit',$maquina->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                                </form>
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

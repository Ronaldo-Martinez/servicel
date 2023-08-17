@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Maquina
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar Maquina</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('maquinas.update', $maquina->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('maquina.form')

                        </form>
                    </div>
                    <div class="card-header">
                        <span class="card-title">Agregar Características</span>
                    </div>
                    <div class="card-body">
                        <form id="caracteristicaForm">
                            @csrf
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="caracteristica">Característica:</label>
                                        <input class="form-control" type="text" name="caracteristica" id="caracteristica" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="valor">Valor:</label>
                                        <input class="form-control" type="text" name="valor" id="valor" required>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="maquina_id">ID de Máquina:</label>
                                        <input class="form-control" type="text" name="maquina_id" id="maquina_id" required value="{{$maquina->id}}" disabled>
                                    </div>
                                </div>
                                <div class="col-12 pt-4">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Crear Característica</button>
                                    </div>
                                </div>
                            </div>
                            
                        </form>
                    </div>
                    
                    <div>
                        <div class="card-header card-title">Características existentes</div>
                        <table id="caracteristicasTable" class="table ">
                            <thead>
                                <tr>
                                    <th>Característica</th>
                                    <th>Valor</th>
                                    <th>Máquina ID</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Aquí se llenarán los datos de la tabla usando AJAX -->
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>
@endsection

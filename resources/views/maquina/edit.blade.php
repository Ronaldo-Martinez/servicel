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
                    <div class="card-header bg-secondary text-white">
                        <span class="card-title">Actualizar Maquina</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('maquinas.update', $maquina->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('maquina.form')

                        </form>
                    </div>

                    <!--FOTOS Y CARACTERISTICAS-->
                    <div class="accordion " id="accordionOpciones">
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                Características
                            </button>
                          </h2>
                          <div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionOpciones">
                            <div class="accordion-body">
                                <div class="card-header">
                                    <span class="card-title">Agregar Características</span>
                                </div>
                                <div class="card-body">
                                    <form id="caracteristicaForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="caracteristica">Característica:</label>
                                                    <input class="form-control" type="text" name="caracteristica" id="caracteristica" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="valor">Valor:</label>
                                                    <input class="form-control" type="text" name="valor" id="valor" required>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group">
                                                    <label class="form-label" for="maquina_id">ID de Máquina:</label>
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
                        <div class="accordion-item">
                          <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                Fotos
                            </button>
                          </h2>
                          <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionOpciones">
                            <div class="accordion-body">
                                <!--Formulario de imagenes-->
                                <div class="card-header">
                                    <span class="card-title">Agregar Imágenes</span>
                                </div>
                                <div class="card-body">
                                    <form id="imagenForm" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-6 mt-3">
                                                <label class="form-label" for="imagen">Foto de la maquina:</label>
                                                <input class="form-control" type="file" name="imagen" id="imagen">
                                            </div>
                                            <div class="col-6 mt-3">
                                                <label class="form-label" for="maquina_id">Maquina:</label>
                                                <input class="form-control" type="text" name="maquina_id" id="maquina_id" value="{{$maquina->id}}" disabled>
                                            </div>
                                            <div class="col-6 mt-3">
                                                <label class="form-label" for="nombre">Nombre de Foto:</label>
                                                <input class="form-control" type="text" name="nombre" id="nombre">
                                            </div>
                                            <div class="col-6 mt-3">
                                                <label class="form-label" for="descripcion">Descripción de Foto:</label>
                                                <input class="form-control" type="text" name="descripcion" id="descripcion">
                                            </div>
                                            <!-- Puedes agregar más campos si es necesario -->
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <button class="btn btn-primary mt-4" type="submit">Subir Imagen</button>
                                                </div>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                                <!--FOTOS-->
                                <div>
                                    <div class="card-header card-title">Fotos de la maquinaria</div>
                                    <table id="imagenesTable" class="table ">
                                        <thead>
                                            <tr>
                                                <th>FOTO</th>
                                                <th>Nombre</th>
                                                <th>Descripción</th>
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
                    </div>

                </div>
            </div>
        </div>
    </section>
    <script>
        window.csrfToken = "{{ csrf_token() }}";
    </script>
@endsection

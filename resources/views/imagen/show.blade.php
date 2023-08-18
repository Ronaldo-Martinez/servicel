@extends('layouts.app')

@section('template_title')
    {{ $imagen->name ?? "{{ __('Show') Imagen" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Imagen</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('imagens.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Url:</strong>
                            {{ $imagen->url }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $imagen->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $imagen->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Maquina Id:</strong>
                            {{ $imagen->maquina_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

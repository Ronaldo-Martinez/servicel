@extends('layouts.app')

@section('template_title')
    {{ $caracteristica->name ?? "{{ __('Show') Caracteristica" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Caracteristica</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('caracteristicas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Caracteristica:</strong>
                            {{ $caracteristica->caracteristica }}
                        </div>
                        <div class="form-group">
                            <strong>Valor:</strong>
                            {{ $caracteristica->valor }}
                        </div>
                        <div class="form-group">
                            <strong>Maquina Id:</strong>
                            {{ $caracteristica->maquina_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

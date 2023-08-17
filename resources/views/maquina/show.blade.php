@extends('layouts.app')

@section('template_title')
    {{ $maquina->name ?? "{{ __('Show') Maquina" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Maquina</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('maquinas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Pais Id:</strong>
                            {{ $maquina->pais_id }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Maquina Id:</strong>
                            {{ $maquina->tipo_maquina_id }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $maquina->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $maquina->marca }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

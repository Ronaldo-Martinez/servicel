<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('País') }}
                    {{ Form::select('pais_id', $opcionesDePaises, $maquina->pais_id, ['class' => 'form-select' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un país']) }}
                    {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group">
                    {{ Form::label('tipo_maquina_id', 'Tipo de Maquinaria') }}
                    {{ Form::select('tipo_maquina_id', $opcionesDeTiposMaquinaria, $maquina->tipo_maquina_id, ['class' => 'form-select' . ($errors->has('tipo_maquina_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un tipo de maquinaria']) }}
                    {!! $errors->first('tipo_maquina_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="form-group">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $maquina->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $maquina->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" onclick="eliminarCaracteristica(4);">{{ __('Submit') }}</button>
    </div>
</div>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('caracteristica') }}
            {{ Form::text('caracteristica', $caracteristica->caracteristica, ['class' => 'form-control' . ($errors->has('caracteristica') ? ' is-invalid' : ''), 'placeholder' => 'Caracteristica']) }}
            {!! $errors->first('caracteristica', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('valor') }}
            {{ Form::text('valor', $caracteristica->valor, ['class' => 'form-control' . ($errors->has('valor') ? ' is-invalid' : ''), 'placeholder' => 'Valor']) }}
            {!! $errors->first('valor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('maquina_id') }}
            {{ Form::text('maquina_id', $caracteristica->maquina_id, ['class' => 'form-control' . ($errors->has('maquina_id') ? ' is-invalid' : ''), 'placeholder' => 'Maquina Id']) }}
            {!! $errors->first('maquina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
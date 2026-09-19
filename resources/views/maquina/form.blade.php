<div class="p-2">
    <div class="row g-3">
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold text-secondary fs-6" for="pais_id">País de Ubicación</label>
                {{ Form::select('pais_id', $opcionesDePaises, $maquina->pais_id, ['class' => 'form-select form-control-modern' . ($errors->has('pais_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un país', 'required' => 'required', 'id' => 'pais_id']) }}
                {!! $errors->first('pais_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold text-secondary fs-6" for="tipo_maquina_id">Tipo de Maquinaria</label>
                {{ Form::select('tipo_maquina_id', $opcionesDeTiposMaquinaria, $maquina->tipo_maquina_id, ['class' => 'form-select form-control-modern' . ($errors->has('tipo_maquina_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un tipo de maquinaria', 'required' => 'required', 'id' => 'tipo_maquina_id']) }}
                {!! $errors->first('tipo_maquina_id', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold text-secondary fs-6" for="marca">Marca</label>
                {{ Form::text('marca', $maquina->marca, ['class' => 'form-control form-control-modern' . ($errors->has('marca') ? ' is-invalid' : ''), 'placeholder' => 'Ej: Caterpillar, Komatsu, Volvo...', 'required' => 'required', 'id' => 'marca']) }}
                {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="form-group">
                <label class="form-label fw-bold text-secondary fs-6" for="modelo">Modelo</label>
                {{ Form::text('modelo', $maquina->modelo, ['class' => 'form-control form-control-modern' . ($errors->has('modelo') ? ' is-invalid' : ''), 'placeholder' => 'Ej: 320D, D6R, PC200...', 'required' => 'required', 'id' => 'modelo']) }}
                {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
        <div class="col-12">
            <div class="p-3 rounded-3 bg-light border d-flex align-items-center justify-content-between mt-2">
                <div>
                    <span class="fw-bold text-secondary d-block">Visibilidad en Catálogo</span>
                    <small class="text-muted">Si está activa, los clientes podrán ver y cotizar esta máquina en el sitio web público.</small>
                </div>
                <div class="form-check form-switch fs-5 m-0">
                    {{ Form::checkbox('status', 1, $maquina->exists ? $maquina->status : true, ['class' => 'form-check-input switch-status-large', 'id' => 'statusSwitch']) }}
                </div>
            </div>
            {!! $errors->first('status', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    
    <div class="d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
        <a href="{{ route('maquinas.index') }}" class="btn btn-outline-secondary px-4 fw-bold">
            Cancelar
        </a>
        <button type="submit" class="btn btn-save-machine">
            <x-icon name="save" /> Guardar Información General
        </button>
    </div>
</div>
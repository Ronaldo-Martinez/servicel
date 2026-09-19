@extends('layouts.app')

@section('template_title')
    Editar Máquina: {{ $maquina->marca }} {{ $maquina->modelo }}
@endsection

@section('content')
<div class="container-fluid px-3 px-md-4 py-2" id="maquinaEditApp" data-maquina-id="{{ $maquina->id }}">
    <!-- Breadcrumb & Top Bar -->
    <div class="row align-items-center mb-3">
        <div class="col-12 col-md-7">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1 text-muted small">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-decoration-none">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('maquinas.index') }}" class="text-decoration-none">Maquinarias</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Editar Equipo</li>
                </ol>
            </nav>
            <div class="d-flex align-items-center gap-2 flex-wrap">
                <h1 class="h3 fw-bold text-secondary mb-0">
                    {{ $maquina->marca }} {{ $maquina->modelo }}
                </h1>
                @if($maquina->status)
                    <span class="badge bg-success-subtle text-success border border-success-subtle rounded-pill px-3 py-1 fw-bold">
                        <span class="status-dot-sm bg-success d-inline-block rounded-circle me-1"></span> Activa
                    </span>
                @else
                    <span class="badge bg-secondary-subtle text-secondary border border-secondary-subtle rounded-pill px-3 py-1 fw-bold">
                        <span class="status-dot-sm bg-secondary d-inline-block rounded-circle me-1"></span> Inactiva
                    </span>
                @endif
                <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill px-3 py-1">
                    {{ $maquina->tipoMaquina->nombre ?? 'Maquinaria' }}
                </span>
                <span class="badge bg-light text-dark border rounded-pill px-2 py-1 d-inline-flex align-items-center gap-1">
                    @if($maquina->pais && $maquina->pais->bandera)
                        <img src="{{ asset($maquina->pais->bandera) }}" alt="{{ $maquina->pais->nombre }}" width="16" height="16" class="rounded-circle">
                    @endif
                    {{ $maquina->pais->nombre ?? 'Ubicación' }}
                </span>
            </div>
        </div>
        <div class="col-12 col-md-5 mt-3 mt-md-0 d-flex justify-content-md-end gap-2">
            <a href="{{ route('maquina', $maquina->id) }}" target="_blank" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
                <x-icon name="visibility" />
                <span>Ver en Web Pública</span>
            </a>
            <a href="{{ route('maquinas.index') }}" class="btn btn-secondary d-inline-flex align-items-center gap-2">
                <x-icon name="arrow_back" />
                <span>Volver a Lista</span>
            </a>
        </div>
    </div>

    @includeif('partials.errors')

    <!-- Navegación por Pestañas Estilizadas -->
    <div class="card edit-maquina-card shadow-sm border-0 rounded-4 overflow-hidden mb-4">
        <div class="card-header bg-white border-bottom p-0">
            <ul class="nav nav-tabs nav-tabs-modern px-3 pt-2 border-0" id="maquinaTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active d-flex align-items-center gap-2 py-3 px-4 fw-bold" 
                            id="general-tab" data-bs-toggle="tab" data-bs-target="#general-tab-pane" 
                            type="button" role="tab" aria-controls="general-tab-pane" aria-selected="true">
                        <x-icon name="manufacturing" />
                        <span>1. Información General</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-flex align-items-center gap-2 py-3 px-4 fw-bold" 
                            id="fotos-tab" data-bs-toggle="tab" data-bs-target="#fotos-tab-pane" 
                            type="button" role="tab" aria-controls="fotos-tab-pane" aria-selected="false">
                        <x-icon name="photo_camera" />
                        <span>2. Galería de Fotos y Orden</span>
                        <span class="badge rounded-pill bg-warning text-dark ms-1" id="fotosBadgeCount">0</span>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link d-flex align-items-center gap-2 py-3 px-4 fw-bold" 
                            id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs-tab-pane" 
                            type="button" role="tab" aria-controls="specs-tab-pane" aria-selected="false">
                        <x-icon name="format_list_bulleted" />
                        <span>3. Ficha Técnica / Características</span>
                        <span class="badge rounded-pill bg-secondary text-white ms-1" id="specsBadgeCount">0</span>
                    </button>
                </li>
            </ul>
        </div>

        <div class="card-body p-4">
            <div class="tab-content" id="maquinaTabContent">
                <!-- ==================================================== -->
                <!-- PESTAÑA 1: INFORMACIÓN GENERAL                      -->
                <!-- ==================================================== -->
                <div class="tab-pane fade show active" id="general-tab-pane" role="tabpanel" aria-labelledby="general-tab" tabindex="0">
                    <div class="row">
                        <div class="col-12 col-xl-8 mx-auto">
                            <div class="card border rounded-4 p-3 p-md-4 shadow-none bg-white">
                                <h5 class="fw-bold text-secondary mb-3 d-flex align-items-center gap-2 border-bottom pb-2">
                                    <x-icon name="info" /> Datos de Identificación y Estado
                                </h5>
                                <form method="POST" action="{{ route('maquinas.update', $maquina->id) }}" role="form" enctype="multipart/form-data">
                                    {{ method_field('PATCH') }}
                                    @csrf
                                    @include('maquina.form')
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================================================== -->
                <!-- PESTAÑA 2: FOTOS Y ORDEN DE PORTADA                 -->
                <!-- ==================================================== -->
                <div class="tab-pane fade" id="fotos-tab-pane" role="tabpanel" aria-labelledby="fotos-tab" tabindex="0">
                    <div class="row g-4">
                        <!-- Uploader Panel -->
                        <div class="col-12 col-lg-4">
                            <div class="card border rounded-4 p-3 shadow-none bg-light h-100">
                                <h5 class="fw-bold text-secondary mb-1 d-flex align-items-center gap-2">
                                    <x-icon name="add_photo_alternate" /> Subir Fotos
                                </h5>
                                <p class="text-muted small mb-3">
                                    Selecciona una o varias imágenes. No necesitas escribir títulos obligatorios.
                                </p>

                                <form id="imagenFormModern" enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="maquina_id" value="{{ $maquina->id }}">

                                    <!-- Dropzone Clickable Area -->
                                    <div class="dropzone-area text-center p-4 rounded-4 border-2 border-dashed bg-white mb-3" id="dropzoneTrigger">
                                        <div class="dropzone-icon mb-2">
                                            <x-icon name="cloud_upload" />
                                        </div>
                                        <h6 class="fw-bold text-secondary mb-1">Haz clic para seleccionar imágenes</h6>
                                        <p class="text-muted small mb-2">o arrástralas directamente aquí</p>
                                        <span class="badge bg-light text-secondary border">Formatos: JPG, PNG, WEBP (Máx 5MB)</span>
                                        <input type="file" name="imagenes[]" id="fileInputModern" multiple accept="image/*" class="d-none">
                                    </div>

                                    <!-- Selected Files Preview Container -->
                                    <div id="selectedFilesPreview" class="d-none mb-3">
                                        <div class="d-flex align-items-center justify-content-between mb-2">
                                            <span class="fw-bold small text-secondary">Archivos seleccionados:</span>
                                            <button type="button" class="btn btn-sm text-danger p-0 fw-bold" id="btnClearSelection">Limpiar</button>
                                        </div>
                                        <div id="selectedFilesList" class="d-flex flex-wrap gap-2"></div>
                                    </div>

                                    <!-- Advanced/Optional Inputs Accordion -->
                                    <div class="accordion accordion-flush mb-3 border rounded-3 bg-white" id="accordionOptFields">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header">
                                                <button class="accordion-button collapsed py-2 px-3 small fw-bold text-muted" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOptFields">
                                                    + Nombre o Descripción opcional
                                                </button>
                                            </h2>
                                            <div id="collapseOptFields" class="accordion-collapse collapse" data-bs-parent="#accordionOptFields">
                                                <div class="accordion-body p-3 pt-0">
                                                    <div class="mb-2">
                                                        <label class="form-label small text-muted mb-1" for="fotoNombreOpt">Nombre / Etiqueta:</label>
                                                        <input type="text" class="form-control form-control-sm" name="nombre" id="fotoNombreOpt" placeholder="Ej: Vista lateral, Cabina...">
                                                    </div>
                                                    <div>
                                                        <label class="form-label small text-muted mb-1" for="fotoDescOpt">Descripción corta:</label>
                                                        <input type="text" class="form-control form-control-sm" name="descripcion" id="fotoDescOpt" placeholder="Ej: En perfectas condiciones...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold d-flex align-items-center justify-content-center gap-2" id="btnUploadImages">
                                        <x-icon name="cloud_upload" />
                                        <span>Subir a la Galería</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Gallery Grid Panel -->
                        <div class="col-12 col-lg-8">
                            <div class="card border rounded-4 p-3 p-md-4 shadow-none bg-white h-100">
                                <div class="d-flex align-items-center justify-content-between flex-wrap gap-2 mb-3 border-bottom pb-3">
                                    <div>
                                        <h5 class="fw-bold text-secondary mb-0 d-flex align-items-center gap-2">
                                            <x-icon name="collections" /> Galería de la Máquina
                                        </h5>
                                        <small class="text-muted">
                                            La primera foto (marcada con estrella dorada) es la que se mostrará como <strong>portada en el catálogo</strong> y como primer slide en la web.
                                        </small>
                                    </div>
                                    <div class="d-flex align-items-center gap-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary" id="btnRefreshGallery" title="Recargar fotos">
                                            <x-icon name="refresh" />
                                        </button>
                                    </div>
                                </div>

                                <!-- Feedback Alerts -->
                                <div id="galleryFeedback" class="alert alert-success d-none py-2 px-3 small rounded-3 mb-3"></div>

                                <!-- Dynamic Gallery Cards Grid -->
                                <div id="imagenesGrid" class="row g-3">
                                    <!-- Populated dynamically via AJAX -->
                                </div>

                                <!-- Empty State -->
                                <div id="galleryEmptyState" class="text-center py-5 d-none">
                                    <div class="text-muted opacity-50 mb-3" style="font-size: 3rem;">
                                        <x-icon name="image_not_supported" />
                                    </div>
                                    <h6 class="fw-bold text-secondary">Aún no hay fotos registradas</h6>
                                    <p class="text-muted small mb-0">Usa el panel de la izquierda para subir la primera foto de esta máquina.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ==================================================== -->
                <!-- PESTAÑA 3: CARACTERÍSTICAS TÉCNICAS                -->
                <!-- ==================================================== -->
                <div class="tab-pane fade" id="specs-tab-pane" role="tabpanel" aria-labelledby="specs-tab" tabindex="0">
                    <div class="row g-4">
                        <!-- Add Specs Panel -->
                        <div class="col-12 col-lg-5">
                            <div class="card border rounded-4 p-3 p-md-4 shadow-none bg-light h-100">
                                <h5 class="fw-bold text-secondary mb-1 d-flex align-items-center gap-2">
                                    <x-icon name="post_add" /> Agregar Característica
                                </h5>
                                <p class="text-muted small mb-3">
                                    Haz clic en una sugerencia rápida o escribe tus propios datos técnicos.
                                </p>

                                <!-- Sugerencias Rápidas en Chips -->
                                <div class="mb-3">
                                    <label class="form-label small fw-bold text-muted d-block mb-2">Sugerencias habituales:</label>
                                    <div class="d-flex flex-wrap gap-1" id="specSuggestionChips">
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Año">Año</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Horas de uso">Horas de uso</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Potencia (HP)">Potencia (HP)</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Capacidad">Capacidad</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Combustible">Combustible</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Peso Operativo">Peso Operativo</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Transmisión">Transmisión</button>
                                        <button type="button" class="btn btn-sm btn-outline-secondary rounded-pill py-0 px-2 chip-spec" data-key="Garantía">Garantía</button>
                                    </div>
                                </div>

                                <form id="caracteristicaFormModern">
                                    @csrf
                                    <input type="hidden" name="maquina_id" value="{{ $maquina->id }}">
                                    
                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-secondary" for="inputCaracNombre">
                                            Característica / Atributo:
                                        </label>
                                        <input class="form-control form-control-modern" type="text" name="caracteristica" id="inputCaracNombre" placeholder="Ej: Año, Potencia, Capacidad..." required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-bold small text-secondary" for="inputCaracValor">
                                            Valor / Especificación:
                                        </label>
                                        <input class="form-control form-control-modern" type="text" name="valor" id="inputCaracValor" placeholder="Ej: 2021, 150 HP, 20 Toneladas..." required>
                                    </div>

                                    <button type="submit" class="btn btn-primary w-100 py-2 fw-bold d-flex align-items-center justify-content-center gap-2" id="btnAddSpec">
                                        <x-icon name="add_circle" />
                                        <span>+ Añadir a Ficha Técnica</span>
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Specs List Table Panel -->
                        <div class="col-12 col-lg-7">
                            <div class="card border rounded-4 p-3 p-md-4 shadow-none bg-white h-100">
                                <div class="d-flex align-items-center justify-content-between mb-3 border-bottom pb-2">
                                    <h5 class="fw-bold text-secondary mb-0 d-flex align-items-center gap-2">
                                        <x-icon name="view_list" /> Ficha Técnica Registrada
                                    </h5>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" id="btnRefreshSpecs" title="Recargar">
                                        <x-icon name="refresh" />
                                    </button>
                                </div>

                                <!-- Feedback Alerts -->
                                <div id="specsFeedback" class="alert alert-success d-none py-2 px-3 small rounded-3 mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table table-hover align-middle mb-0" id="caracteristicasTableModern">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col" style="width: 45%;">Característica</th>
                                                <th scope="col" style="width: 40%;">Valor</th>
                                                <th scope="col" class="text-end" style="width: 15%;">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody id="caracteristicasTbody">
                                            <!-- Dynamically populated via AJAX -->
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Empty State -->
                                <div id="specsEmptyState" class="text-center py-5 d-none">
                                    <div class="text-muted opacity-50 mb-3" style="font-size: 2.8rem;">
                                        <x-icon name="playlist_add" />
                                    </div>
                                    <h6 class="fw-bold text-secondary">No hay características técnicas aún</h6>
                                    <p class="text-muted small mb-0">Agrega el año, potencia, capacidad o estado técnico en el formulario de la izquierda.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.csrfToken = "{{ csrf_token() }}";
    window.maquinaId = {{ $maquina->id }};
</script>
@endsection

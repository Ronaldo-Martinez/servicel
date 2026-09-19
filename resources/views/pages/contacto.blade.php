@extends('pages.base')

@section('content')
    <header class="header content-contacto" id="header">
        <div class="header-video">
            <video src="/video/headerContacto.mp4" muted autoplay loop loading="lazy"></video>
        </div>
        <div class="header-overlay"></div>
        <div class="header-content">
            <img src="/logo2.webp" alt="Logo servicel">
        </div>
        
        <!-- Banner de Características -->
        <div class="header-features-banner">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-center">
                    <!-- Soporte 24/7 -->
                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start py-2 py-md-0 feature-border-end">
                        <x-icon name="schedule" class="text-warning me-3 fs-1" />
                        <div class="text-start">
                            <div class="feature-title text-white fw-bold">Soporte 24/7</div>
                            <div class="feature-subtitle text-white-50 small">Atención y asistencia técnica</div>
                        </div>
                    </div>
                    <!-- 32+ años de experiencia -->
                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-center py-2 py-md-0 feature-border-end">
                        <x-icon name="workspace_premium" class="text-warning me-3 fs-1" />
                        <div class="text-start">
                            <div class="feature-title text-white fw-bold">32+ años de experiencia</div>
                            <div class="feature-subtitle text-white-50 small">Trayectoria y confianza</div>
                        </div>
                    </div>
                    <!-- Calidad garantizada -->
                    <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end py-2 py-md-0">
                        <x-icon name="verified_user" class="text-warning me-3 fs-1" />
                        <div class="text-start">
                            <div class="feature-title text-white fw-bold">Calidad garantizada</div>
                            <div class="feature-subtitle text-white-50 small">Compromiso en cada proyecto</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <!--Sección Ubicaciones-->
    <x-ubicaciones-geograficas />

@endsection
@extends('pages.base')

@section('content')
<header class="header content" id="header">
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
                    <span class="material-symbols-outlined text-warning me-3 fs-1">schedule</span>
                    <div class="text-start">
                        <div class="feature-title text-white fw-bold">Soporte 24/7</div>
                        <div class="feature-subtitle text-white-50 small">Atención y asistencia técnica</div>
                    </div>
                </div>
                <!-- 32+ años de experiencia -->
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center py-2 py-md-0 feature-border-end">
                    <span class="material-symbols-outlined text-warning me-3 fs-1">workspace_premium</span>
                    <div class="text-start">
                        <div class="feature-title text-white fw-bold">32+ años de experiencia</div>
                        <div class="feature-subtitle text-white-50 small">Trayectoria y confianza</div>
                    </div>
                </div>
                <!-- Calidad garantizada -->
                <div class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end py-2 py-md-0">
                    <span class="material-symbols-outlined text-warning me-3 fs-1">verified_user</span>
                    <div class="text-start">
                        <div class="feature-title text-white fw-bold">Calidad garantizada</div>
                        <div class="feature-subtitle text-white-50 small">Compromiso en cada proyecto</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<div id="Servicios">
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h1 class="fw-bold text-uppercase m-0" id="terraceria" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestros Servicios</h1>
        </div>
    </div>
    
    <!-- Terracería Section -->
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="subsection-title-container">
                    <span class="subtitle">Servicios Profesionales</span>
                    <h2>Servicios de Terracería</h2>
                    <div class="accent-bar"></div>
                </div>
                
                <div class="mt-4 px-3">
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Movimientos masivos de tierra.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Diseños de terraza.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Cortes y rellenos estructurales.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Estabilización de suelos.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Terraplenes.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Calles y accesos.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined">check_circle</span>
                        <span class="list-text">Obras de mitigación.</span>
                    </div>
                    <div class="original-list-item">
                        <span class="material-symbols-outlined" id="agroIndustria">check_circle</span>
                        <span class="list-text">Topografía.</span>
                    </div>
                </div>      
            </div>
            
            <div class="col-12 col-md-6 col-lg-4 d-none d-md-block">
                <div class="premium-carousel-container">
                    <div id="carouselTerraceriaCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="/img/terraceria.webp" class="w-100 img-carrusel" alt="Servicios de Terraceria Servicel">
                            </div>
                            <div class="carousel-item">
                                <img src="/img/terraceria2.webp" class="w-100 img-carrusel" alt="maquinaria aplanado terreno">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTerraceriaCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselTerraceriaCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Agroindustria Section -->
    <div class="container-fluid bg-secondary my-5 py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-6 col-lg-4 d-none d-md-block">
                    <div class="premium-carousel-container select-figura-carousel">
                        <div id="carouselAgroIndustriaCaptions" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="/img/agro1.webp" class="w-100 img-carrusel" alt="Servicios de Agroindustria Servicel">
                                </div>
                                <div class="carousel-item">
                                    <img src="/img/agro2.webp" class="w-100 img-carrusel" alt="maquinaria preparando terreno para cultivo terreno">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselAgroIndustriaCaptions" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselAgroIndustriaCaptions" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-8">
                    <div class="subsection-title-container-dark text-end">
                        <span class="subtitle">Soluciones de Campo</span>
                        <h2>Servicios de Agroindustria</h2>
                        <div class="accent-bar ms-auto"></div>
                    </div>
                    
                    <div class="px-3 mt-4">
                        <div class="original-highlight-item-dark mb-3">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Preparación de suelos para siembra: Plantación nueva, finca nueva de caña de azúcar, banano, palma africana y fincas de cafe.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Apertura y mantenimiento de accesos.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Apertura y Mantenimiento de obras y drenajes.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Obras para control de inundaciones.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Desolve de ríos y quebradas.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Apertura y mantenimiento de estanques de acuicultura para camarón y tilapia.</span>
                        </div>
                        <div class="original-list-item-dark">
                            <span class="material-symbols-outlined">check_circle</span>
                            <span class="list-text">Conformación de bordas dentro de fincas.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Tierra Blanca Section -->
    <div class="container my-5 pb-4">
        <div class="row align-items-center">
            <div class="col-12 col-md-6 pr-md-4">
                <div class="subsection-title-container">
                    <span class="subtitle">Suministros de Calidad</span>
                    <h2>Venta de Tierra Blanca</h2>
                    <div class="accent-bar"></div>
                </div>
                <p class="pt-3 fs-5 fw-bold texto text-secondary mb-4"> 
                    En El Salvador, nos enorgullecemos de ofrecer un servicio integral de venta 
                    de tierra blanca, respaldado por todos los permisos de ley vigentes. Nuestra 
                    dedicación a la legalidad y la transparencia nos distingue como proveedores 
                    confiables en el mercado de suministro de tierra blanca.
                </p>  
                <button class="premium-location-btn" data-bs-toggle="modal" data-bs-target="#modal-miniexcavadoras">
                    <span class="material-symbols-outlined">location_on</span>
                    Nuestra Ubicación
                </button>
            </div>
            
            <div class="col-12 col-md-6 mt-4 mt-md-0">
                <div class="premium-carousel-container">
                    <div id="carouselTierraCaptions" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner" data-bs-toggle="modal" data-bs-target="#modal-miniexcavadoras" style="cursor: pointer;">
                            <div class="carousel-item active">
                                <img src="/img/terraceria2.webp" class="w-100 img-carrusel" alt="maquinaria aplanado terreno">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselTierraCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselTierraCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Ubicación modal -->
    <div class="modal fade" id="modal-miniexcavadoras" tabindex="-1" aria-labelledby="modal-miniexcavadoras-Label" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-secondary">
                    <h3 class="modal-title text-white" id="modal-miniexcavadoras-Label">Nuestra Ubicación</h3>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="map-container">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1725.5353587895513!2d-89.46547453506611!3d13.857284946733857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDUxJzI2LjQiTiA4OcKwMjcnNTQuMCJX!5e0!3m2!1ses!2ssv!4v1691524711856!5m2!1ses!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

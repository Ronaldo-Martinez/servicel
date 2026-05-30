@extends('pages.base')

@section('content')
    <!--Header-->
    <header class="header content-nosotros" id="header">
        <div class="header-video">
            <video src="/video/headerNosotros.mp4" muted autoplay loop loading="lazy"></video>
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
                    <div
                        class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-start py-2 py-md-0 feature-border-end">
                        <span class="material-symbols-outlined text-warning me-3 fs-1">schedule</span>
                        <div class="text-start">
                            <div class="feature-title text-white fw-bold">Soporte 24/7</div>
                            <div class="feature-subtitle text-white-50 small">Atención y asistencia técnica</div>
                        </div>
                    </div>
                    <!-- 32+ años de experiencia -->
                    <div
                        class="col-12 col-md-4 d-flex align-items-center justify-content-center py-2 py-md-0 feature-border-end">
                        <span class="material-symbols-outlined text-warning me-3 fs-1">workspace_premium</span>
                        <div class="text-start">
                            <div class="feature-title text-white fw-bold">32+ años de experiencia</div>
                            <div class="feature-subtitle text-white-50 small">Trayectoria y confianza</div>
                        </div>
                    </div>
                    <!-- Calidad garantizada -->
                    <div
                        class="col-12 col-md-4 d-flex align-items-center justify-content-center justify-content-md-end py-2 py-md-0">
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
    
    <!--Misión y Visión-->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-stretch">
                <!-- Left Column: Title, Misión, and Visión stacked vertically -->
                <div class="col-12 col-lg-7 pe-lg-4 d-flex flex-column justify-content-center mb-4 mb-lg-0">
                    <div class="mb-5">
                        <span class="text-secondary text-uppercase fw-bold fs-6" style="letter-spacing: 2px;">CONÓCENOS</span>
                        <h2 class="display-5 fw-bold text-secondary mt-1 mb-3">Misión y Visión de Servicel</h2>
                        <div style="width: 70px; height: 5px; background-color: #FED116; border-radius: 10px;"></div>
                    </div>

                    <!-- Misión Card (Full width of the left column) -->
                    <div class="about-card mb-4">
                        <div class="d-flex align-items-center mb-4">
                            <div class="about-icon">
                                <span class="material-symbols-outlined">target</span>
                            </div>
                            <h3>Nuestra Misión</h3>
                        </div>
                        <p>
                            En Servicel, nuestra misión es ser el referente indiscutible en el sector de
                            alquiler de maquinaria pesada y servicios de terracería, ofreciendo soluciones
                            integrales y personalizadas para proyectos de construcción, obras civiles y
                            agroindustria. Con una dedicación inquebrantable hacia la excelencia y la
                            satisfacción del cliente, nos comprometemos a brindar servicios de primera
                            categoría, respaldados por nuestros {{ date('Y') - 1993 }} años de experiencia en el mercado.
                        </p>
                    </div>

                    <!-- Visión Card (Full width of the left column) -->
                    <div class="about-card">
                        <div class="d-flex align-items-center mb-4">
                            <div class="about-icon">
                                <span class="material-symbols-outlined">moving</span>
                            </div>
                            <h3>Nuestra Visión</h3>
                        </div>
                        <p>
                            Nuestra visión en Servicel es liderar el mercado de alquiler de maquinaria pesada
                            y servicios de terracería, siendo reconocidos como el socio de confianza para la
                            realización de proyectos de ingeniería civil en toda nuestra región. Buscamos
                            expandir nuestra presencia y diversificar nuestros servicios para abarcar nuevos
                            mercados y sectores, manteniendo siempre el más alto nivel de calidad y
                            profesionalismo.
                        </p>
                    </div>
                </div>

                <!-- Right Column: Video Showcase -->
                <div class="col-12 col-lg-5 ps-lg-4">
                    <div class="h-100 rounded-4 overflow-hidden shadow-sm" style="min-height: 450px;">
                        <video class="video-fluid w-100 h-100" style="object-fit: cover;" src="/video/excavadora.mp4" muted
                            autoplay loop loading="lazy"></video>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!--Nuestro equipo-->
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h2 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestro Equipo</h2>
        </div>
    </div>
    
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div id="carouselElSalvadorCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/EquipoElSalvador.webp" class=" w-100 img-carrusel"
                                alt="Personal servicel El Salvador">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">EL SALVADOR</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/img/tierraBlancaElSalvador.webp" class=" w-100 img-carrusel"
                                alt="Tierras Blancas, Santa Ana.">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">EL SALVADOR</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselElSalvadorCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselElSalvadorCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-6 mt-4 mt-lg-0">
                <div id="carouselGuatemalaCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/guate2.jpeg" class=" w-100 img-carrusel" alt="...">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">GUATEMALA</h5>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/img/guatemala2.webp" class=" w-100 img-carrusel" alt="...">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">GUATEMALA</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGuatemalaCaptions"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGuatemalaCaptions"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
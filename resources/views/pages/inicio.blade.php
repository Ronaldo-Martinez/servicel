@extends('pages.base')

@section('content')
<header class="header content" id="header">
    <div class="header-video">
        <video src="/video/headerInicio.mp4" muted autoplay loop loading="lazy"></video>
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
<!--Introducción-->
<article>
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h1 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif; font-size: 1.8rem; line-height: 1.3;">SERVICEL ALQUILER DE MAQUINARIA PESADA Y SERVICIOS DE INGENIERÍA CIVIL Y ELÉCTRICA</h1>
        </div>
    </div>
    <div class="container my-5">
        <div class="row align-items-center">
            <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                <video class="video-col w-100 rounded-4 shadow-sm" src="/video/video2.mp4" muted autoplay loop loading="lazy"></video>
            </div>
            <div class="col-12 col-lg-6 align-items-center justify-content-center d-flex flex-column texto fs-5">
                <p>
                Servicel es la opción líder en alquiler de maquinaria pesada y servicios de terracería con una destacada 
                trayectoria de {{ date('Y') - 1993 }} años en el mercado. Somos especialistas en proporcionar soluciones integrales 
                para proyectos de construcción y terracería, con un enfoque inigualable en el alquiler de maquinaria 
                de última generación.
                </p>
                <p class="mb-0">
                Nuestra amplia flota de maquinaria pesada y equipos de primera categoría, combinada con 
                la experiencia de nuestro equipo altamente capacitado, garantiza la ejecución impecable 
                de proyectos de cualquier magnitud. Desde excavadoras, retroexcavadoras, tractores, 
                cargadores frontales y motoniveladoras hasta montacargas y miniexcavadoras,
                disponemos de todo lo necesario para llevar a cabo con éxito proyectos desafiantes y complejos para nuestros clientes.
                </p>
            </div>
        </div>
    </div>
</article>
<!--Nuestros servicios-->
<article>
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h2 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestros Servicios</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-3 pt-3">
                <a class="card card-effect text-decoration-none" href="#maquinaria">
                    <div class="img-card-alquiler"></div>
                    <div class="card-body btn btn-secondary text-white card-bottom">
                        <h3 class="fs-6 fw-bold">ALQUILER DE MAQUINARIA</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 pt-3">
                <a class="card card-effect text-decoration-none" href="{{ route('servicios') }}/#terraceria">
                <div class="img-card-terraceria"></div>
                    <div class="card-body btn btn-warning text-secondary card-bottom">
                        <h3 class="fs-6 fw-bold">SERVICIOS DE TERRACERÍA</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 pt-3">
                <a class="card card-effect text-decoration-none" href="{{ route('servicios') }}/#agroIndustria">
                    <div class="img-card-agroindustria"></div>
                    <div class="card-body btn btn-secondary text-white card-bottom">
                        <h3 class="fs-6 fw-bold">SERVICIOS DE AGROINDUSTRIA</h3>
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-6 col-lg-3 pt-3">
                <a class="card card-effect text-decoration-none" href="{{ route('servicios') }}/#venta">
                <div class="img-card-tierra-blanca"></div>
                    <div class="card-body btn btn-warning text-secondary card-bottom">
                        <h3 class="fs-6 fw-bold">VENTA DE TIERRA BLANCA</h3>
                    </div>
                </a>
            </div>
        </div>
    </div>
</article>
<!--Nuestra maquinaria-->
<div id="maquinaria">
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h2 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestra Maquinaria</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row g-4">
            <div class="col-12 col-lg-8">
                <div class="premium-gallery-card gallery-card-lg" data-bs-toggle="modal" data-bs-target="#modal-excavadoras" style="cursor: pointer;">
                    <div class="gallery-badge">
                        <span class="material-symbols-outlined">construction</span>
                        <span>Pesada</span>
                    </div>
                    <img class="card-img" src="/img/excavadora2.webp" alt="retroexcavadora servicel" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-category">
                            <span>Excavadoras</span>
                            <span class="material-symbols-outlined text-warning fs-3">arrow_forward</span>
                        </div>
                        <div class="gallery-action-text">
                            Ver Alquiler <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4 d-flex flex-column justify-content-between">
                <div class="premium-gallery-card gallery-card-sm mb-4 mb-lg-0" data-bs-toggle="modal" data-bs-target="#modal-retroexcavadora" style="cursor: pointer;">
                    <div class="gallery-badge">
                        <span class="material-symbols-outlined">engineering</span>
                        <span>Versátil</span>
                    </div>
                    <img class="card-img" src="/img/retroexcavadora.webp" alt="montacargas servicel" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-category">
                            <span>Retroexcavadoras</span>
                            <span class="material-symbols-outlined text-warning fs-3">arrow_forward</span>
                        </div>
                        <div class="gallery-action-text">
                            Ver Alquiler <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
                
                <div class="premium-gallery-card gallery-card-sm" data-bs-toggle="modal" data-bs-target="#modal-motoniveladoras" style="cursor: pointer;">
                    <div class="gallery-badge">
                        <span class="material-symbols-outlined">precision_manufacturing</span>
                        <span>Precisión</span>
                    </div>
                    <img class="card-img" src="/img/motoniveladora.webp" alt="motoniveladora servicel" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-category">
                            <span>Motoniveladoras</span>
                            <span class="material-symbols-outlined text-warning fs-3">arrow_forward</span>
                        </div>
                        <div class="gallery-action-text">
                            Ver Alquiler <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">           
                <div class="premium-gallery-card gallery-card-sm" data-bs-toggle="modal" data-bs-target="#modal-tractores" style="cursor: pointer;">
                    <div class="gallery-badge">
                        <span class="material-symbols-outlined">agriculture</span>
                        <span>Potencia</span>
                    </div>
                    <img class="card-img" src="/img/tractores.webp" alt="motoniveladora servicel" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-category">
                            <span>Tractores</span>
                            <span class="material-symbols-outlined text-warning fs-3">arrow_forward</span>
                        </div>
                        <div class="gallery-action-text">
                            Ver Alquiler <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-6">           
                <div class="premium-gallery-card gallery-card-sm" data-bs-toggle="modal" data-bs-target="#modal-miniexcavadoras" style="cursor: pointer;">
                    <div class="gallery-badge">
                        <span class="material-symbols-outlined">hardware</span>
                        <span>Compacta</span>
                    </div>
                    <img class="card-img" src="/img/miniexcavadoras.webp" alt="miniexcavadoras servicel" loading="lazy">
                    <div class="gallery-overlay">
                        <div class="gallery-category">
                            <span>Miniexcavadoras</span>
                            <span class="material-symbols-outlined text-warning fs-3">arrow_forward</span>
                        </div>
                        <div class="gallery-action-text">
                            Ver Alquiler <span class="material-symbols-outlined">chevron_right</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Seccion nuestros clientes-->
<div>
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h2 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestros Clientes</h2>
        </div>
    </div>
    <div class="container my-5">
        <article class="text-center px-3">
            <p class="fs-4">
                A lo largo de su historia, la compañía ha logrado una amplia gama de clientes que 
                incluyen organismos internacionales, sector publico y empresas privadas; demostrando 
                competencia técnica y versatilidad en la ejecución, basándonos en valores de 
                <span class="fw-bold">CALIDAD Y PUNTUALIDAD.</span>
            </p>
            <div>
                <img class="img-nosotros" src="/logo1.webp" alt="Logo servicel">
            </div>
        </article>
    </div>
</div>
<!--Sección Ubicaciones-->
<div>
    <div class="bg-secondary text-white text-center p-4">
        <div class="container">
            <h2 class="fw-bold text-uppercase m-0" style="letter-spacing: 1px; font-family: 'Lexend', sans-serif;">Nuestras Ubicaciones Geográficas</h2>
        </div>
    </div>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <h3 class="fw-bold text-warning bg-secondary fs-4 text-center">El Salvador</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d969.2171858308552!2d-89.28018473048105!3d13.665744202309032!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDM5JzU2LjciTiA4OcKwMTYnNDYuNCJX!5e0!3m2!1ses!2ssv!4v1691469682252!5m2!1ses!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="d-flex align-items-center justify-content-center pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                    <span class="material-symbols-outlined text-secondary">
                        location_on
                    </span>Santa Tecla, La Libertad
                </div>
                <a class="d-flex align-items-center justify-content-center pt-3 fs-5 fw-bold text-secondary text-decoration-none" href="tel:+50322882451"> 
                    <span class="material-symbols-outlined text-secondary">
                        call
                    </span>+ 503 2288 - 2451
                </a>
            </div>
            <div class="col-12 col-lg-6 mt-5 mt-lg-0">
                <h3 class="fw-bold text-warning bg-secondary fs-4 text-center">Guatemala</h3>
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1933.7350366547232!2d-90.73635650632048!3d14.225778619049937!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8588fcdd5acf3b99%3A0x42843213332f485b!2sParque%20Industrial%20Tecnopark!5e0!3m2!1ses!2ssv!4v1691471069036!5m2!1ses!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
                <div class="d-flex align-items-center justify-content-center pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                    <span class="material-symbols-outlined text-secondary">
                        location_on
                    </span>Escuintla, Guatemala.
                </div>
                <a class="d-flex align-items-center justify-content-center pt-3 fs-5 fw-bold text-secondary text-decoration-none" href="tel:+50254674528"> 
                    <span class="material-symbols-outlined text-secondary">
                        call
                    </span>+ 502 5467 - 4528
                </a>
            </div>
        </div>
    </div>
</div>
<!--Modales-->
<div class="modal fade country-select-modal" id="modal-excavadoras" tabindex="-1" aria-labelledby="modal-excavadoras-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="modal-excavadoras-Label">Seleccione su país</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-sv-categoria', ['id' => 1]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/sv-flag.webp" alt="Bandera de El Salvador">
                            </div>
                            <h4 class="country-name">El Salvador</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-gt-categoria', ['id' => 1]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/gt-flag.webp" alt="Bandera de Guatemala">
                            </div>
                            <h4 class="country-name">Guatemala</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade country-select-modal" id="modal-motoniveladoras" tabindex="-1" aria-labelledby="modal-motoniveladoras-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="modal-motoniveladoras-Label">Seleccione su país</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-sv-categoria', ['id' => 3]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/sv-flag.webp" alt="Bandera de El Salvador">
                            </div>
                            <h4 class="country-name">El Salvador</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-gt-categoria', ['id' => 3]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/gt-flag.webp" alt="Bandera de Guatemala">
                            </div>
                            <h4 class="country-name">Guatemala</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade country-select-modal" id="modal-retroexcavadora" tabindex="-1" aria-labelledby="modal-retroexcavadora-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="modal-retroexcavadora-Label">Seleccione su país</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-sv-categoria', ['id' => 5]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/sv-flag.webp" alt="Bandera de El Salvador">
                            </div>
                            <h4 class="country-name">El Salvador</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-gt-categoria', ['id' => 5]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/gt-flag.webp" alt="Bandera de Guatemala">
                            </div>
                            <h4 class="country-name">Guatemala</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade country-select-modal" id="modal-tractores" tabindex="-1" aria-labelledby="modal-tractores-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="modal-tractores-Label">Seleccione su país</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-sv-categoria', ['id' => 2]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/sv-flag.webp" alt="Bandera de El Salvador">
                            </div>
                            <h4 class="country-name">El Salvador</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-gt-categoria', ['id' => 2]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/gt-flag.webp" alt="Bandera de Guatemala">
                            </div>
                            <h4 class="country-name">Guatemala</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade country-select-modal" id="modal-miniexcavadoras" tabindex="-1" aria-labelledby="modal-miniexcavadoras-Label" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h3 class="modal-title text-white" id="modal-miniexcavadoras-Label">Seleccione su país</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4 p-md-5">
                <div class="row g-4">
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-sv-categoria', ['id' => 6]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/sv-flag.webp" alt="Bandera de El Salvador">
                            </div>
                            <h4 class="country-name">El Salvador</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-12 col-md-6">
                        <a href="{{ route('alquiler-gt-categoria', ['id' => 6]) }}/#maquinas" class="country-select-card">
                            <div class="country-flag-wrapper">
                                <img src="/img/gt-flag.webp" alt="Bandera de Guatemala">
                            </div>
                            <h4 class="country-name">Guatemala</h4>
                            <div class="country-action-badge">
                                <span>Seleccionar</span>
                                <span class="material-symbols-outlined">chevron_right</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

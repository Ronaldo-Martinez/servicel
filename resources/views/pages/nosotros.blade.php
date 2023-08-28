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
    </header>
    
    <!--Misión y Visión-->
    <div class="container-fluid ">
        <div class="row p-0">
            <div class="col-12 col-lg-7 p-0">
                <div class="figura mt-3 bg-secondary me-5 sombra-titulo">
                    <div class="me-4">
                        <h1 class="text-white ps-5 pe-5 py-4 texto">
                            MISIÓN Y VISIÓN DE SERVICEL
                        </h1>
                    </div>
                </div>
                <h2 class="d-flex align-items-center justify-content-start ps-5 pt-3  fw-bold text-secondary "> 
                    <span class="material-symbols-outlined text-secondary pe-3">
                        target
                    </span>MISIÓN
                </h2>
                <div class="figura mt-3 bg-secondary me-5 ">
                    <div class="me-4">
                        <div class="text-white ps-5 pe-5 py-4 texto">
                            En Servicel, nuestra misión es ser el referente indiscutible en el sector de 
                            alquiler de maquinaria pesada y servicios de terracería, ofreciendo soluciones 
                            integrales y personalizadas para proyectos de construcción, obras civiles y 
                            agroindustria. Con una dedicación inquebrantable hacia la excelencia y la 
                            satisfacción del cliente, nos comprometemos a brindar servicios de primera 
                            categoría, respaldados por nuestros 30 años  de experiencia en el mercado.
                        </div>
                    </div>
                </div>
                <h2 class="d-flex align-items-center justify-content-start ps-5 pt-3  fw-bold text-secondary "> 
                    <span class="material-symbols-outlined text-secondary pe-3">
                        moving
                    </span>VISIÓN
                </h2>
                <div class="figura mt-3 mb-4 bg-secondary me-5 ">
                    <div class="me-4">
                        <div class="text-white ps-5 pe-5 py-4 texto">
                            Nuestra visión en Servicel es liderar el mercado de alquiler de maquinaria pesada 
                            y servicios de terracería, siendo reconocidos como el socio de confianza para la 
                            realización de proyectos de ingeniería civil en toda nuestra región. Buscamos 
                            expandir nuestra presencia y diversificar nuestros servicios para abarcar nuevos 
                            mercados y sectores, manteniendo siempre el más alto nivel de calidad y 
                            profesionalismo.”
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5 p-0">
                    <video class="video-fluid" src="/video/excavadora.mp4" muted autoplay loop loading="lazy"></video>
            </div>
        </div>
    </div>
    <!--Nuestro equipo-->
    <div class="bg-secondary text-white text-center p-3 px-5">
        <h2 class="fw-bold">NUESTRO EQUIPO</h2>
    </div>
    <div class="container-fluid p-5">
        <div class="row">
            <div class="col-12 col-lg-6">
                <div id="carouselElSalvadorCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/img/EquipoElSalvador.webp" class=" w-100 img-carrusel" alt="Personal servicel El Salvador">
                        <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                            <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">EL SALVADOR</h5>
                        </div>
                        </div>
                        <div class="carousel-item">
                            <img src="/img/tierraBlancaElSalvador.webp" class=" w-100 img-carrusel" alt="Tierras Blancas, Santa Ana.">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">EL SALVADOR</h5>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselElSalvadorCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselElSalvadorCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div id="carouselGuatemalaCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="/img/guatemala2.webp" class=" w-100 img-carrusel" alt="...">
                            <div class="card-img-overlay-custom rounded-0 d-none d-md-block bg-overlay ">
                                <h5 class="text-center text-secondary p-2 fs-3 sombra-titulo fw-bold ">GUATEMALA</h5>              
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselGuatemalaCaptions" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselGuatemalaCaptions" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
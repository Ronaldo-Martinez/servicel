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
</header>
<div id="Servicios">
    <div class="bg-secondary text-white text-center p-3 px-5">
        <h1 class="fw-bold" id="terraceria">NUESTROS SERVICIOS</h1>
    </div>
    
    <!--Terraceria-->
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-md-6 col-lg-8">
                <div class="figura mt-3 bg-secondary sombra-titulo">
                    <div class="me-4">
                        <h2 class="text-white ps-5 pe-5 py-4 texto">
                            SERVICIOS DE TERRACERIA
                        </h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Movimientos masivos de tierra.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Diseños de terraza.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Cortes y rellenos estructurales.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Estabilización de suelos.
                        </p>
                    </div>
                    <div class="col-12 col-lg-6">
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Terraplenes.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning">
                                check_circle
                            </span>Calles y accesos.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning" >
                                check_circle
                            </span>Obras de mitigación.
                        </p>
                        <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold text-secondary" href="tel:+50322882451"> 
                            <span class="material-symbols-outlined text-warning" id="agroIndustria">
                                check_circle
                            </span>Topografía.
                        </p>
                    </div>
                </div>      
            </div>
            <div class="col-12 col-md-6 col-lg-4 d-none d-sm-block d-sm-none d-md-block">
                <div id="carouselTerraceriaCaptions" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/img/terraceria.webp" class=" w-100 img-carrusel" alt="Servicios de Terraceria Servicel">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/terraceria2.webp" class=" w-100 img-carrusel" alt="maquinaria aplanado terreno">
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
    <!--AgroIndustria-->
    <div class="container-fluid bg-secondary my-4">
        <div class="row p-0">
            <div class="col-12 col-md-6 col-lg-4 p-0 d-none d-sm-block d-sm-none d-md-block">
                <div id="carouselAgroIndustriaCaptions" class="carousel slide figura" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                        <img src="/img/agro1.webp" class=" w-100 img-carrusel" alt="Servicios de Agroindustria Servicel">
                        </div>
                        <div class="carousel-item">
                            <img src="/img/agro2.webp" class=" w-100 img-carrusel" alt="maquinaria preparando terreno para cultivo terreno">
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
            <div class="col-12 col-md-6 col-lg-8 p-0">
                <div class="figura-ii mt-3 ms-5 bg-white sombra-titulo">
                    <div class="me-4">
                        <h2 class="text-secondary ps-5 pe-5 py-4 texto text-end">
                            SERVICIOS DE AGROINDUSTRIA
                        </h2>
                    </div>
                </div>
                <div class="container ps-4 pe-4">
                    <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                        <span class="material-symbols-outlined text-warning me-3">
                            check_circle
                        </span>
                        Preparación de suelos para siembra: Plantación nueva, finca nueva de caña de azúcar, banano, palma africana y fincas de cafe.
                    </p>
                    <div class="me-4 row">
                        <div class="col-12 col-lg-6">
                            <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                                <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>
                                Apertura y mantenimiento de accesos.
                            </p>
                            <p class="d-flex align-items-center justify-content-end pt-3 fs-5 text-white"> 
                                <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>    
                                Apertura y Mantenimiento de obras y drenajes.
                            </p>
                            <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                                <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>
                                Obras para control de inundaciones.
                            </p>
                        </div>
                        <div class="col-12 col-lg-6">
                            <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                                <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>
                                Desolve de ríos y quebradas.
                            </p>
                            <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                               <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>
                                Apertura y mantenimiento de estanques de acuicultura para camarón y tilapia.
                            </p>
                            <p class="d-flex align-items-center justify-content-start pt-3 fs-5 text-white"> 
                                <span class="material-symbols-outlined text-warning me-3">
                                    check_circle
                                </span>
                                Conformación de bordas dentro de fincas.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Tierra Blanca-->
    <div class="container-fluid my-4">
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="figura mt-3 bg-secondary sombra-titulo">
                    <div class="me-4">
                        <h2 class="text-white ps-5 pe-5 py-4 texto">
                            VENTA DE TIERRA BLANCA
                        </h2>
                    </div>
                </div>
                <p class="d-flex align-items-center justify-content-start pt-3 fs-5 fw-bold texto text-secondary"> 
                    En El Salvador, nos enorgullecemos de ofrecer un servicio integral de venta 
                    de tierra blanca, respaldado por todos los permisos de ley vigentes. Nuestra 
                    dedicación a la legalidad y la transparencia nos distingue como proveedores 
                    confiables en el mercado de suministro de tierra blanca.
                </p>  
            </div>
            <div class="col-12 col-md-6">
                <div class="map-container">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d1725.5353587895513!2d-89.46547453506611!3d13.857284946733857!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMTPCsDUxJzI2LjQiTiA4OcKwMjcnNTQuMCJX!5e0!3m2!1ses!2ssv!4v1691524711856!5m2!1ses!2ssv" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>           
            </div>
        </div>
    </div>
</div>



@endsection

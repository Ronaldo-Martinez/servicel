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
</header>
<!--Introducción-->
<article>
    <div class="bg-secondary text-white text-center p-3 px-5">
        <h1 class="fw-bold">SERVICEL ALQUILER DE MAQUINARIA PESADA Y SERVICIOS DE INGENIERÍA CIVIL Y ELÉCTRICA</h1>
    </div>
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-12 col-lg-6">
                <video class="video-col" src="/video/video2.mp4" muted autoplay loop loading="lazy"></video>
            </div>
            <div class="col-12 col-lg-6 align-items-center justify-content-center d-flex flex-column texto fs-5">
                <p>
                Servicel es la opción líder en alquiler de maquinaria pesada y servicios de terracería con una destacada 
                trayectoria de {{ date('Y') - 1993 }} años en el mercado. Somos especialistas en proporcionar soluciones integrales 
                para proyectos de construcción y terracería, con un enfoque inigualable en el alquiler de maquinaria 
                de última generación.
                </p>
                <p>
                Nuestra amplia flota de maquinaria pesada y equipos de primera categoría, combinada con 
                la experiencia de nuestro equipo altamente capacitado, garantiza la ejecución impecable 
                de proyectos de cualquier magnitud. desde excavadoras, retroexcavadoras, tractores, 
                cargadores frontales y motoniveladoras hasta montacargas y miniexcavadoras,
                disponemos de todo lo necesario para llevar a cabo con éxito proyectos desafiantes y complejos.
                </p>
            </div>
        </div>
    </div>
</article>
<!--Nuestros servicios-->
<article>
    <div class="bg-secondary text-white text-center p-3 mb-4 px-5">
        <h2 class="fw-bold">NUESTROS SERVICIOS</h2>
    </div>
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-6 col-lg-3 pt-3">
                <div class="card card-effect">
                    <img src="/img/excavadora.webp" class="card-img-top img-card" alt="excavadora servicel" loading="lazy">
                    <div class="card-body btn btn-secondary text-white card-bottom">
                        <h3 class="fs-5 fw-bold">ALQUILER DE MAQUINARIA</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 pt-3">
                <div class="card card-effect">
                    <img src="/img/bulldozer.webp" class="card-img-top img-card" alt="bulldozer terracería servicel" loading="lazy">
                    <div class="card-body btn btn-warning text-secondary card-bottom">
                        <h3 class="fs-5 fw-bold">SERVICIOS DE TERRACERÍA</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 pt-3">
                <div class="card card-effect">
                    <img src="/img/tractor.webp" class="card-img-top img-card" alt="tractor servicel" loading="lazy">
                    <div class="card-body btn btn-secondary text-white card-bottom">
                        <h3 class="fs-5 fw-bold">SERVICIOS DE AGROINDUSTRIA</h3>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 pt-3">
                <div class="card card-effect">
                    <img src="/img/tierra_blanca.webp" class="card-img-top img-card" alt="Tierra blanca servicel" loading="lazy">
                    <div class="card-body btn btn-warning text-secondary card-bottom">
                        <h3 class="fs-5 fw-bold">VENTA DE TIERRA BLANCA</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>
<!--Nuestra maquinaria-->
<div>
    <div class="bg-secondary text-white text-center p-3 mt-4 mb-3 px-5">
        <h2 class="fw-bold">NUESTRA MAQUINARIA</h2>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-lg-8">
                <div class="card zoom-container mt-3" style="max-height: 80vh;">
                    <img class="card-img zoom" src="/img/retroexcavadora.webp" alt="retroexcavadora servicel" loading="lazy">
                    <div class="card-img-overlay-custom">
                        <div class="container row">
                            <div class="col-6 bg-white d-grid gap-2 p-0">
                                <a class="btn btn-outline-secondary rounded-0 fs-4" href="#">Excavadoras</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card zoom-container mt-3" style="max-height: 39vh;">
                    <img class="card-img zoom" src="/img/montacargas.webp" alt="montacargas servicel" loading="lazy">
                    <div class="card-img-overlay-custom">
                        <div class="container row">
                            <div class="col-6 bg-white d-grid gap-2 p-0">
                                <a class="btn btn-outline-secondary rounded-0 fs-4" href="#">Montacargas</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card zoom-container mt-3" style="max-height: 39vh;">
                    <img class="card-img zoom" src="/img/motoniveladora.webp" alt="motoniveladora servicel" loading="lazy">
                    <div class="card-img-overlay-custom">
                        <div class="container row">
                            <div class="col-6 bg-white d-grid gap-2 p-0">
                                <a class="btn btn-outline-secondary rounded-0 fs-4" href="#">Motoniveladoras</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Seccion nuestros clientes-->
<div>
    <div class="bg-secondary text-white text-center p-3 my-5 px-5">
        <h2 class="fw-bold">NUESTROS CLIENTES</h2>
    </div>
    <article class="text-center px-4">
        <p class="fs-4">
            A lo largo de su historia, la compañía ha logrado una amplia gama de clientes que 
            incluyen organismos internacionales, sector publico y empresas privadas; demostrando 
            competencia técnica y versatilidad en la ejecución, basándonos en valores de 
            <span class="fw-bold">CALIDAD Y PUNTUALIDAD.</span>
        </p>
        <div class="header-content">
            <img src="/logo2.webp" alt="Logo servicel">
        </div>
    </article>
</div>
<!--Sección Ubicaciones-->
<div>
    <div class="bg-secondary text-white text-center p-3 my-5 px-5">
        <h2 class="fw-bold">NUESTRAS UBICACIONES GEOGRÁFICAS</h2>
    </div>
    <div class="container-fluid my-3">
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
            <div class="col-12 col-lg-6">
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

@endsection

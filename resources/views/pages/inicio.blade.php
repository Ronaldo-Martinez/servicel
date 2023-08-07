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
                                <a class="btn btn-outline-secondary rounded-0 fs-4" href="#">Excavadoras</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card zoom-container mt-3" style="max-height: 39vh;">
                    <img class="card-img zoom" src="/img/motoniveladora.webp" alt="motoniveladora servicel" loading="lazy">
                    <div class="card-img-overlay-custom">
                        <div class="container row">
                            <div class="col-6 bg-white d-grid gap-2 p-0">
                                <a class="btn btn-outline-secondary rounded-0 fs-4" href="#">Excavadoras</a>
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

@endsection

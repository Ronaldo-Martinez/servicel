@extends('pages.base')

@section('content')
<header class="header content">
    <div class="header-video">
        <video src="/video/headerInicio.mp4" muted autoplay loop loading="lazy"></video>
    </div>
    <div class="header-overlay"></div>
    <div class="header-content">
        <img src="/logo2.webp" alt="Logo servicel">
    </div>
</header>
<article>
    <div class="bg-secondary text-white text-center p-3 px-5">
        <h1 class="fw-bold">SERVICEL ALQUILER DE MAQUINARIA PESADA Y SERVICIOS DE INGENIERÍA CIVIL Y ELÉCTRICA</h1>
    </div>
    <div class="container-fluid pt-2">
        <div class="row">
            <div class="col-6">
                <video src="/video/video2.mp4" muted autoplay loop loading="lazy"></video>
            </div>
            <div class="col-6 align-items-center justify-content-center row">
                <p class="fs-5 texto">
                Servicel es la opción líder en alquiler de maquinaria pesada y servicios de terracería con una destacada 
                trayectoria de {{ date('Y') - 1993 }} años en el mercado. Somos especialistas en proporcionar soluciones integrales 
                para proyectos de construcción y terracería, con un enfoque inigualable en el alquiler de maquinaria 
                de última generación.
                </p>
                <p class="fs-5 texto">
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


@endsection

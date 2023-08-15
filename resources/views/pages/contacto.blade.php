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
    </header>
    
    <!--Sección Ubicaciones-->
    <div>
        <div class="bg-secondary text-white text-center p-3 px-5">
            <h2 class="fw-bold">NUESTRAS UBICACIONES GEOGRÁFICAS</h2>
        </div>
        <div class="container-fluid my-5">
            <div class="row px-4">
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
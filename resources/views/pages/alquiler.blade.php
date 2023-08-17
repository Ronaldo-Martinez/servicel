@extends('pages.base')

@section('content')
    <header class="header content-contacto" id="header">
        <div class="header-video">
            <video src="/video/headerAlquiler.mp4" muted autoplay loop loading="lazy"></video>
        </div>
        <div class="header-overlay"></div>
        <div class="header-content">
            <img src="/logo2.webp" alt="Logo servicel">
        </div>
    </header>
    
    <!--Sección Alquiler-->
    <div>
        <div class="bg-secondary text-white text-center p-3 px-5">
            <h2 class="fw-bold">ALQUILER DE MAQUINARIA EN {{ $pais }}</h2>
        </div>
        <div class="container-fluid my-5">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <ul class="list-group">
                        <li class="btn btn-outline-secondary rounded-0 bg-secondary text-white" aria-current="true">Categorias</li>
                        @foreach($tiposMaquinaria as $tipo)
                            <a class="btn btn-outline-secondary rounded-0">{{$tipo->nombre}}</a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-lg-9">
                    
                </div>
            </div>
        </div>
        
    </div>

@endsection
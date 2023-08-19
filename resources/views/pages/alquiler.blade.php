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
            <h2 class="fw-bold text-uppercase">{{$titulo}}</h2>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-lg-3">
                    <ul class="list-group mt-3">
                        <li class="btn btn-outline-secondary rounded-0 bg-secondary text-white" aria-current="true">Categorias</li>
                        @foreach($tiposMaquinaria as $tipo)
                            <a class="btn btn-outline-secondary rounded-0" href="{{ route('alquiler-sv-categoria', ['id' => $tipo->id]) }}">{{$tipo->nombre}}</a>
                        @endforeach
                    </ul>
                </div>
                <div class="col-12 col-lg-9">
                    <div class="row">
                    @foreach($maquinas as $maquina)
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-effect mt-3">
                                <div class="card m-0 p-0">
                                    <img src="/storage/{{ $maquina->imagens->first()->url }}" class="card-img-top img-card" alt="...">
                                    <div class="card-img-overlay">
                                        <img class="icon" src="/img/sv.webp" alt="whatsapp Icon" target="_blank">
                                    </div>
                                </div>
                                <div class="card-body bg-white">
                                    <h5 class="card-title fw-bold">{{ $maquina->marca }} {{$maquina->modelo}}</h5>
                                    <p class="card-text">{{$maquina->tipoMaquina->nombre}}</p>
                                    <a 
                                        class="d-flex align-items-center justify-content-center fw-bold btn btn-outline-secondary" 
                                        href="https://web.whatsapp.com/send?phone={{$maquina->pais->codigo_pais}}{{$maquina->pais->numero_telefono}}&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A+-+La+Maquina+*{{ $maquina->marca }}*+{{$maquina->modelo}}+%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+"
                                        target="_blank"
                                        > 
                                        <img class="icon-cotizar" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">Consultar
                                    </a>
                                    <a href="" class="d-flex justify-content-center btn btn-warning mt-3">Ver Mas</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {{ $maquinas->links() }}
                </div>
            </div>
        </div>
        
    </div>

@endsection
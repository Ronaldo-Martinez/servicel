@extends('pages.base')

@section('content')
    <!--Header-->
    <div class="container pt-4">
        <div class="mt-5">
            <div class="row py-1">
                <div class="col-12 col-md-6 py-3">
                    <div id="carouselMaquina" class="carousel slide">
                        <div class="carousel-indicators">
                            @foreach($maquina->imagens as $index => $imagen)
                            <button type="button" data-bs-target="#carouselMaquina" data-bs-slide-to="{{$index}}" {{ $index === 0 ? "class=active aria-current=true" : '' }} aria-label="Slide {{$index}}"></button>
                            @endforeach
                        </div>
                        <div class="carousel-inner">
                        @foreach($maquina->imagens as $index => $imagen)

                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <div class="product">
                                    <div class="product-image">
                                    <img src="/storage/{{$imagen->url}}" class="d-block w-100 img-carrusel" alt="...">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselMaquina" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselMaquina" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div class="col-12 col-md-6 py-3">
                    <h1 class="fw-bold text-secondary text-uppercase">{{$maquina->marca}} {{$maquina->modelo}}</h1>
                    <p class="fs-5 text-primary pt-4"><span class="fw-bold">Tipo de Maquina:</span> {{$maquina->tipoMaquina->nombre}}</p>
                    <p class="fs-5 text-primary m-0"><span class="fw-bold">Marca:</span> {{$maquina->marca}}</p>
                    <p class="fs-5 text-primary m-0"><span class="fw-bold">Modelo:</span> {{$maquina->modelo}}</p>
                    <p class="fs-5 text-primary m-0"><span class="fw-bold">País:</span> {{$maquina->pais->nombre}}</p>
                    <div class="row py-3">
                        <div class="col-12 col-lg-6">
                            <a 
                                class="d-flex align-items-center justify-content-center fw-bold btn btn-secondary" 
                                href="https://web.whatsapp.com/send?phone={{$maquina->pais->codigo_pais}}{{$maquina->pais->numero_telefono}}&text=+Hola+quiero+mas+informaci%C3%B3n+con+respecto+a%3A%0D%0A%0D%0A+-+La+Maquina+*{{ $maquina->marca }}*+{{$maquina->modelo}}+%0A%0D%0A%2ALa+siguiente+URL%3A%2A+http%3A%2F%2F+"
                                target="_blank"
                                > 
                                <img class="icon-cotizar" src="/img/whatsapp1.webp" alt="whatsapp Icon" target="_blank">Consultar
                            </a>
                            @if ($maquina->pais->codigo_pais == '503')
                                <a class="d-flex justify-content-center btn btn-outline-secondary mt-3" href="{{ route('alquiler-sv-categoria', ['id' => $maquina->tipoMaquina->id]) }}/#maquinas">Otras {{$maquina->tipoMaquina->nombre}}</a>
                            @else
                                <a class="d-flex justify-content-center btn btn-outline-secondary mt-3" href="{{ route('alquiler-gt-categoria', ['id' => $maquina->tipoMaquina->id]) }}/#maquinas">Otras {{$maquina->tipoMaquina->nombre}}</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 py-3">
                    <div class="table-responsive">
                        <div class="bg-secondary text-white text-center py-2">
                            <h2 class="fw-bold fs-5 m-0">Ficha Técnica</h2>
                        </div>
                        <table id="caracteristicasTable" class="table table-hover">
                            <tbody>
                            @foreach($maquina->caracteristicas as $caracteristica)
                                <tr>
                                    <td>
                                        {{$caracteristica->caracteristica}}
                                    </td>
                                    <td>
                                        {{$caracteristica->valor}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
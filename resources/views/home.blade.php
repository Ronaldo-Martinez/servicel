@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">Maquinaria en El Salvador</div>

                <div class="card-body">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="card">
                <div class="card-header">Maquinaria en Guatemala</div>
                <div class="card-body">
                    <div>
                        <canvas id="myChart-guate"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('myChart');
        const ctx_guate = document.getElementById('myChart-guate');
        new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels: [
                @foreach($conteoMaquinasElSalvador as $data)
                    '{{ $data->tipoMaquina->nombre }}',
                @endforeach
            ],
            datasets: [{
                label: 'Cantidad',
                data: [
                @foreach($conteoMaquinasElSalvador as $data)
                    '{{ $data->total }}',
                @endforeach
                ],
                borderWidth: 1
            }]
            },
            options: {
            
            }
        });

        new Chart(ctx_guate, {
            type: 'doughnut',
            data: {
            labels: [
                @foreach($conteoMaquinasGuatemala as $data)
                    '{{ $data->tipoMaquina->nombre }}',
                @endforeach
            ],
            datasets: [{
                label: 'Cantidad',
                data: [
                @foreach($conteoMaquinasGuatemala as $data)
                    '{{ $data->total }}',
                @endforeach
                ],
                borderWidth: 1
            }]
            },
            options: {
            
            }
        });
    });
</script>
@endsection

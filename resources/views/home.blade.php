@extends('layouts.app')

@section('content')
<div class="container py-3">
    <!-- Banner de Bienvenida y Acciones Rápidas -->
    <div class="dash-welcome-card mb-4">
        <div class="row align-items-center g-3">
            <div class="col-12 col-lg-7">
                <div class="d-flex align-items-center gap-2 mb-2">
                    <span class="dash-badge">Panel de Administración</span>
                    <span class="dash-badge-date d-none d-sm-inline">
                        <x-icon name="schedule" class="me-1" />
                        {{ now()->format('d/m/Y') }}
                    </span>
                </div>
                <h1 class="dash-greeting">¡Hola, {{ Auth::user()->name ?? 'Administrador' }}!</h1>
                <p class="dash-subtitle">Bienvenido a la gestión operativa y control de flota de maquinaria de Servicel.</p>
            </div>
            <div class="col-12 col-lg-5 text-lg-end">
                <div class="d-flex gap-2 justify-content-lg-end flex-wrap">
                    <a href="{{ route('maquinas.create') }}" class="btn-dash-primary">
                        <x-icon name="add" />
                        <span>Nueva Máquina</span>
                    </a>
                    <a href="{{ route('maquinas.index') }}" class="btn-dash-secondary">
                        <x-icon name="grid_view" />
                        <span>Inventario</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Tarjetas de Métricas KPI -->
    <div class="row g-3 mb-4">
        <!-- KPI 1: Flota Total -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-navy">
                    <x-icon name="construction" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Flota Total</span>
                    <h2 class="kpi-value">{{ $totalMaquinas }}</h2>
                    <span class="kpi-subtext">Unidades registradas</span>
                </div>
            </div>
        </div>

        <!-- KPI 2: El Salvador -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper p-0 overflow-hidden border-yellow">
                    <img src="{{ asset('img/sv.webp') }}" alt="El Salvador" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">El Salvador</span>
                    <h2 class="kpi-value">{{ $totalMaquinasSV }}</h2>
                    <span class="kpi-subtext">Santa Tecla, La Libertad</span>
                </div>
            </div>
        </div>

        <!-- KPI 3: Guatemala -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper p-0 overflow-hidden border-yellow">
                    <img src="{{ asset('img/gt.webp') }}" alt="Guatemala" class="w-100 h-100 object-fit-cover">
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Guatemala</span>
                    <h2 class="kpi-value">{{ $totalMaquinasGT }}</h2>
                    <span class="kpi-subtext">Tecnopark, Escuintla</span>
                </div>
            </div>
        </div>

        <!-- KPI 4: Categorías -->
        <div class="col-12 col-sm-6 col-xl-3">
            <div class="dash-kpi-card">
                <div class="kpi-icon-wrapper bg-yellow">
                    <x-icon name="grid_view" />
                </div>
                <div class="kpi-info">
                    <span class="kpi-label">Categorías</span>
                    <h2 class="kpi-value">{{ $totalCategorias }}</h2>
                    <span class="kpi-subtext">Tipos de maquinaria</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráficos de Distribución de Flota -->
    <div class="row g-4 mb-4">
        <!-- Gráfico El Salvador -->
        <div class="col-12 col-lg-6">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('img/sv.webp') }}" alt="El Salvador" class="dash-header-flag">
                        <h3 class="dash-card-title">Distribución en El Salvador</h3>
                    </div>
                    <span class="badge-count-pill">{{ $totalMaquinasSV }} unidades</span>
                </div>
                <div class="dash-card-body">
                    <div class="chart-wrapper">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Gráfico Guatemala -->
        <div class="col-12 col-lg-6">
            <div class="dash-card">
                <div class="dash-card-header">
                    <div class="d-flex align-items-center gap-2">
                        <img src="{{ asset('img/gt.webp') }}" alt="Guatemala" class="dash-header-flag">
                        <h3 class="dash-card-title">Distribución en Guatemala</h3>
                    </div>
                    <span class="badge-count-pill">{{ $totalMaquinasGT }} unidades</span>
                </div>
                <div class="dash-card-body">
                    <div class="chart-wrapper">
                        <canvas id="myChart-guate"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabla de Últimas Máquinas Registradas -->
    <div class="dash-card">
        <div class="dash-card-header">
            <div>
                <h3 class="dash-card-title">Última Maquinaria Registrada</h3>
                <p class="dash-card-subtitle mb-0">Novedades recientes en el catálogo de equipos</p>
            </div>
            <a href="{{ route('maquinas.index') }}" class="dash-link-action">
                <span>Ver todo el catálogo</span>
                <x-icon name="arrow_forward" />
            </a>
        </div>
        <div class="dash-card-body p-0">
            <div class="table-responsive">
                <table class="table dash-table mb-0">
                    <thead>
                        <tr>
                            <th>Equipo / Modelo</th>
                            <th>Categoría</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ultimasMaquinas as $maquina)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="table-machine-avatar">
                                            @if($maquina->imagens && $maquina->imagens->count() > 0)
                                                <img src="{{ asset($maquina->imagens->first()->url) }}" alt="{{ $maquina->modelo }}" class="w-100 h-100 object-fit-cover">
                                            @else
                                                <x-icon name="construction" />
                                            @endif
                                        </div>
                                        <div>
                                            <span class="table-machine-name">{{ $maquina->modelo }}</span>
                                            <span class="table-machine-brand">{{ $maquina->marca }}</span>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge-category-tag">
                                        {{ $maquina->tipoMaquina->nombre ?? 'Sin categoría' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        @if(optional($maquina->pais)->nombre == 'Guatemala')
                                            <img src="{{ asset('img/gt.webp') }}" alt="Guatemala" class="table-flag">
                                        @else
                                            <img src="{{ asset('img/sv.webp') }}" alt="El Salvador" class="table-flag">
                                        @endif
                                        <span class="table-country-text">{{ $maquina->pais->nombre ?? 'N/A' }}</span>
                                    </div>
                                </td>
                                <td>
                                    @if($maquina->status)
                                        <span class="badge-status-active">
                                            <span class="status-dot"></span>
                                            Activo
                                        </span>
                                    @else
                                        <span class="badge-status-inactive">
                                            Inactivo
                                        </span>
                                    @endif
                                </td>
                                <td class="text-end">
                                    <a href="{{ route('maquinas.edit', $maquina->id) }}" class="btn-table-action" title="Editar máquina">
                                        <x-icon name="edit" />
                                        <span>Editar</span>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-4 text-muted">
                                    No hay maquinaria registrada todavía.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const curatedPalette = [
            '#253266', // Corporate Navy
            '#FED116', // Servicel Gold
            '#0284c7', // Sky Blue
            '#059669', // Emerald
            '#d97706', // Amber
            '#7c3aed', // Purple
            '#db2777', // Rose
            '#475569', // Slate
            '#0d9488'  // Teal
        ];

        const chartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '72%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        padding: 16,
                        usePointStyle: true,
                        pointStyle: 'circle',
                        font: {
                            family: "'Lexend', sans-serif",
                            size: 12,
                            weight: '500'
                        }
                    }
                },
                tooltip: {
                    padding: 12,
                    backgroundColor: '#171e3b',
                    titleFont: {
                        family: "'Lexend', sans-serif",
                        size: 13,
                        weight: '700'
                    },
                    bodyFont: {
                        family: "'Lexend', sans-serif",
                        size: 12
                    },
                    cornerRadius: 8,
                    displayColors: true
                }
            },
            animation: {
                animateScale: true,
                animateRotate: true
            }
        };

        const ctx = document.getElementById('myChart');
        if (ctx) {
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: [
                        @foreach($conteoMaquinasElSalvador as $data)
                            '{{ $data->tipoMaquina->nombre ?? "Otro" }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Cantidad',
                        data: [
                            @foreach($conteoMaquinasElSalvador as $data)
                                {{ $data->total }},
                            @endforeach
                        ],
                        backgroundColor: curatedPalette,
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 6
                    }]
                },
                options: chartOptions
            });
        }

        const ctx_guate = document.getElementById('myChart-guate');
        if (ctx_guate) {
            new Chart(ctx_guate, {
                type: 'doughnut',
                data: {
                    labels: [
                        @foreach($conteoMaquinasGuatemala as $data)
                            '{{ $data->tipoMaquina->nombre ?? "Otro" }}',
                        @endforeach
                    ],
                    datasets: [{
                        label: 'Cantidad',
                        data: [
                            @foreach($conteoMaquinasGuatemala as $data)
                                {{ $data->total }},
                            @endforeach
                        ],
                        backgroundColor: curatedPalette,
                        borderWidth: 2,
                        borderColor: '#ffffff',
                        hoverOffset: 6
                    }]
                },
                options: chartOptions
            });
        }
    });
</script>
@endsection


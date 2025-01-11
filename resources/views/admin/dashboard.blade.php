@extends('layouts.app')

@section('title', 'Tablero')

@section('content')
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tablero</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                            <li class="breadcrumb-item active">Tablero</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
                <!-- Tarjetas con métricas -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- Tarjeta de Usuarios -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>150</h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>
                            <a href="{{ route('users.index') }}" class="small-box-footer">
                                Ver más <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Tarjeta de Empresas -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>75</h3>
                                <p>Empresas</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building"></i>
                            </div>
                            <a href="{{ route('companies.index') }}" class="small-box-footer">
                                Ver más <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Tarjeta de Proyectos -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>45</h3>
                                <p>Proyectos</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-project-diagram"></i>
                            </div>
                            <a href="{{ route('projects.index') }}" class="small-box-footer">
                                Ver más <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <!-- Tarjeta de Clientes -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>300</h3>
                                <p>Clientes</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-tie"></i>
                            </div>
                            <a href="{{ route('clients.index') }}" class="small-box-footer">
                                Ver más <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Gráfico y enlaces rápidos -->
                <div class="row">
                    <!-- Gráfico -->
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Gráfico de Actividad (Ejemplo)</h3>
                            </div>
                            <div class="card-body">
                                <canvas id="dashboardChart" style="min-height: 300px; height: 300px;"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Enlaces rápidos -->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Enlaces Rápidos</h3>
                            </div>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="{{ route('users.create') }}">
                                            <i class="fas fa-plus"></i> Crear Nuevo Usuario
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('companies.create') }}">
                                            <i class="fas fa-plus"></i> Crear Nueva Empresa
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('projects.create') }}">
                                            <i class="fas fa-plus"></i> Crear Nuevo Proyecto
                                        </a>
                                    </li>
                                    <li class="list-group-item">
                                        <a href="{{ route('clients.create') }}">
                                            <i class="fas fa-plus"></i> Crear Nuevo Cliente
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        // Gráfico ficticio con Chart.js
        const ctx = document.getElementById('dashboardChart').getContext('2d');
        const dashboardChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio'],
                datasets: [{
                    label: 'Usuarios Activos',
                    data: [50, 65, 80, 90, 120, 150],
                    borderColor: 'rgba(60,141,188,0.8)',
                    backgroundColor: 'rgba(60,141,188,0.3)',
                    fill: true,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection

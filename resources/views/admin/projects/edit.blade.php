@extends('layouts.app')

@section('title', 'Editar Proyecto')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Editar Proyecto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Proyectos</a></li>
                            <li class="breadcrumb-item active">Editar Proyecto</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Formulario de Edición</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('projects.update', $project->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <!-- Primera columna -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nombre del Proyecto</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name', $project->name) }}"
                                                    placeholder="Ingrese el nombre del proyecto">
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Cliente -->
                                            <div class="form-group">
                                                <label for="client_id">Cliente</label>
                                                <select name="client_id" id="client_id"
                                                    class="form-control @error('client_id') is-invalid @enderror">
                                                    <option value="">Seleccione un cliente</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"
                                                            {{ old('client_id', $project->client_id) == $client->id ? 'selected' : '' }}>
                                                            {{ $client->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('client_id')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Servicios -->
                                            <div class="form-group">
                                                <label for="services">Servicios</label>
                                                <select name="services[]" id="services"
                                                    class="form-control select2 @error('services') is-invalid @enderror"
                                                    multiple>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"
                                                            {{ $project->services->contains($service->id) ? 'selected' : '' }}>
                                                            {{ $service->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('services')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Segunda columna -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="description">Descripción</label>
                                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                    placeholder="Ingrese una descripción breve del proyecto" rows="4">{{ old('description', $project->description) }}</textarea>
                                                @error('description')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('projects.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Actualizar Proyecto
                                        </button>
                                    </div>
                                </form>
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
        $(document).ready(function() {
            $('#services').select2({
                placeholder: "Seleccione uno o más servicios",
                allowClear: true,
            });
        });
    </script>
@endsection

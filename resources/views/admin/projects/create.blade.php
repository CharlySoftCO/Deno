@extends('layouts.app')

@section('title', 'Nuevo Proyecto')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Proyecto</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('projects.index') }}">Proyectos</a></li>
                            <li class="breadcrumb-item active">Nuevo Proyecto</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Formulario Nuevo Proyecto</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('projects.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <!-- Primera columna -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="name">Nombre del Proyecto</label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Ingrese el nombre del proyecto"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Campo Cliente (no es select2) -->
                                            <div class="form-group">
                                                <label for="client_id">Cliente</label>
                                                <select name="client_id" id="client_id"
                                                    class="form-control @error('client_id') is-invalid @enderror">
                                                    <option value="">Seleccione un cliente</option>
                                                    @foreach ($clients as $client)
                                                        <option value="{{ $client->id }}"
                                                            {{ old('client_id') == $client->id ? 'selected' : '' }}>
                                                            {{ $client->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('client_id')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <!-- Campo Servicios (Select2) -->
                                            <div class="form-group">
                                                <label for="services">Servicios</label>
                                                <select name="services[]" id="services" class="form-control select2"
                                                    multiple>
                                                    @foreach ($services as $service)
                                                        <option value="{{ $service->id }}"
                                                            {{ collect(old('services'))->contains($service->id) ? 'selected' : '' }}>
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
                                                    placeholder="Ingrese una descripción breve del proyecto" rows="4">{{ old('description') }}</textarea>
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
                                            <i class="fas fa-save"></i> Guardar Proyecto
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
                width: '100%'
            });
        });
    </script>
@endsection

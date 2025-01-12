@extends('layouts.app')

@section('title', 'Proyectos')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Proyectos</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Proyectos</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('projects.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Proyecto
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            @if (session('success'))
                <script src="{{ asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: '¡Operación Exitosa!',
                        text: '{{ session('success') }}',
                        showConfirmButton: false,
                        timer: 1500,
                        timerProgressBar: true,
                        toast: true,
                        position: 'top-end'
                    });
                </script>
            @endif

            <div class="container-fluid">
                <div class="row">
                    @forelse ($projects as $project)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="card-title mb-0">{{ $project->name }}</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ $project->description ?? 'Sin descripción disponible.' }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Cliente:</strong>
                                        {{ $project->client->name ?? 'No asociado a ningún cliente.' }}
                                    </p>
                                    <p class="card-text">
                                        <strong>Servicios contratados:</strong>
                                        @if ($project->services->isNotEmpty())
                                            <ul class="list-unstyled mb-0">
                                                @foreach ($project->services as $service)
                                                    <li>- {{ $service->name }}</li>
                                                @endforeach
                                            </ul>
                                        @else
                                            <em>No hay servicios asociados a este proyecto.</em>
                                        @endif
                                    </p>
                                </div>
                                <div class="card-footer d-flex">
                                    <div class="mr-auto">
                                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Editar
                                        </a>
                                    </div>
                                    <div>
                                        <button class="btn btn-sm btn-danger delete-btn" data-id="{{ $project->id }}">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                        <form id="delete-form-{{ $project->id }}"
                                            action="{{ route('projects.destroy', $project->id) }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <div class="alert alert-info text-center" role="alert">
                                No hay proyectos disponibles.
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.delete-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const projectId = this.getAttribute('data-id');
                    Swal.fire({
                        title: '¿Estás seguro?',
                        text: 'El proyecto será eliminado permanentemente.',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Sí, eliminar',
                        cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            document.getElementById(`delete-form-${projectId}`).submit();
                        }
                    });
                });
            });
        });
    </script>
@endsection

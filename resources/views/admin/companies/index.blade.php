@extends('layouts.app')

@section('title', 'Empresas')

@section('content')
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Empresas</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('companies.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nueva Empresa
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <!-- Mensaje de éxito -->
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

            <!-- Tabla de empresas -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Listado de Empresas</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="companiesTable" class="table table-striped table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th style="display: none;">ID</th> <!-- Ocultar esta columna -->
                                    <th>NIT</th>
                                    <th>Nombre</th>
                                    <th>Descripción</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($companies as $company)
                                    <tr>
                                        <td style="display: none;">{{ $company->id }}</td> <!-- Ocultar esta columna -->
                                        <td>{{ $company->nit }}</td>
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->description }}</td>
                                        <td>
                                            <a href="{{ route('companies.edit', $company->id) }}"
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $company->id }}"
                                                data-name="{{ $company->name }}">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                            <form id="delete-form-{{ $company->id }}"
                                                action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">No hay empresas registradas.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#companiesTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json' // Traducción al español
                },
                columnDefs: [
                    { targets: 0, visible: false, searchable: false } // Oculta la columna ID (índice 0)
                ],
                order: [[0, 'desc']], // Ordenar por la columna ID de forma descendente
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: '<i class="fas fa-file-excel"></i> Exportar a Excel',
                        className: 'btn btn-success btn-sm'
                    },
                    {
                        extend: 'pdfHtml5',
                        text: '<i class="fas fa-file-pdf"></i> Exportar a PDF',
                        className: 'btn btn-danger btn-sm'
                    },
                    {
                        extend: 'print',
                        text: '<i class="fas fa-print"></i> Imprimir',
                        className: 'btn btn-secondary btn-sm'
                    },
                    {
                        extend: 'colvis',
                        text: '<i class="fas fa-columns"></i> Columnas',
                        className: 'btn btn-info btn-sm'
                    }
                ],
                dom: '<"row mb-3"<"col-md-6 d-flex align-items-center"B><"col-md-6 text-end"f>>' +
                    '<"row"<"col-12 table-responsive"tr>>' +
                    '<"row mt-2"<"col-md-6"i><"col-md-6 d-flex justify-content-end"p>>'
            });

            // Confirmación de eliminación con SweetAlert2
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const name = $(this).data('name');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `La empresa "${name}" será eliminada permanentemente.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            });
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', 'Clientes')

@section('content')
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Clientes</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Clientes</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('clients.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Cliente
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
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

            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Listado de Clientes</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="clientsTable" class="table table-striped table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th style="display: none;">ID</th> <!-- Ocultamos esta columna -->
                                    <th>Tipo de Documento</th>
                                    <th>Número de Documento</th>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($clients as $client)
                                    <tr>
                                        <td style="display: none;">{{ $client->id }}</td>
                                        <td>{{ $client->document_type }}</td>
                                        <td>{{ $client->document_number }}</td>
                                        <td>{{ $client->name }}</td>
                                        <td>{{ $client->email ?? 'N/A' }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm view-btn" data-client="{{ json_encode($client) }}">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                            <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $client->id }}"
                                                data-name="{{ $client->name }}">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                            <form id="delete-form-{{ $client->id }}"
                                                action="{{ route('clients.destroy', $client->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted">No hay clientes registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal moderna para ver cliente -->
    @include('admin.clients.show')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $('#clientsTable').DataTable({
                responsive: true,
                autoWidth: false,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.11.5/i18n/es-ES.json'
                },
                columnDefs: [
                    { targets: 0, visible: false, searchable: false } // Oculta la columna ID
                ],
                order: [[0, 'desc']], // Ordena por ID descendente
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
                    text: `El cliente "${name}" será eliminado permanentemente.`,
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

            // Mostrar datos en la modal
            $(document).on('click', '.view-btn', function() {
                const client = $(this).data('client');
                $('#client-document-type').text(client.document_type || 'N/A');
                $('#client-document-number').text(client.document_number || 'N/A');
                $('#client-name').text(client.name || 'N/A');
                $('#client-email').text(client.email || 'N/A');
                $('#client-phone').text(client.phone || 'N/A');
                $('#client-mobile').text(client.mobile || 'N/A');
                $('#client-address').text(client.address || 'N/A');
                $('#client-city').text(client.city || 'N/A');
                $('#client-department').text(client.department || 'N/A');
                $('#client-company').text(client.company_name || 'N/A');

                $('#clientModal').modal('show');
            });
        });
    </script>
@endsection

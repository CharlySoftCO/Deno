@extends('layouts.app')

@section('title', 'Usuarios')

@section('content')
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuarios</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item active">Usuarios</li>
                        </ol>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 text-right">
                        <a href="{{ route('users.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Nuevo Usuario
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

            <!-- Tabla de usuarios -->
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Listado de Usuarios</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="usersTable" class="table table-striped table-hover">
                            <thead class="bg-secondary text-white">
                                <tr>
                                    <th>Tipo de Documento</th>
                                    <th>Número de Documento</th>
                                    <th>Nombre</th>
                                    <th>Correo Electrónico</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>{{ $user->document_type }}</td>
                                        <td>{{ $user->document_number }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm view-btn" data-user="{{ $user }}">
                                                <i class="fas fa-eye"></i> Ver
                                            </button>
                                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Editar
                                            </a>
                                            <button class="btn btn-danger btn-sm delete-btn" data-id="{{ $user->id }}"
                                                data-name="{{ $user->name }}">
                                                <i class="fas fa-trash"></i> Eliminar
                                            </button>
                                            <form id="delete-form-{{ $user->id }}"
                                                action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">No hay usuarios registrados.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal para Ver Detalles -->
    @include('admin.users.show')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            // Manejar la apertura de la modal con los datos del usuario
            $(document).on('click', '.view-btn', function() {
                const user = $(this).data('user');

                $('#user-document-type').text(user.document_type || 'N/A');
                $('#user-document-number').text(user.document_number || 'N/A');
                $('#user-name').text(user.name || 'N/A');
                $('#user-email').text(user.email || 'N/A');
                $('#user-phone').text(user.phone || 'N/A');
                $('#user-is-active').text(user.is_active ? 'Activo' : 'Inactivo');
                $('#user-photo').attr('src', user.profile_photo ? `/storage/${user.profile_photo}` :
                    '/default-avatar.png');

                $('#userModal').modal('show');
            });

            // Confirmación de eliminación con SweetAlert2
            $(document).on('click', '.delete-btn', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const name = $(this).data('name');
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: `El usuario "${name}" será eliminado permanentemente.`,
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

@extends('layouts.app')

@section('title', 'Editar Usuario')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar Usuario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                        <li class="breadcrumb-item active">Editar Usuario</li>
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
                            <h3 class="card-title">Formulario de Edición de Usuario</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <!-- Primera columna -->
                                    <div class="col-md-6">
                                        <!-- Campo Tipo de Documento -->
                                        <div class="form-group">
                                            <label for="document_type">Tipo de Documento <span class="text-danger">*</span></label>
                                            <select name="document_type" id="document_type" class="form-control">
                                                <option value="CC" {{ $user->document_type == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía</option>
                                                <option value="CE" {{ $user->document_type == 'CE' ? 'selected' : '' }}>Cédula de Extranjería</option>
                                            </select>
                                            @error('document_type')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Número de Documento -->
                                        <div class="form-group">
                                            <label for="document_number">Número de Documento <span class="text-danger">*</span></label>
                                            <input type="text" name="document_number" id="document_number" class="form-control"
                                                placeholder="Ingrese el número de documento" value="{{ old('document_number', $user->document_number) }}" pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('document_number')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Nombre -->
                                        <div class="form-group">
                                            <label for="name">Nombre <span class="text-danger">*</span></label>
                                            <input type="text" name="name" id="name" class="form-control"
                                                placeholder="Ingrese el nombre" value="{{ old('name', $user->name) }}">
                                            @error('name')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Correo Electrónico -->
                                        <div class="form-group">
                                            <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                                            <input type="email" name="email" id="email" class="form-control"
                                                placeholder="Ingrese el correo electrónico" value="{{ old('email', $user->email) }}">
                                            @error('email')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Teléfono Móvil -->
                                        <div class="form-group">
                                            <label for="phone">Teléfono Móvil <span class="text-danger">*</span></label>
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Ingrese el teléfono móvil" value="{{ old('phone', $user->phone) }}" pattern="[0-9]*"
                                                oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                            @error('phone')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Empresa -->
                                        <div class="form-group">
                                            <label for="company_id">Empresa <span class="text-danger">*</span></label>
                                            <select name="company_id" id="company_id" class="form-control">
                                                @foreach ($companies as $company)
                                                    <option value="{{ $company->id }}" {{ $user->company_id == $company->id ? 'selected' : '' }}>
                                                        {{ $company->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('company_id')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <!-- Segunda columna -->
                                    <div class="col-md-6">
                                        <!-- Campo Proyectos -->
                                        <div class="form-group">
                                            <label for="project_ids">Proyectos <span class="text-danger">*</span></label>
                                            <select name="project_ids[]" id="project_ids" class="form-control select2" multiple>
                                                @foreach ($projects as $project)
                                                    <option value="{{ $project->id }}" {{ $user->projects->contains($project->id) ? 'selected' : '' }}>
                                                        {{ $project->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('project_ids')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Contraseña -->
                                        <div class="form-group">
                                            <label for="password">Contraseña</label>
                                            <input type="password" name="password" id="password" class="form-control"
                                                placeholder="Ingrese la contraseña (opcional)">
                                            @error('password')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Confirmar Contraseña -->
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirmar Contraseña</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                class="form-control" placeholder="Confirme la contraseña">
                                        </div>

                                        <!-- Campo Estado Activo -->
                                        <div class="form-group">
                                            <label for="is_active">Activo</label>
                                            <select name="is_active" id="is_active" class="form-control">
                                                <option value="1" {{ $user->is_active ? 'selected' : '' }}>Sí</option>
                                                <option value="0" {{ !$user->is_active ? 'selected' : '' }}>No</option>
                                            </select>
                                            @error('is_active')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <!-- Campo Foto de Perfil -->
                                        <div class="form-group">
                                            <label for="profile_photo">Foto de Perfil</label>
                                            <input type="file" name="profile_photo" id="profile_photo"
                                                class="form-control @error('profile_photo') is-invalid @enderror">
                                            @if ($user->profile_photo)
                                                <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="Foto de Perfil"
                                                    class="img-thumbnail mt-2" width="150">
                                            @endif
                                            @error('profile_photo')
                                                <span class="text-danger small">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between mt-3">
                                    <a href="{{ route('users.index') }}" class="btn btn-secondary">
                                        <i class="fas fa-arrow-left"></i> Cancelar
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Guardar Cambios
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
            $('#project_ids').select2({
                placeholder: "Seleccione uno o más proyectos",
                allowClear: true
            });
        });
    </script>
@endsection
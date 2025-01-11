@extends('layouts.app')

@section('title', 'Nuevo Usuario')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Usuario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('users.index') }}">Usuarios</a></li>
                            <li class="breadcrumb-item active">Nuevo Usuario</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Nuevo Usuario</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Campos requeridos -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Ingrese el nombre" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="email">Correo Electrónico <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email"
                                        class="form-control @error('email') is-invalid @enderror"
                                        placeholder="Ingrese el correo electrónico" value="{{ old('email') }}" required>
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="profile_photo">Foto de Perfil <span
                                            class="text-muted">(Opcional)</span></label>
                                    <input type="file" name="profile_photo" id="profile_photo"
                                        class="form-control @error('profile_photo') is-invalid @enderror">
                                    @error('profile_photo')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Contraseña <span class="text-danger">*</span></label>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Ingrese la contraseña" required>
                                    @error('password')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Confirmar Contraseña <span
                                            class="text-danger">*</span></label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Confirme la contraseña" required>
                                </div>

                                <div class="form-group">
                                    <label for="is_active">Activo</label>
                                    <select name="is_active" id="is_active"
                                        class="form-control @error('is_active') is-invalid @enderror">
                                        <option value="1" {{ old('is_active', 1) == 1 ? 'selected' : '' }}>Sí</option>
                                        <option value="0" {{ old('is_active', 1) == 0 ? 'selected' : '' }}>No</option>
                                    </select>
                                    @error('is_active')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Switch para mostrar campos opcionales -->
                        <div class="form-group mt-4 d-flex align-items-center">
                            <label for="additionalInfoSwitch" class="mb-0 mr-3">Agregar más información opcional</label>
                            <div class="form-check form-switch ml-3">
                                <input class="form-check-input" type="checkbox" id="additionalInfoSwitch">
                            </div>
                        </div>

                        <!-- Campos opcionales -->
                        <div id="additionalInfoFields" class="row" style="display: none;">
                            <!-- Primera columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="document_type">Tipo de Documento</label>
                                    <select name="document_type" id="document_type"
                                        class="form-control @error('document_type') is-invalid @enderror">
                                        <option value="">Seleccione el tipo</option>
                                        <option value="CC" {{ old('document_type') == 'CC' ? 'selected' : '' }}>Cédula
                                            de Ciudadanía</option>
                                        <option value="TI" {{ old('document_type') == 'TI' ? 'selected' : '' }}>Tarjeta
                                            de Identidad</option>
                                        <option value="NIT" {{ old('document_type') == 'NIT' ? 'selected' : '' }}>NIT
                                        </option>
                                    </select>
                                    @error('document_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="document_number">Número de Documento</label>
                                    <input type="text" name="document_number" id="document_number"
                                        class="form-control @error('document_number') is-invalid @enderror"
                                        placeholder="Ingrese el número de documento"
                                        value="{{ old('document_number') }}">
                                    @error('document_number')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="phone">Teléfono</label>
                                    <input type="text" name="phone" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror"
                                        placeholder="Ingrese el número de teléfono" value="{{ old('phone') }}">
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" id="address"
                                        class="form-control @error('address') is-invalid @enderror"
                                        placeholder="Ingrese la dirección" value="{{ old('address') }}">
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="hiring_company">Empresa Contratante</label>
                                    <input type="text" name="hiring_company" id="hiring_company"
                                        class="form-control @error('hiring_company') is-invalid @enderror"
                                        placeholder="Ingrese la empresa contratante" value="{{ old('hiring_company') }}">
                                    @error('hiring_company')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Segunda columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="position">Cargo</label>
                                    <input type="text" name="position" id="position"
                                        class="form-control @error('position') is-invalid @enderror"
                                        placeholder="Ingrese el cargo" value="{{ old('position') }}">
                                    @error('position')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="project_name">Proyecto Asociado</label>
                                    <input type="text" name="project_name" id="project_name"
                                        class="form-control @error('project_name') is-invalid @enderror"
                                        placeholder="Ingrese el proyecto asociado" value="{{ old('project_name') }}">
                                    @error('project_name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="contract_type">Tipo de Contrato</label>
                                    <select name="contract_type" id="contract_type"
                                        class="form-control @error('contract_type') is-invalid @enderror">
                                        <option value="">Seleccione el tipo</option>
                                        <option value="indefinido"
                                            {{ old('contract_type') == 'indefinido' ? 'selected' : '' }}>Indefinido
                                        </option>
                                        <option value="fijo" {{ old('contract_type') == 'fijo' ? 'selected' : '' }}>Fijo
                                        </option>
                                        <option value="servicios"
                                            {{ old('contract_type') == 'servicios' ? 'selected' : '' }}>Servicios</option>
                                    </select>
                                    @error('contract_type')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="salary">Salario</label>
                                    <input type="number" name="salary" id="salary" step="0.01"
                                        class="form-control @error('salary') is-invalid @enderror"
                                        placeholder="Ingrese el salario" value="{{ old('salary') }}">
                                    @error('salary')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gender">Género</label>
                                    <select name="gender" id="gender"
                                        class="form-control @error('gender') is-invalid @enderror">
                                        <option value="">Seleccione el género</option>
                                        <option value="masculino" {{ old('gender') == 'masculino' ? 'selected' : '' }}>
                                            Masculino</option>
                                        <option value="femenino" {{ old('gender') == 'femenino' ? 'selected' : '' }}>
                                            Femenino</option>
                                        <option value="otro" {{ old('gender') == 'otro' ? 'selected' : '' }}>Otro
                                        </option>
                                    </select>
                                    @error('gender')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Guardar</button>
                        <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('js')
    <script>
        document.getElementById('additionalInfoSwitch').addEventListener('change', function() {
            const additionalInfoFields = document.getElementById('additionalInfoFields');
            additionalInfoFields.style.display = this.checked ? 'flex' : 'none';
        });
    </script>
@endsection

@extends('layouts.app')

@section('title', 'Nuevo Cliente')

@section('content')
    <div class="content-wrapper">
        <!-- Encabezado de la página -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nuevo Cliente</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clientes</a></li>
                            <li class="breadcrumb-item active">Nuevo Cliente</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contenido principal -->
        <section class="content">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Formulario de Nuevo Cliente</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('clients.store') }}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <!-- Primera columna -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="document_type">Tipo de Documento <span class="text-danger">*</span></label>
                                                <select name="document_type" id="document_type"
                                                    class="form-control @error('document_type') is-invalid @enderror">
                                                    <option value="">Seleccione un tipo de documento</option>
                                                    <option value="CC" {{ old('document_type') == 'CC' ? 'selected' : '' }}>Cédula de Ciudadanía (CC)</option>
                                                    <option value="NIT" {{ old('document_type') == 'NIT' ? 'selected' : '' }}>Número de Identificación Tributaria (NIT)</option>
                                                    <option value="CE" {{ old('document_type') == 'CE' ? 'selected' : '' }}>Cédula de Extranjería (CE)</option>
                                                </select>
                                                @error('document_type')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="document_number">Número de Documento <span class="text-danger">*</span></label>
                                                <input type="text" name="document_number" id="document_number"
                                                    class="form-control @error('document_number') is-invalid @enderror"
                                                    placeholder="Ingrese el número de documento"
                                                    value="{{ old('document_number') }}"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                @error('document_number')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="name">Nombre Completo o Razón Social <span class="text-danger">*</span></label>
                                                <input type="text" name="name" id="name"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    placeholder="Ingrese el nombre completo o razón social"
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Correo Electrónico</label>
                                                <input type="email" name="email" id="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Ingrese el correo electrónico"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Teléfono Fijo</label>
                                                <input type="text" name="phone" id="phone"
                                                    class="form-control @error('phone') is-invalid @enderror"
                                                    placeholder="Ingrese el teléfono fijo"
                                                    value="{{ old('phone') }}"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                @error('phone')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- Segunda columna -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="mobile">Teléfono Móvil</label>
                                                <input type="text" name="mobile" id="mobile"
                                                    class="form-control @error('mobile') is-invalid @enderror"
                                                    placeholder="Ingrese el teléfono móvil"
                                                    value="{{ old('mobile') }}"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                                @error('mobile')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Dirección</label>
                                                <input type="text" name="address" id="address"
                                                    class="form-control @error('address') is-invalid @enderror"
                                                    placeholder="Ingrese la dirección" value="{{ old('address') }}">
                                                @error('address')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="city">Ciudad</label>
                                                <input type="text" name="city" id="city"
                                                    class="form-control @error('city') is-invalid @enderror"
                                                    placeholder="Ingrese la ciudad" value="{{ old('city') }}">
                                                @error('city')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="department">Departamento</label>
                                                <input type="text" name="department" id="department"
                                                    class="form-control @error('department') is-invalid @enderror"
                                                    placeholder="Ingrese el departamento"
                                                    value="{{ old('department') }}">
                                                @error('department')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="company_name">Nombre de la Empresa</label>
                                                <input type="text" name="company_name" id="company_name"
                                                    class="form-control @error('company_name') is-invalid @enderror"
                                                    placeholder="Ingrese el nombre de la empresa (si aplica)"
                                                    value="{{ old('company_name') }}">
                                                @error('company_name')
                                                    <span class="text-danger small">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <a href="{{ route('clients.index') }}" class="btn btn-secondary">
                                            <i class="fas fa-arrow-left"></i> Cancelar
                                        </a>
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-save"></i> Guardar Cliente
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

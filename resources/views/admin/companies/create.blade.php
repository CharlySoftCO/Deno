@extends('layouts.app')

@section('title', 'Nueva Empresa')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Nueva Empresa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Inicio</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('companies.index') }}">Empresas</a></li>
                            <li class="breadcrumb-item active">Nueva Empresa</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Formulario de Nueva Empresa</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('companies.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <!-- Primera columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nit">NIT <span class="text-danger">*</span></label>
                                    <input type="number" name="nit" id="nit"
                                        class="form-control @error('nit') is-invalid @enderror"
                                        placeholder="Ingrese el NIT de la empresa" value="{{ old('nit') }}"
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                                    @error('nit')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="name">Nombre <span class="text-danger">*</span></label>
                                    <input type="text" name="name" id="name"
                                        class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Ingrese el nombre de la empresa" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Segunda columna -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="description">Descripción</label>
                                    <textarea name="description" id="description"
                                        class="form-control @error('description') is-invalid @enderror"
                                        placeholder="Ingrese una descripción breve">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="{{ route('companies.index') }}" class="btn btn-secondary">Cancelar</a>
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection

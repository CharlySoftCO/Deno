@extends('layouts.auth')

@section('title', 'Iniciar sesión')

@section('content')
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="#" class="h1">
                    <img src="{{ asset('assets/logo.webp') }}" width="120" alt="Logo">
                </a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Inicia sesión para acceder a tu cuenta</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" placeholder="Ej: usuario@correo.com"
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" placeholder="Ej: Contraseña123" autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-lock"></i>
                            </div>
                        </div>
                        @error('password')
                            <span class="invalid-feedback d-block" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label for="remember">Recuérdame</label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                    </div>
                </form>

                <p class="mb-1">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}">¿Olvidaste tu contraseña?</a>
                    @endif
                </p>
                <p class="mb-0">
                    <a href="{{ route('register') }}" class="text-center">Registrar una nueva cuenta</a>
                </p>
            </div>
        </div>
    </div>
@endsection

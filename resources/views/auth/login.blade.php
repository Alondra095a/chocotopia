@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 500px; background: rgba(37, 22, 3, 0.98); border-radius: 15px; color: white;">
        <div class="text-center mb-4">
            <img src="{{ asset('img/log2.jpg') }}" alt="Logo" class="rounded-circle" style="width: 80px; height: 80px;">
            <div class="card-header text-center" style="font-family: 'Fenix'; font-size: 2.5rem; font-weight: bold; color:rgb(243, 241, 235); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                {{ __('Login') }}
            </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input id="email" type="email" class="form-control bg-light text-black border-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input id="password" type="password" class="form-control bg-light text-black border-secondary @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3 form-check">
                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember">
                        {{ __('Recordarme') }}
                    </label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-outline-light fw-bold">Iniciar sesión</button>
                </div>

                @if (Route::has('password.request'))
                    <div class="mt-3 text-center">
                        <a class="btn btn-link text-white" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contraseña?') }}
                        </a>
                    </div>
                @endif
            </form>
        </div>
    </div>
</div>
@endsection

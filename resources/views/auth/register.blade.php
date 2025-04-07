@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
    <div class="card p-4" style="width: 500px; background: rgba(37, 22, 3, 0.98); border-radius: 15px; color: white;">
        <div class="text-center mb-4">
            <img src="{{ asset('img/log2.jpg') }}" alt="Logo" class="rounded-circle" style="width: 80px; height: 80px;">
            <div class="card-header text-center" style="font-family: 'Fenix'; font-size: 2.5rem; font-weight: bold; color:rgb(243, 241, 235); text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                    {{ __('REGISTRO') }}
                </div>
        </div>

        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nombre:</label>
                    <input id="name" type="text" class="form-control bg-light text-black border-secondary @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>
                    @error('name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico:</label>
                    <input id="email" type="email" class="form-control bg-light text-black border-secondary @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña:</label>
                    <input id="password" type="password" class="form-control bg-light text-black border-secondary @error('password') is-invalid @enderror" name="password" required>
                    @error('password')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password-confirm" class="form-label">Confirmar Contraseña:</label>
                    <input id="password-confirm" type="password" class="form-control bg-light text-black border-secondary" name="password_confirmation" required>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" href="{{ route('register') }}" class="btn btn-outline-light fw-bold">Registrarse</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded">
        <h2 class="text-center mb-4" style="font-family: 'Fenix', serif;">Configuración del Sistema</h2>

        <form method="POST" action="#" onsubmit="return false;">
            @csrf

            <!-- Nombre del sistema -->
            <div class="mb-3">
                <label for="nombre_sistema" class="form-label fw-bold">Nombre del Sistema</label>
                <input type="text" class="form-control" id="nombre_sistema" value="Chocotopía" disabled>
            </div>

            <!-- Stock mínimo global -->
            <div class="mb-3">
                <label for="stock_minimo" class="form-label fw-bold">Stock mínimo global</label>
                <input type="number" class="form-control" id="stock_minimo" value="10">
            </div>

            <!-- Color del tema -->
            <div class="mb-3">
                <label for="color_tema" class="form-label fw-bold">Color del tema</label>
                <select class="form-select" id="color_tema">
                    <option value="default">Café Claro</option>
                    <option value="dark">Oscuro</option>
                    <option value="light">Claro</option>
                </select>
            </div>

            <!-- Datos de contacto -->
            <div class="mb-3">
                <label class="form-label fw-bold">Contacto de la empresa</label>
                <p class="form-control-plaintext">📧 chocotopia@empresa.com | 📞 (442) 123 4567</p>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('home') }}" class="btn btn-secondary shadow">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>

                <button type="button" class="btn btn-primary shadow" disabled>
                    <i class="fa-solid fa-floppy-disk"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

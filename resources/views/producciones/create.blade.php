@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Registrar Nueva Producción</h1>
        
        <div class="card-body">
            <form action="{{ route('producciones.store') }}" method="POST">
                @csrf

                <!-- Fecha -->
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-bold">Fecha</label>
                    <input type="date" name="fecha" class="form-control shadow-sm" id="fecha" required>
                </div>

                <!-- Cantidad -->
                <div class="mb-3">
                    <label for="cantidad" class="form-label fw-bold">Cantidad Producida</label>
                    <input type="number" name="cantidad" class="form-control shadow-sm" id="cantidad" required>
                </div>

                <!-- Producto -->
                <div class="mb-3">
                    <label for="id_producto" class="form-label fw-bold">Producto</label>
                    <select name="id_producto" class="form-control shadow-sm" id="id_producto" required>
                        <option value="">Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Empleado -->
                <div class="mb-3">
                    <label for="id_empleado" class="form-label fw-bold">Empleado</label>
                    <select name="id_empleado" class="form-control shadow-sm" id="id_empleado" required>
                        <option value="">Selecciona un empleado</option>
                        @foreach ($empleados as $empleado)
                            <option value="{{ $empleado->id_empleado }}">{{ $empleado->persona->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Botones -->
                <div class="d-flex justify-content-between">
                    <a href="{{ route('producciones.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Registrar Producción</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

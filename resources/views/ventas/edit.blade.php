@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="text-white p-4 rounded-top text-center mb-4" style="background-color: rgb(39, 26, 7); font-family: 'Fenix', serif; font-size: 2.5rem;">
            Editar Venta
        </h1>

        <form action="{{ route('ventas.update', $venta->id_venta) }}" method="POST" class="p-4">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="fecha" class="form-label fw-bold">Fecha:</label>
                <input type="date" name="fecha" id="fecha" class="form-control shadow-sm" value="{{ old('fecha', $venta->fecha) }}" required>
            </div>

            <div class="mb-3">
                <label for="total" class="form-label fw-bold">Total:</label>
                <input type="number" step="0.01" name="total" class="form-control shadow-sm" value="{{ old('total', $venta->total) }}" required>
            </div>

            <div class="mb-3">
                <label for="id_pedido" class="form-label fw-bold">Pedido:</label>
                <select name="id_pedido" class="form-select shadow-sm" required>
                    <option value="">Selecciona un pedido</option>
                    @foreach ($pedidos as $pedido)
                        <option value="{{ $pedido->id_pedido }}" {{ $venta->id_pedido == $pedido->id_pedido ? 'selected' : '' }}>
                            {{ $pedido->descripcion }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="id_empleado" class="form-label fw-bold">Empleado:</label>
                <select name="id_empleado" class="form-select shadow-sm" required>
                    <option value="">Selecciona un empleado</option>
                    @foreach ($empleados as $empleado)
                        <option value="{{ $empleado->id_empleado }}" {{ $venta->id_empleado == $empleado->id_empleado ? 'selected' : '' }}>
                            {{ $empleado->nombre }} {{ $empleado->a_paterno }} {{ $empleado->a_materno }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary shadow">
                    <i class="fa-solid fa-pen-to-square"></i> Actualizar Venta
                </button>
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary shadow ms-2">
                    <i class="fa-solid fa-arrow-left"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

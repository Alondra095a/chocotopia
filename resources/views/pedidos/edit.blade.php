@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Pedido</h1>
        
        <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
            <form action="{{ route('pedidos.update', $pedido->id_pedido) }}" method="POST">
                @csrf
                @method('PUT')
                
                <!-- Fecha -->
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-bold">Fecha</label>
                    <input type="date" name="fecha" class="form-control shadow-sm" id="fecha" value="{{ old('fecha', $pedido->fecha) }}" required>
                </div>

                <!-- Monto -->
                <div class="mb-3">
                    <label for="monto" class="form-label fw-bold">Monto</label>
                    <input type="number" name="monto" class="form-control shadow-sm" id="monto" value="{{ old('monto', $pedido->monto) }}" required>
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control shadow-sm" id="descripcion">{{ old('descripcion', $pedido->descripcion) }}</textarea>
                </div>

                <!-- Cliente -->
                <div class="mb-3">
                    <label for="id_cliente" class="form-label fw-bold">Cliente</label>
                    <select name="id_cliente" class="form-control shadow-sm" id="id_cliente" required>
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $pedido->id_cliente ? 'selected' : '' }}>
                                {{ $cliente->persona->nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Estado -->
                <div class="mb-3">
                    <label for="estado" class="form-label fw-bold">Estado del Pedido</label>
                    <select name="estado" id="estado" class="form-control shadow-sm" required>
                        <option value="pendiente" {{ $pedido->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="entregado" {{ $pedido->estado == 'entregado' ? 'selected' : '' }}>Entregado</option>
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary shadow">Volver</a>
                    <button type="submit" class="btn btn-warning shadow">
                        <i class="fa-solid fa-pencil-alt"></i> Actualizar Pedido
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

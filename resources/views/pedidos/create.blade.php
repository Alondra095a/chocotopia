@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Crear Nuevo Pedido</h1>
        
        <div class="card-body">
            <form action="{{ route('pedidos.store') }}" method="POST">
                @csrf
                
                <!-- Fecha -->
                <div class="mb-3">
                    <label for="fecha" class="form-label fw-bold">Fecha</label>
                    <input type="date" name="fecha" class="form-control shadow-sm" id="fecha" required>
                </div>

                <!-- Monto -->
                <div class="mb-3">
                    <label for="monto" class="form-label fw-bold">Monto</label>
                    <input type="number" name="monto" class="form-control shadow-sm" id="monto" required>
                </div>

                <!-- Descripción -->
                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" class="form-control shadow-sm" id="descripcion"></textarea>
                </div>

                <!-- Cliente -->
                <div class="mb-3">
                    <label for="id_cliente" class="form-label fw-bold">Cliente</label>
                    <select name="id_cliente" class="form-control shadow-sm" id="id_cliente" required>
                        <option value="">Selecciona un cliente</option>
                        @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id_cliente }}">{{ $cliente->persona->nombre }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('pedidos.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-primary">Crear Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonasController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\MateriasController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ChocolateController;
use App\Http\Controllers\DulceController;
use App\Http\Controllers\EspecialController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\PromocionController;

Route::resource('promociones', PromocionController::class);

Route::resource('ventas', VentaController::class);

Route::resource('producciones', ProduccionController::class);

Route::resource('especiales', EspecialController::class);

Route::resource('dulces', DulceController::class);

Route::resource('chocolates', ChocolateController::class);

Route::resource('productos', ProductoController::class);

Route::resource('materias', MateriasController::class);

Route::resource('proveedores', ProveedorController::class);

Route::resource('empleados', EmpleadoController::class);

Route::resource('clientes', ClientesController::class);
Route::resource('pedidos', PedidosController::class);

// Rutas para el CRUD de Personas
Route::resource('personas', PersonasController::class);

Route::get("configuracion", function () {
    return view('configuracion');
});

use App\Http\Controllers\LandingController;

Route::get('/', [LandingController::class, 'index'])->name('landing');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



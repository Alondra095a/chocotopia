<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clientes; 
class DashboardController extends Controller
{
    public function index()
{
    $clientes = Clientes::all(); // Obtener todos los clientes
    return view('home', compact('clientes'));
}
}

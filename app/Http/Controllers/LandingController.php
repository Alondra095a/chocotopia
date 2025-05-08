<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class LandingController extends Controller
{
    public function index()
    {
        $productos = Producto::whereNull('deleted_at')->latest()->get();
        return view('welcome', compact('productos'));
    }
}


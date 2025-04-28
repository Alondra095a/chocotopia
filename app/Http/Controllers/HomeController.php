<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Chocolate;
use App\Models\Dulce;
use App\Models\Especial;




class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $productos = Producto::whereNull('deleted_at')->get();
        $chocolates = Chocolate::with('producto')->get();
        $dulces = Dulce::with('producto')->get();
        $especiales = Especial::with('producto')->get();
    
        return view('home', compact('productos', 'chocolates', 'dulces', 'especiales'));
    }
}

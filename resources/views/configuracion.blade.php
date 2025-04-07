@extends('layouts.app')

@section('content')
<h3 class="bg-primary text-white p-3 rounded-top">Configuración</h3>
<h5 class="p-2"><a href="{{url('chocotopia')}}" class=" btn text-decoration-none {{request()->routeIs('chocotopia')?'active_custom':''}} text-white"><i class="fa-solid fa-gear"></i> Regresar </a></h5>
@endsection
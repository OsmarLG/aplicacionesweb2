@extends('layouts.app')

@section('icono')
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a2.25 2.25 0 00-2.25-2.25H15a3 3 0 11-6 0H5.25A2.25 2.25 0 003 12m18 0v6a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 9m18 0V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v3" />
  </svg>
  
@endsection
@section('titulo')
    Canvas
@endsection

@section('contenido')
    Hola {{ auth()->user()->username }}

    <div>
        <nav id="nav-home">
            <div>
                <a href="{{ route('home') }}">Ir a Home</a>
            </div>
            <div>
                @admin
                <a href="{{ route('encuestas') }}">Encuestas</a>
                @endadmin
            </div>
        </nav>
    </div>

    <div id="mi_home">
        <div>
            <h3>Todos los canvas</h3>
        </div>

        <div id="mis_canvas">
            @if (count($canvas) > 0)
                @foreach ($canvas as $canva)
                    <div id="canva">
                        <p>Creado por: <span>{{ $canva->usuario->username }}</span></p>
                        <img src="{{ asset('canvas/' . $canva->nombre_canva) }}" alt="Canva">
                        <button><a href="{{ route('canva.download', ['id' => $canva->id]) }}">Descargar</a></button>
                    </div>
                @endforeach
            @else
                <p>No hay canvas creados</p>
            @endif
        </div>
    </div>
@endsection
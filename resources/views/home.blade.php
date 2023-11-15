@extends('layouts.app')

@section('icono')
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
</svg>
@endsection
@section('titulo')
    Home
@endsection

@section('contenido')
    Hola {{ auth()->user()->username }}

    <div>
        <nav id="nav-home">
            <div>
                @survey
                <a href="{{ route('canva.create') }}">Crear Canva</a>
                <a href="{{ route('canva.index') }}">Mis Canvas</a>
                @endsurvey
            </div>
            <div>
                @admin
                <a href="{{ route('encuestas') }}">Encuestas</a>
                @endadmin
                @if ($realizoEncuesta == false)
                    @survey
                        <a href="{{ route('encuestas.create') }}">Realizar Encuesta</a>
                    @endsurvey
                @endif
            </div>
        </nav>
    </div>

    <div id="home">
        <div>
            <h3>Todos los canvas</h3>
        </div>

        <div id="canvas">
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
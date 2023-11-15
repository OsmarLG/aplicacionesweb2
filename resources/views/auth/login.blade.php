@extends('layouts.app')

@section('titulo')
    Iniciar Sesi&oacute;n
@endsection

@section('contenido')
<div id="login">
    <div id="img_login">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
        </svg>            
    </div>
    <div>
        <form method="POST" action="{{ route('login') }}" novalidate>
            @csrf     
            
            @if (session('mensaje'))
                <p>       
                    {{ session('mensaje') }}
                </p>
            @endif

            <!-- INPUT USERNAME-->
            <div>
                <label for="username">
                    Nombre de Usuario
                </label>
                <input 
                    id="username"
                    name="username"
                    type="text"
                    placeholder="T&uacute; Nombre de Usuario"
                    value="{{old('username')}}" 
                />
                @error('username')
                    <p>{{$message}}</p>
                @enderror
            </div>
            
            <!-- INPUT PASSWORD-->
            <div>
                <label for="password">
                    Contraseña
                </label>
                <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="T&uacute; Contraseña"
                />
                @error('password')
                    <p>{{$message}}</p>
                @enderror
            </div>

            <div>
                <input type="checkbox" name="remember"> 
                <label id="mantener">Mantener mi sesi&oacute;n abierta</label>
            </div>

            <div>
                <div>
                    <input 
                        type="submit"
                        value="Iniciar Sesi&oacute;n"
                    />
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

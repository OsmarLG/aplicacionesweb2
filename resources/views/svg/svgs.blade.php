@extends('layouts.app')

@section('icono')
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
</svg>
@endsection

@section('titulo')
    Crear SVG aleatorio
@endsection

@section('contenido')
    Hola {{ auth()->user()->username }}

    <div>
        <nav id="nav-home">
            <div>
                @survey
                <a href="{{ route('home') }}">Ir a Home</a>
                @endsurvey
            </div>
            <div>
                @admin
                <a href="{{ route('encuestas') }}">Encuestas</a>
                @endadmin
            </div>
        </nav>
    </div>

    <div>
        <svg id="svg-container"></svg>
        <button id="generar-svg-btn">Generar SVG</button>
    </div>

@endsection
    
@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const svgContainer = document.getElementById('svg-container');
        const nombreUsuario = "{{ auth()->user()->username }}";

        function colorAleatorio() {
            return '#' + Math.floor(Math.random() * 16777215).toString(16);
        }

        function generarFiguraUsuario(usuario) {
            const figuraUsuario = document.createElementNS('http://www.w3.org/2000/svg', 'svg');
            figuraUsuario.setAttribute('width', '100%');
            figuraUsuario.setAttribute('height', '100%');
            figuraUsuario.style.fill = colorAleatorio();

            switch (usuario) {
                case 'osmarlg':
                    figuraUsuario.innerHTML = '<ellipse cx="240" cy="100" rx="220" ry="30" style="fill:purple" />' +
                        '<ellipse cx="220" cy="70" rx="190" ry="20" style="fill:lime" />' +
                        '<ellipse cx="210" cy="45" rx="170" ry="15" style="fill:yellow" />';
                    break;
                case 'sprinfil':
                    figuraUsuario.innerHTML = '<polygon points="220,10 300,210 170,250 123,234" style="fill:lime;stroke:purple;stroke-width:1" />';
                    break;
                case 'larzzz17':
                    figuraUsuario.innerHTML = '<polygon points="100,10 40,198 190,78 10,78 160,198" style="fill:lime;stroke:purple;stroke-width:5;fill-rule:evenodd;"/>';
                    break;
                case 'fantasticjaac':
                    figuraUsuario.innerHTML = '<path id="lineAB" d="M 100 350 l 150 -300" stroke="red" stroke-width="3" fill="none" />' +
                        '<path id="lineBC" d="M 250 50 l 150 300" stroke="red" stroke-width="3" fill="none" />' +
                        '<path d="M 175 200 l 150 0" stroke="green" stroke-width="3" fill="none" />' +
                        '<path d="M 100 350 q 150 -300 300 0" stroke="blue" stroke-width="5" fill="none" />' +
                        '<g stroke="black" stroke-width="3" fill="black">' +
                        '<circle id="pointA" cx="100" cy="350" r="3" />' +
                        '<circle id="pointB" cx="250" cy="50" r="3" />' +
                        '<circle id="pointC" cx="400" cy="350" r="3" />' +
                        '</g>' +
                        '<g font-size="30" font-family="sans-serif" fill="black" stroke="none" text-anchor="middle">' +
                        '<text x="100" y="350" dx="-30">A</text>' +
                        '<text x="250" y="50" dy="-10">B</text>' +
                        '<text x="400" y="350" dx="30">C</text>' +
                        '</g>';
                    break;
                default:
                    figuraUsuario.innerHTML = '<rect width="300" height="100" style="fill:rgb(0,0,255);stroke-width:3;stroke:rgb(0,0,0)" />';
                    break;
            }

            return figuraUsuario;
        }

        function generarSVG() {
            // Limpiar contenido anterior
            svgContainer.innerHTML = '';

            // Generar figura del usuario
            const figuraUsuario = generarFiguraUsuario(nombreUsuario);
            svgContainer.appendChild(figuraUsuario);

            // Generar texto
            const texto = document.createElementNS('http://www.w3.org/2000/svg', 'text');
            texto.setAttribute('x', '50%');
            texto.setAttribute('y', '80%');
            texto.setAttribute('font-size', Math.floor(Math.random() * (32 - 18 + 1)) + 18 + 'px'); // Tamaño aleatorio entre 18 y 32
            texto.setAttribute('font-family', 'Arial, sans-serif');
            texto.setAttribute('fill', colorAleatorio());
            texto.setAttribute('text-anchor', 'middle');
            texto.setAttribute('alignment-baseline', 'middle');
            texto.style.textTransform = Math.random() < 0.5 ? 'uppercase' : 'none'; // Uppercase aleatorio
            texto.textContent = nombreUsuario;

            // Color aleatorio para el texto
            texto.style.fill = colorAleatorio();

            svgContainer.appendChild(texto);
        }

        // Asociar la función generarSVG al evento click del botón
        document.getElementById('generar-svg-btn').addEventListener('click', generarSVG);

        // Generar el SVG inicialmente al cargar la página
        generarSVG();
    });
</script>
@endsection


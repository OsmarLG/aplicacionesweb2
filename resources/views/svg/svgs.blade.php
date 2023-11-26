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
                    figuraUsuario.innerHTML = '<svg width="1000" height="600" xmlns="http://www.w3.org/2000/svg">' +
                        // Cielo
                        '<rect x="0" y="0" width="1000" height="300" style="fill:skyblue" />' +

                        // Montañas
                        '<polygon points="0,300 150,150 300,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="100,300 250,150 400,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="200,300 350,150 500,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="300,300 450,150 600,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="400,300 550,150 700,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="500,300 650,150 800,300" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="600,300 750,150 900,300" style="fill:brown;stroke:black;stroke-width:1" />' +

                        // Suelo
                        '<rect x="0" y="300" width="1000" height="300" style="fill:snow;stroke:black;stroke-width:2" />' +

                        // Casa
                        '<rect x="750" y="350" width="150" height="150" style="fill:burlywood;stroke:black;stroke-width:2" />' +
                        '<polygon points="750,350 825,250 900,350" style="fill:burlywood;stroke:black;stroke-width:2" />' +
                        '<rect x="800" y="400" width="30" height="50" style="fill:brown" />' +
                        '<circle cx="825" cy="400" r="5" style="fill:yellow" />' +
                        '<rect x="875" y="400" width="30" height="50" style="fill:brown" />' +

                        // Árbol 1
                        '<rect x="50" y="400" width="20" height="50" style="fill:brown" />' +
                        '<polygon points="60,350 40,400 80,400" style="fill:green" />' +
                        '<polygon points="60,330 30,380 90,380" style="fill:green" />' +
                        '<polygon points="60,310 20,360 100,360" style="fill:green" />' +
                        '<circle cx="60" cy="310" r="10" style="fill:red" />' +
                        '<circle cx="45" cy="330" r="12" style="fill:blue" />' +
                        '<circle cx="75" cy="330" r="12" style="fill:gold" />' +
                        '<rect x="55" y="360" width="10" height="10" style="fill:red" />' +
                        '<rect x="80" y="360" width="10" height="10" style="fill:blue" />' +
                        '<rect x="65" y="380" width="10" height="10" style="fill:gold" />' +

                        // Árbol 2
                        '<rect x="200" y="450" width="30" height="70" style="fill:brown" />' +
                        '<polygon points="215,400 185,450 215,450" style="fill:green" />' +
                        '<polygon points="215,380 170,430 260,430" style="fill:green" />' +
                        '<polygon points="215,360 155,410 275,410" style="fill:green" />' +
                        '<circle cx="215" cy="360" r="15" style="fill:red" />' +
                        '<circle cx="195" cy="380" r="18" style="fill:blue" />' +
                        '<circle cx="235" cy="380" r="18" style="fill:gold" />' +
                        '<rect x="200" y="410" width="15" height="15" style="fill:red" />' +
                        '<rect x="230" y="410" width="15" height="15" style="fill:blue" />' +
                        '<rect x="215" y="430" width="15" height="15" style="fill:gold" />' +

                        // Árbol 3
                        '<rect x="350" y="420" width="25" height="60" style="fill:brown" />' +
                        '<polygon points="362,370 338,420 362,420" style="fill:green" />' +
                        '<polygon points="362,350 320,400 404,400" style="fill:green" />' +
                        '<polygon points="362,330 302,380 422,380" style="fill:green" />' +
                        '<circle cx="362" cy="330" r="12" style="fill:red" />' +
                        '<circle cx="345" cy="350" r="15" style="fill:blue" />' +
                        '<circle cx="380" cy="350" r="15" style="fill:gold" />' +
                        '<rect x="362" y="380" width="12" height="12" style="fill:red" />' +
                        '<rect x="390" y="380" width="12" height="12" style="fill:blue" />' +
                        '<rect x="372" y="400" width="12" height="12" style="fill:gold" />' +

                        // Santa Claus
                        '<circle cx="600" cy="500" r="40" style="fill:red" />' +
                        '<rect x="580" y="540" width="40" height="80" style="fill:red" />' +
                        '<circle cx="600" cy="600" r="30" style="fill:lightgray" />' +
                        '<line x1="600" y1="560" x2="600" y2="600" style="stroke:black;stroke-width:3" />' +
                        '<line x1="600" y1="600" x2="570" y2="630" style="stroke:black;stroke-width:3" />' +
                        '<line x1="600" y1="600" x2="630" y2="630" style="stroke:black;stroke-width:3" />' +

                        // Muñeco de nieve
                        '<circle cx="700" cy="580" r="30" style="fill:white;stroke:black;stroke-width:2" />' +
                        '<circle cx="700" cy="540" r="25" style="fill:white;stroke:black;stroke-width:2" />' +
                        '<circle cx="700" cy="500" r="20" style="fill:white;stroke:black;stroke-width:2" />' +

                        // Trineo con renos
                        '<rect x="400" y="530" width="120" height="40" style="fill:brown" />' +
                        '<rect x="400" y="500" width="5" height="60" style="fill:brown" />' +
                        '<rect x="515" y="500" width="5" height="60" style="fill:brown" />' +
                        '<circle cx="430" cy="570" r="15" style="fill:brown" />' +
                        '<circle cx="460" cy="570" r="15" style="fill:brown" />' +
                        '<circle cx="490" cy="570" r="15" style="fill:brown" />' +

                        // Más Árboles
                        // ...

                        '</svg>';
                    break;
                case 'sprinfil':
                    figuraUsuario.innerHTML = '<svg width="500" height="500" xmlns="http://www.w3.org/2000/svg">' +
                        // Fondo - cielo
                        '<rect x="0" y="0" width="500" height="500" style="fill:skyblue" />' +

                        // Luna
                        '<circle cx="480" cy="30" r="60" style="fill:lightgray;stroke:black;stroke-width:1" />' +

                        // Suelo
                        '<rect x="0" y="250" width="500" height="250" style="fill:forestgreen" />' +
                        // Suelo
                        '<rect x="0" y="350" width="500" height="100" style="fill:gray" />' +

                        // Montañas
                        '<polygon points="0,250 100,150 200,250" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="100,250 200,150 300,250" style="fill:brown;stroke:black;stroke-width:1" />' +
                        '<polygon points="200,250 300,150 400,250" style="fill:brown;stroke:black;stroke-width:1" />' +

                        // Base de lanzamiento
                        '<rect x="200" y="350" width="100" height="30" style="fill:black;stroke:black;stroke-width:2" />' +

                        // Cohete principal
                        '<ellipse cx="250" cy="300" rx="40" ry="120" style="fill:orange;stroke:black;stroke-width:2" />' +
                        '<rect x="230" y="100" width="40" height="250" style="fill:gray;stroke:black;stroke-width:2" />' +

                        // Aleta izquierda
                        '<polygon points="230,300 200,370 230,370" style="fill:gray;stroke:black;stroke-width:1" />' +

                        // Aleta derecha
                        '<polygon points="270,300 300,370 270,370" style="fill:gray;stroke:black;stroke-width:1" />' +

                        // Ventana triangular en la cabina
                        '<polygon points="250,110 230,150 270,150" style="fill:lightblue;stroke:black;stroke-width:1" />' +

                        // Ventanas en el cuerpo del cohete
                        '<circle cx="250" cy="220" r="5" style="fill:lightblue;stroke:black;stroke-width:1" />' +
                        '<circle cx="250" cy="260" r="5" style="fill:lightblue;stroke:black;stroke-width:1" />' +
                        '<circle cx="250" cy="300" r="5" style="fill:lightblue;stroke:black;stroke-width:1" />' +

                        // Cohetes laterales
                        '<ellipse cx="180" cy="370" rx="15" ry="5" style="fill:red;stroke:black;stroke-width:1" />' +
                        '<ellipse cx="320" cy="370" rx="15" ry="5" style="fill:red;stroke:black;stroke-width:1" />' +

                        // Nubes
                        '<circle cx="100" cy="50" r="20" style="fill:white;stroke:black;stroke-width:1" />' +
                        '<circle cx="300" cy="80" r="25" style="fill:white;stroke:black;stroke-width:1" />' +
                        '<circle cx="400" cy="30" r="18" style="fill:white;stroke:black;stroke-width:1" />' +

                        '</svg>';
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


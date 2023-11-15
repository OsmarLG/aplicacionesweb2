@extends('layouts.app')

@section('icono')
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
  </svg>
  
@endsection
@section('titulo')
    Crear Nuevo Canva
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

    <form action="{{ route('canva.store') }}" method="post">
        @csrf
        <div id="canvas">
            <canvas id="lienzo"></canvas>
            <input type="hidden" name="imagen" id="imagenInput">
            <div id="controls">
                <p>Opciones de dibujo</p>

                <label for="grosorLinea">Grosor de línea:</label>
                <input type="range" id="grosorLinea" min="0" max="10" step="1" value="0">
        
                <label for="colorLinea">Color de línea:</label>
                <input type="color" id="colorLinea" value="#000000">
                <br>
                <label for="transparente">Fondo Transparente:</label>
                <input type="checkbox" id="transparente">   
        
                <label for="fondo">Color de fondo:</label>
                <input type="color" id="fondo" value="#ffffff">
                <br>
                <input type="file" id="cargarImagen" accept="image/*">
            </div>
            <div id="config">
                <button type="submit">Guardar Dibujo</button>
                <button type="button" id="resetear">Resetear</button>
            </div>
        </div>
    </form>

@endsection
    
@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var canvas = document.getElementById('lienzo');
        var ctx = canvas.getContext('2d');
        var dibujando = false;

        // Controles
        var grosorLineaInput = document.getElementById('grosorLinea');
            var colorLineaInput = document.getElementById('colorLinea');
            var fondoInput = document.getElementById('fondo');
            var transparenteCheckbox = document.getElementById('transparente');
            var cargarImagenInput = document.getElementById('cargarImagen');
            var resetearBtn = document.getElementById('resetear');

            // Configuración inicial
            ctx.lineJoin = 'round'; // Hace que las líneas sean más suaves
            ctx.lineCap = 'round';
            ctx.lineWidth = grosorLineaInput.value;
            ctx.strokeStyle = colorLineaInput.value;
            canvas.style.backgroundColor = fondoInput.value;

            grosorLineaInput.addEventListener('input', function () {
                ctx.lineWidth = this.value;
            });

            colorLineaInput.addEventListener('input', function () {
                ctx.strokeStyle = this.value;
            });

            fondoInput.addEventListener('input', function () {
                canvas.style.backgroundColor = this.value;
            });

            transparenteCheckbox.addEventListener('change', function () {
                canvas.style.backgroundColor = this.checked ? 'transparent' : fondoInput.value;
            });

            cargarImagenInput.addEventListener('change', function (e) {
                var imagen = new Image();
                imagen.onload = function () {
                    ctx.drawImage(imagen, 0, 0, canvas.width, canvas.height);
                };
                imagen.src = URL.createObjectURL(e.target.files[0]);
            });

            resetearBtn.addEventListener('click', function () {
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                canvas.style.backgroundColor = transparenteCheckbox.checked ? 'transparent' : fondoInput.value;
            });

        canvas.addEventListener('mousedown', function (e) {
            dibujando = true;
            ctx.beginPath();
            ctx.moveTo(getMouseX(e), getMouseY(e));
        });

        canvas.addEventListener('mousemove', function (e) {
            if (dibujando) {
                ctx.lineTo(getMouseX(e), getMouseY(e));
                ctx.stroke();
            }
        });

        canvas.addEventListener('mouseup', function () {
            dibujando = false;
            ctx.closePath();
            
            // Al finalizar el dibujo, actualiza el campo oculto con la imagen base64
            document.getElementById('imagenInput').value = canvas.toDataURL('image/png');
        });

        canvas.addEventListener('mouseout', function () {
            dibujando = false;
            ctx.closePath();
        });

        function getMouseX(e) {
            return (e.clientX - canvas.getBoundingClientRect().left) / canvas.clientWidth * canvas.width;
        }

        function getMouseY(e) {
            return (e.clientY - canvas.getBoundingClientRect().top) / canvas.clientHeight * canvas.height;
        }
    });
</script>
@endsection
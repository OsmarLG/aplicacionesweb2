@extends('layouts.app')

@section('icono')
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
  </svg>
@endsection
@section('titulo')
  
    Realizar Encuesta
@endsection

@section('contenido')
    Hola {{ auth()->user()->username }}

    <div>
        <h2>Encuesta</h2>

        <div>
            <form action="{{ route('encuestas.store') }}" method="POST" id="encuesta">
                @csrf
            
                <div class="pregunta visible">
                    <label for="edad">¿Qu&eacute; edad tienes?</label> <br>
                    <span>Pregunta #1</span>
                    <select id="edad" name="edad" required>
                        <option value="" selected disabled>--Selecciona una opción--</option>
                        <option value="-18">Menor de 18</option>
                        <option value="18-24">18-24</option>
                        <option value="25-34">25-34</option>
                        <option value="35-44">35-44</option>
                        <option value="45-54">45-54</option>
                        <option value="55-64">55-64</option>
                        <option value="65+">65 o más</option>
                    </select>
                </div>
            
                <div class="pregunta">
                    <label for="sexo">¿C&oacute;mo te identificas?</label> <br>
                    <span>Pregunta #2</span>
                    <select id="sexo" name="sexo" required>
                        <option value="" selected disabled>--Selecciona una opción--</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                        <option value="No binario">No binario</option>
                        <option value="Prefiero No Decirlo">Prefiero No Decirlo</option>
                    </select>
                </div>
            
                <div class="pregunta">
                    <label for="frecuencia">¿Con qu&eacute; frecuencia visitas nuestra p&aacute;gina?</label> <br>
                    <span>Pregunta #3</span>
                    <select id="frecuencia" name="frecuencia" required>
                        <option value="" selected disabled>--Selecciona una opción--</option>
                        <option value="Diariamente">Diariamente</option>
                        <option value="Semanalmente">Semanalmente</option>
                        <option value="Mensualmente">Mensualmente</option>
                        <option value="Raramente">Raramente</option>
                        <option value="Primera">Primera vez</option>
                    </select>
                </div>
            
                <div class="pregunta">
                    <label for="acercamiento">¿C&oacute;mo nos encontraste?</label> <br>
                    <span>Pregunta #4</span>
                    <select id="acercamiento" name="acercamiento" required>
                        <option value="" selected disabled>--Selecciona una opción--</option>
                        <option value="WEB">Sitio Web</option>
                        <option value="Red Social">Redes Sociales</option>
                        <option value="Amigo">Recomendación de Amigo</option>
                        <option value="Ads">Publicidad</option>
                        <option value="Otro">Otro</option>
                    </select>
                </div>
            
                <div class="pregunta">
                    <label for="satisfaccion">Indica el Nivel de Satisfacción que tienes de nuestra plataforma (1-5):</label><br>
                    <span>Pregunta #5</span>
                    <input type="number" id="satisfaccion" name="satisfaccion" min="1" max="5" required>
                </div>
            
                <div class="pregunta">
                    <label for="mejorar">¿C&oacute;mo podemos mejorar?</label><br>
                    <span>Pregunta #6</span>
                    <textarea id="mejorar" name="mejorar" required></textarea>
                </div>
            
                <div class="pregunta">
                    <label for="comentario">Si tienes algun comentario, escribelo.</label><br>
                    <span>Pregunta #7</span>
                    <textarea id="comentario" name="comentario" required></textarea>
                </div>
            
                <div class="pregunta">
                    <label for="futuro">¿Participar&iacute;as nuevamente en el futuro?</label><br>
                    <span>Pregunta #8</span>
                    <select id="futuro" name="futuro" required>
                        <option value="SI">Sí</option>
                        <option value="NO">No</option>
                    </select>
                </div>
            
                <div class="pregunta">
                    <label for="correo">Ingresa tu Correo Electr&oacute;nico:</label><br>
                    <input type="email" id="correo" name="correo" required>

                    <button type="submit" id="terminar">Terminar Encuesta</button>
                </div>
            
                <div id="centrar">
                    <button type="button" id="anterior">Anterior</button>
                    <button type="button" id="siguiente">Siguiente</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var preguntas = document.querySelectorAll('.pregunta');
        var indicePreguntaActual = 0;

        // Mostrar la primera pregunta al cargar la página
        mostrarPregunta();

        function mostrarPregunta() {
            preguntas.forEach(function(pregunta, indice) {
                if (indice === indicePreguntaActual) {
                    pregunta.classList.add('visible');
                } else {
                    pregunta.classList.remove('visible');
                }
            });
        }

        // Función para avanzar a la siguiente pregunta
        function siguientePregunta() {
            if (indicePreguntaActual < preguntas.length - 1) {
                indicePreguntaActual++;
                mostrarPregunta();
            }
        }

        // Función para retroceder a la pregunta anterior
        function preguntaAnterior() {
            if (indicePreguntaActual > 0) {
                indicePreguntaActual--;
                mostrarPregunta();
            }
        }

        // Agregar eventos a los botones para avanzar y retroceder
        document.getElementById('siguiente').addEventListener('click', function() {
            siguientePregunta();
        });

        document.getElementById('anterior').addEventListener('click', function() {
            preguntaAnterior();
        });

        // Obtener los valores de los campos del formulario
        var userId = {{ auth()->user()->id }};
        var edad = document.getElementById('edad');
        var sexo = document.getElementById('sexo');
        var frecuencia = document.getElementById('frecuencia');
        var acercamiento = document.getElementById('acercamiento');
        var satisfaccion = document.getElementById('satisfaccion');
        var mejorar = document.getElementById('mejorar');
        var comentario = document.getElementById('comentario');
        var futuro = document.getElementById('futuro');
        var correo = document.getElementById('correo');

        // Revisar si hay datos en el localStorage para el usuario actual
        var encuestaData = JSON.parse(localStorage.getItem('encuestaData_' + userId));

        // Revisar si hay datos en el localStorage y si el usuario actual está en la lista
        if (encuestaData !== null && encuestaData.userId === userId) {
            console.log(encuestaData);

            // Rellenar los campos del formulario con la información del localStorage
            edad.value = encuestaData.edad;
            sexo.value = encuestaData.sexo;
            frecuencia.value = encuestaData.frecuencia;
            acercamiento.value = encuestaData.acercamiento;
            satisfaccion.value = encuestaData.satisfaccion;
            mejorar.value = encuestaData.mejorar;
            comentario.value = encuestaData.comentario;
            futuro.value = encuestaData.futuro;
            correo.value = encuestaData.correo;
        }

        // Agregar eventos de cambio a los campos del formulario
        edad.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de edad
            actualizarLocalStorage();
        });

        sexo.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de sexo
            actualizarLocalStorage();
        });

        frecuencia.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de frecuencia
            actualizarLocalStorage();
        });

        acercamiento.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de acercamiento
            actualizarLocalStorage();
        });

        satisfaccion.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de satisfaccion
            actualizarLocalStorage();
        });

        mejorar.addEventListener('input', function() {
            // Lógica para manejar el cambio en el campo de mejorar
            actualizarLocalStorage();
        });

        comentario.addEventListener('input', function() {
            // Lógica para manejar el cambio en el campo de comentario
            actualizarLocalStorage();
        });

        futuro.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de futuro
            actualizarLocalStorage();
        });

        correo.addEventListener('change', function() {
            // Lógica para manejar el cambio en el campo de correo
            actualizarLocalStorage();
        });

        // Resto de los eventos y lógica para otros campos...

        // Función para actualizar el localStorage
        function actualizarLocalStorage() {
            // Obtener los valores de los campos del formulario
            var edadValor = edad.value;
            var sexoValor = sexo.value;
            var frecuenciaValor = frecuencia.value;
            var acercamientoValor = acercamiento.value;
            var satisfaccionValor = satisfaccion.value;
            var mejorarValor = mejorar.value;
            var comentarioValor = comentario.value;
            var futuroValor = futuro.value;
            var correoValor = correo.value;

            // Crear un objeto con los valores
            var encuestaData = {
                userId: userId,
                edad: edadValor,
                sexo: sexoValor,
                frecuencia: frecuenciaValor,
                acercamiento: acercamientoValor,
                satisfaccion: satisfaccionValor,
                mejorar: mejorarValor,
                comentario: comentarioValor,
                futuro: futuroValor,
                correo: correoValor
            };

            // Convertir el objeto a una cadena JSON y almacenar en localStorage
            localStorage.setItem('encuestaData_' + userId, JSON.stringify(encuestaData));
        }
    });
</script>


@endsection
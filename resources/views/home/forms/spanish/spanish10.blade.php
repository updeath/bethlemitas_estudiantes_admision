@extends('home.homePage')

@section('title', 'Formulario de Español grado 10°')

<style>
    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }

    .add{
        filter: drop-shadow(0 0 10px black )
    }

    .container-success {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 80vh; /* Centra verticalmente */
        text-align: center; /* Centra horizontalmente el contenido */
        padding: 20px;
    }

    .container-success img {
        width: 250px; /* Ajusta el tamaño del logo según tus necesidades */
        margin-bottom: 15px;
    }

    .info-success {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #d4edda; /* Fondo verde claro (aviso de éxito) */
        color: #155724; /* Texto verde oscuro */
        border: 1px solid #c3e6cb; /* Borde verde claro */
        padding: 15px 25px; /* Ajusta el padding interno */
        border-radius: 5px; /* Bordes redondeados */
        max-width: 550px; /* Limita el ancho máximo */
        width: 100%; /* Asegura que el div ocupe todo el ancho disponible */
        height: 100px;
        box-shadow: 0 7px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar un efecto elevado */
        margin-top: 10px; /* Reduce el espacio entre el logo y el mensaje */
        font-size: 23px;
    }

</style>

@section('content_dashboard')
@if (!$hasRecord)
    <div class="bg-white rounded-lg  p-7 mx-10">
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 10°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md"action="{{ route('store.spanish10') }}" method="POST">
            @csrf


            <!-- Pregunta 1 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">1. La conclusión del autor en contra de la tesis de la ANIF requiere mayor sustentación, porque</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/nine/1.jpeg') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD1" name="spanishPD1" value="A. no se apoya en fuentes ni en opiniones de analistas."
                    {{old('spanishPD1') == 'A. no se apoya en fuentes ni en opiniones de analistas.' ? 'checked' : ''}}>
                    <span class="ml-2">A. no se apoya en fuentes ni en opiniones de analistas.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD1" name="spanishPD1" value="B. no considera la relación entre TE y eficiencia del sistema penal en Chile."
                    {{old('spanishPD1') == 'B. no considera la relación entre TE y eficiencia del sistema penal en Chile.' ? 'checked' : ''}}>
                    <span class="ml-2">B. no considera la relación entre TE y eficiencia del sistema penal en Chile.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD1" name="spanishPD1" value="C. supone que el caso colombiano es semejante al de Estados Unidos."
                    {{old('spanishPD1') == 'C. supone que el caso colombiano es semejante al de Estados Unidos.' ? 'checked' : ''}}>
                    <span class="ml-2">C. supone que el caso colombiano es semejante al de Estados Unidos.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD1" name="spanishPD1" value="D. supone que una menor TE en el país se traduce en un sistema penal más eficiente."
                    {{old('spanishPD1') == 'D. supone que una menor TE en el país se traduce en un sistema penal más eficiente.' ? 'checked' : ''}}>
                    <span class="ml-2">D. supone que una menor TE en el país se traduce en un sistema penal más eficiente.</span>
                </div>
                @error('spanishPD1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">2. En el enunciado "Pero la tendencia presentada por la ANIF es correcta", la palabra "Pero" contribuye a</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD2" name="spanishPD2" value="A. señalar la invalidez de una tesis posterior."
                    {{old('spanishPD2') == 'A. señalar la invalidez de una tesis posterior.' ? 'checked' : ''}}>
                    <span class="ml-2">A. señalar la invalidez de una tesis posterior.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD2" name="spanishPD2" value="B. refutar la validez de un juicio previo."
                    {{old('spanishPD2') == 'B. refutar la validez de un juicio previo.' ? 'checked' : ''}}>
                    <span class="ml-2">B. refutar la validez de un juicio previo.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD2" name="spanishPD2" value="C. relativizar la validez de una premisa posterior."
                    {{old('spanishPD2') == 'C. relativizar la validez de una premisa posterior.' ? 'checked' : ''}}>
                    <span class="ml-2">C. relativizar la validez de una premisa posterior.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD2" name="spanishPD2" value="D. indicar la validez de una información previa."
                    {{old('spanishPD2') == 'D. indicar la validez de una información previa.' ? 'checked' : ''}}>
                    <span class="ml-2">D. indicar la validez de una información previa.</span>
                </div>
                @error('spanishPD2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">3. Teniendo en cuenta el argumento central del autor y la estructura argumentativa de su escrito, ¿qué función cumplen, respectivamente, el tercer y cuarto párrafo del texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD3" name="spanishPD3" value="A. Evidencia/antítesis."
                    {{old('spanishPD3') == 'A. Evidencia/antítesis.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Evidencia/antítesis.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD3" name="spanishPD3" value="B. Evidencia/argumento."
                    {{old('spanishPD3') == 'B. Evidencia/argumento.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Evidencia/argumento.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD3" name="spanishPD3" value="C. Ejemplo/síntesis."
                    {{old('spanishPD3') == 'C. Ejemplo/síntesis.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Ejemplo/síntesis.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD3" name="spanishPD3" value="D. Ejemplo/contraejemplo."
                    {{old('spanishPD3') == 'D. Ejemplo/contraejemplo.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Ejemplo/contraejemplo.</span>
                </div>
                @error('spanishPD3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 4 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">4. Lee los siguientes fragmentos de textos e identifica su género, luego escribe el nombre del género al que pertenece en la línea ubicada en la parte inferior de cada uno.
                </label>

                <div class="mb-10">
                    <span>Fragmento A:</span>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/spanish/nine/4A.jpeg') }}" alt="Imagen sin leyenda">
                    </div>

                    <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                    id="comment_fragmentPD4_1" 
                    name="comment_fragmentPD4_1"  
                    placeholder="Tu respuesta aquí: ">{{ old('comment_fragmentPD4_1') }}</textarea>
                    @error('comment_fragmentPD4_1')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <div class="mb-10">
                    <span>Fragmento B:</span>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/spanish/nine/4B.jpeg') }}" alt="Imagen sin leyenda">
                    </div>

                    <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                    id="comment_fragmentPD4_2" 
                    name="comment_fragmentPD4_2"  
                    placeholder="Tu respuesta aquí: ">{{ old('comment_fragmentPD4_2') }}</textarea>
                    @error('comment_fragmentPD4_2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <div class="mb-10">
                    <span>Fragmento C:</span>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/spanish/nine/4C.jpeg') }}" alt="Imagen sin leyenda">
                    </div>

                    <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                    id="comment_fragmentPD4_3" 
                    name="comment_fragmentPD4_3"  
                    placeholder="Tu respuesta aquí: ">{{ old('comment_fragmentPD4_3') }}</textarea>
                    @error('comment_fragmentPD4_3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <div class="">
                    <span>Fragmento D:</span>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/spanish/nine/4D.jpeg') }}" alt="Imagen sin leyenda">
                    </div>

                    <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                    id="comment_fragmentPD4_4" 
                    name="comment_fragmentPD4_4"  
                    placeholder="Tu respuesta aquí: ">{{ old('comment_fragmentPD4_4') }}</textarea>
                    @error('comment_fragmentPD4_4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>
                
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">5. Analice la siguiente historieta y luego escriba cuál es su intención comunicativa de acuerdo al análisis pragmático de la imagen. Enfatice en cómo los elementos extralingüísticos afectan la transmisión del mensaje. 
                </label>
                
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/nine/5.jpeg') }}" alt="Imagen sin leyenda">
                </div>

                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPD5" 
                name="commentPD5"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPD5') }}</textarea>
                @error('commentPD5')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>


            <!-- Pregunta 6 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">6. ¿Qué es la pragmática? ¿A qué ciencia pertenece? ¿Cuál es su objeto de estudio? ¿Qué aspectos intervienen en un análisis pragmático?
                </label>
                
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPD6" 
                name="commentPD6"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPD6') }}</textarea>
                @error('commentPD6')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">7. ¿Qué son los tecnicismos y los neologismos? Mencione, además, un ejemplo de cada concepto.
                </label>
                
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPD7" 
                name="commentPD7"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPD7') }}</textarea>
                @error('commentPD7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué es la lectura crítica?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD8" name="spanishPD8" value="A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica."
                    {{old('spanishPD8') == 'A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica.' ? 'checked' : ''}}>
                    <span class="ml-2">A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD8" name="spanishPD8" value="B. La habilidad de identificar, interpretar, argumentar y proponer soluciones a problemas reales o hipotéticos."
                    {{old('spanishPD8') == 'B. La habilidad de identificar, interpretar, argumentar y proponer soluciones a problemas reales o hipotéticos.' ? 'checked' : ''}}>
                    <span class="ml-2">B. La habilidad de identificar, interpretar, argumentar y proponer soluciones a problemas reales o hipotéticos.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD8" name="spanishPD8" value="C. La habilidad de expresar ideas, opiniones, sentimientos y emociones de forma oral o escrita con claridad y coherencia."
                    {{old('spanishPD8') == 'C. La habilidad de expresar ideas, opiniones, sentimientos y emociones de forma oral o escrita con claridad y coherencia.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La habilidad de expresar ideas, opiniones, sentimientos y emociones de forma oral o escrita con claridad y coherencia.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD8" name="spanishPD8" value="D. La habilidad de interactuar con otras personas respetando la diversidad, los derechos humanos y los valores democráticos."
                    {{old('spanishPD8') == 'D. La habilidad de interactuar con otras personas respetando la diversidad, los derechos humanos y los valores democráticos.' ? 'checked' : ''}}>
                    <span class="ml-2">D. La habilidad de interactuar con otras personas respetando la diversidad, los derechos humanos y los valores democráticos.</span>
                </div>
                @error('spanishPD8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <span>Lee el texto y responde las preguntas 9 y 10.</span>
                <h1 class="Font-bold">La metamorfosis, de Franz Kafka</h1> <br>
                <p>Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto. Estaba tumbado sobre su espalda dura, y en forma de caparazón y, al levantar un poco la cabeza veía un vientre abombado, parduzco, dividido por partes duras en forma de arco, sobre cuya protuberancia apenas podía mantenerse el cobertor, a punto ya de resbalar al suelo. Sus muchas patas, ridículamente pequeñas en comparación con el resto de su tamaño, le vibraban desamparadas ante los ojos.</p> <br>
                <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué tipo de texto es el anterior?</label>

                <div class="flex items-center mb-2">
                    
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD9" name="spanishPD9" value="A. Un microrrelato"
                    {{old('spanishPD9') == 'A. Un microrrelato' ? 'checked' : ''}}>
                    <span class="ml-2">A. Un microrrelato</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD9" name="spanishPD9" value="B. Un poema"
                    {{old('spanishPD9') == 'B. Un poema' ? 'checked' : ''}}>
                    <span class="ml-2">B. Un poema</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD9" name="spanishPD9" value="C. Una fábula"
                    {{old('spanishPD9') == 'C. Una fábula' ? 'checked' : ''}}>
                    <span class="ml-2">C. Una fábula</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD9" name="spanishPD9" value="D. Un fragmento de una novela"
                    {{old('spanishPD9') == 'D. Un fragmento de una novela' ? 'checked' : ''}}>
                    <span class="ml-2">D. Un fragmento de una novela</span>
                </div>
                @error('spanishPD9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué efecto produce en el lector la descripción del protagonista?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD10" name="spanishPD10" value="A. Le causa risa y diversión"
                    {{old('spanishPD10') == 'A. Le causa risa y diversión' ? 'checked' : ''}}>
                    <span class="ml-2">A. Le causa risa y diversión</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD10" name="spanishPD10" value="B. Le provoca miedo y repulsión"
                    {{old('spanishPD10') == 'B. Le provoca miedo y repulsión' ? 'checked' : ''}}>
                    <span class="ml-2">B. Le provoca miedo y repulsión</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD10" name="spanishPD10" value="C. Le inspira ternura y compasión"
                    {{old('spanishPD10') == 'C. Le inspira ternura y compasión' ? 'checked' : ''}}>
                    <span class="ml-2">C. Le inspira ternura y compasión</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPD10" name="spanishPD10" value="D. Le genera curiosidad e interés"
                    {{old('spanishPD10') == 'D. Le genera curiosidad e interés' ? 'checked' : ''}}>
                    <span class="ml-2">D. Le genera curiosidad e interés</span>
                </div>
                @error('spanishPD10')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <div class=" ml-[5%] mt-5 ">
                <button type="submit"
                    class="bg-[#3A8BC0] text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none">Enviar
                    Respuestas
                </button>
            </div>

        </form>


    </div>
@else 
    <div class="container-success">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        <div class="info-success">
            <h1><i class="fas fa-check text-sm"></i> El formulario se ha completado exitosamente</h1>
        </div>
    </div>
@endif
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'success',
            title: '{{ session('success') }}',
        });
    </script>
@endif

@if (session('error'))
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            iconColor: 'white',
            customClass: {
                popup: 'colored-toast',
            },
            showConfirmButton: false,
            timer: 2500,
            timerProgressBar: true,
        });
        Toast.fire({
            icon: 'error',
            title: '{{ session('error') }}',
        });
    </script>
@endif
@endsection
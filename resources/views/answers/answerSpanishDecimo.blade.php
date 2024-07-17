@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($spanishDecimos->isEmpty())
        <p>No hay respuestas disponibles para este usuario.</p>
    @else
        <div class="respuestas" style="overflow-x: scroll;">
            <table>
                <thead>
                    <tr>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 1</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 2</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 3</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 4</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 5</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 6</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 7</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 8</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 9</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 10</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($spanishDecimos as $spanishDecimo)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishDecimo->spanishPD10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="bg-white rounded-lg  p-7 mx-10">
        <!-- Pregunta 1 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">1. La conclusión del autor en contra de la tesis de la ANIF requiere mayor sustentación, porque</label>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/nine/1.jpeg') }}" alt="Imagen sin leyenda">
            </div>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. no se apoya en fuentes ni en opiniones de analistas.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. no considera la relación entre TE y eficiencia del sistema penal en Chile.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. supone que el caso colombiano es semejante al de Estados Unidos.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. supone que una menor TE en el país se traduce en un sistema penal más eficiente.</span>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">2. En el enunciado "Pero la tendencia presentada por la ANIF es correcta", la palabra "Pero" contribuye a</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. señalar la invalidez de una tesis posterior.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. refutar la validez de un juicio previo.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. relativizar la validez de una premisa posterior.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. indicar la validez de una información previa.</span>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">3. Teniendo en cuenta el argumento central del autor y la estructura argumentativa de su escrito, ¿qué función cumplen, respectivamente, el tercer y cuarto párrafo del texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Evidencia/antítesis.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Evidencia/argumento.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Ejemplo/síntesis.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Ejemplo/contraejemplo.</span>
            </div>
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

                <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                    R/= {{ $spanishDecimo->comment_fragmentPD4_1 }}</div>
            </div>

            <div class="mb-10">
                <span>Fragmento B:</span>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/nine/4B.jpeg') }}" alt="Imagen sin leyenda">
                </div>

                <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                    R/= {{ $spanishDecimo->comment_fragmentPD4_2 }}</div>
            </div>

            <div class="mb-10">
                <span>Fragmento C:</span>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/nine/4C.jpeg') }}" alt="Imagen sin leyenda">
                </div>

                <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                    R/= {{ $spanishDecimo->comment_fragmentPD4_3 }}</div>
            </div>

            <div class="">
                <span>Fragmento D:</span>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/nine/4D.jpeg') }}" alt="Imagen sin leyenda">
                </div>
                <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                    R/= {{ $spanishDecimo->comment_fragmentPD4_4 }}</div>
            </div>
            
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">5. Analice la siguiente historieta y luego escriba cuál es su intención comunicativa de acuerdo al análisis pragmático de la imagen. Enfatice en cómo los elementos extralingüísticos afectan la transmisión del mensaje. 
            </label>
            
            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/nine/5.jpeg') }}" alt="Imagen sin leyenda">
            </div>

            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishDecimo->commentPD5}}</div>
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">6. ¿Qué es la pragmática? ¿A qué ciencia pertenece? ¿Cuál es su objeto de estudio? ¿Qué aspectos intervienen en un análisis pragmático?
            </label>
            
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishDecimo->commentPD6 }}</div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">7. ¿Qué son los tecnicismos y los neologismos? Mencione, además, un ejemplo de cada concepto.
            </label>
            
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishDecimo->commentPD7 }}</div>
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué es la lectura crítica?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. La habilidad de identificar, interpretar, argumentar y proponer soluciones a problemas reales o hipotéticos.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. La habilidad de expresar ideas, opiniones, sentimientos y emociones de forma oral o escrita con claridad y coherencia.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. La habilidad de interactuar con otras personas respetando la diversidad, los derechos humanos y los valores democráticos.</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <span>Lee el texto y responde las preguntas 9 y 10.</span>
            <h1 class="Font-bold">La metamorfosis, de Franz Kafka</h1> <br>
            <p>Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto. Estaba tumbado sobre su espalda dura, y en forma de caparazón y, al levantar un poco la cabeza veía un vientre abombado, parduzco, dividido por partes duras en forma de arco, sobre cuya protuberancia apenas podía mantenerse el cobertor, a punto ya de resbalar al suelo. Sus muchas patas, ridículamente pequeñas en comparación con el resto de su tamaño, le vibraban desamparadas ante los ojos.</p> <br>
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué tipo de texto es el anterior?</label>

            <div class="flex items-center mb-2">         
                <span class="ml-2">A. Un microrrelato</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Un poema</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Una fábula</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Un fragmento de una novela</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué efecto produce en el lector la descripción del protagonista?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Le causa risa y diversión</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Le provoca miedo y repulsión</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Le inspira ternura y compasión</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Le genera curiosidad e interés</span>
            </div>
        </div>
</div>

@endsection
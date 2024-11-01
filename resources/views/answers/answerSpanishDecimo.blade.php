@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">

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
                    @php
                    $respuestas = [
                        $spanishDecimo->spanishPD1,
                        $spanishDecimo->spanishPD2,
                        $spanishDecimo->spanishPD3,
                        $spanishDecimo->spanishPD4,
                        $spanishDecimo->spanishPD5,
                        $spanishDecimo->spanishPD6,
                        $spanishDecimo->spanishPD7,
                        $spanishDecimo->spanishPD8,
                        $spanishDecimo->spanishPD9,
                        $spanishDecimo->spanishPD10
                    ];

                    $respuestasCorrectas = [
                        'D. supone que una menor TE en el país se traduce en un sistema penal más eficiente.',
                        'B. refutar la validez de un juicio previo.',
                        'A. Evidencia/antítesis.',
                        null,  // respuesta 4 no es una comparación de string
                        null,  // respuesta 5 no es una comparación de string
                        null,  // respuesta 6 no es una comparación de string
                        null,  // respuesta 7 no es una comparación de string
                        'A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica.',
                        'D. Un fragmento de una novela',
                        'B. Le provoca miedo y repulsión',
                    ];
                    @endphp
                        <tr>
                            @foreach ($respuestas as $index => $respuesta)
                                @if ($respuestasCorrectas[$index] !== null)
                                    @if ($respuesta == $respuestasCorrectas[$index])
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: green"></i></td>
                                    @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-x text-sm" style="color: red"></i></td>
                                    @endif
                                @else
                                    @if ($respuesta >= 4)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: green"></i></td>
                                    @elseif ($respuesta < 4 && $respuesta >= 3)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: #c2bd60"></i></td>
                                    @elseif ($respuesta < 3)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-x text-sm" style="color: red"></i></td>
                                    @endif
                                @endif
                            @endforeach
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
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD1 }}</span>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">2. En el enunciado "Pero la tendencia presentada por la ANIF es correcta", la palabra "Pero" contribuye a</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD2 }}</span>
            </div>
            
        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">3. Teniendo en cuenta el argumento central del autor y la estructura argumentativa de su escrito, ¿qué función cumplen, respectivamente, el tercer y cuarto párrafo del texto?</label>
            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD3 }}</span>
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
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD8 }}</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <span>Lee el texto y responde las preguntas 9 y 10.</span>
            <h1 class="Font-bold">La metamorfosis, de Franz Kafka</h1> <br>
            <p>Cuando Gregorio Samsa se despertó una mañana después de un sueño intranquilo, se encontró sobre su cama convertido en un monstruoso insecto. Estaba tumbado sobre su espalda dura, y en forma de caparazón y, al levantar un poco la cabeza veía un vientre abombado, parduzco, dividido por partes duras en forma de arco, sobre cuya protuberancia apenas podía mantenerse el cobertor, a punto ya de resbalar al suelo. Sus muchas patas, ridículamente pequeñas en comparación con el resto de su tamaño, le vibraban desamparadas ante los ojos.</p> <br>
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué tipo de texto es el anterior?</label>

            <div class="flex items-center mb-2">         
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD9 }}</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué efecto produce en el lector la descripción del protagonista?</label>
            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishDecimo->spanishPD10 }}</span>
            </div>
        </div>
</div>

@endsection
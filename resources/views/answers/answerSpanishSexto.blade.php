@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">

    @if($spanishSextos->isEmpty())
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
                    @foreach($spanishSextos as $spanishSexto)
                    @php
                    $respuestas = [
                        $spanishSexto->spanishPSX1,
                        $spanishSexto->spanishPSX2,
                        $spanishSexto->spanishPSX3,
                        $spanishSexto->spanishPSX4,
                        $spanishSexto->spanishPSX5,
                        $spanishSexto->spanishPSX6,
                        $spanishSexto->spanishPSX7,
                        $spanishSexto->spanishPSX8,
                        $spanishSexto->spanishPSX9,
                        $spanishSexto->spanishPSX10
                    ];

                    $respuestasCorrectas = [
                        null,  // respuesta 1 no es una comparación de string
                        null,  // respuesta 2 no es una comparación de string
                        null,  // respuesta 3 no es una comparación de string
                        null,  // respuesta 4 no es una comparación de string
                        null,  // respuesta 5 no es una comparación de string
                        null,  // respuesta 6 no es una comparación de string
                        'A. Información interpretativa de hechos o acontecimientos.',
                        'B. El género periodístico.',
                        'C. Narra hechos ocurridos en forma cronológica.',
                        'B. Se dejan a un lado los aspectos emocionales de las partes y el eje gira en torno a los sucesos que se desea mencionar.',
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
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">1. ¿Qué es el género narrativo? Argumente su respuesta.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX1}}</div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">2. ¿Cuáles son los subgéneros narrativos? Enumérelos y escriba las características de cada uno.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX2}}</div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">3. ¿Qué es el género lírico? Argumente su respuesta.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX3}}</div>
        </div>

        <!-- Pregunta 4 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué tipo de textos hacen parte del género lírico? Menciónelos y escriba cuáles son sus características.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX4}}</div>
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">5. ¿Qué es el género dramático? Argumente su respuesta y mencione algunos ejemplos de los textos dramáticos.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX5}}</div>
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">6. Escriba las características propias y  las diferencias, entre el <span class="font-medium">mito</span> y la <span  class="font-medium">leyenda</span>:
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSexto->commentPSX6}}</div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué es la crónica?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishSexto->spanishPSX7 }}</span>
            </div>
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Dentro de qué género se enmarca comúnmente la crónica?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishSexto->spanishPSX8 }}</span>
            </div>
        </div>


        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. Señale cuál de las siguientes opciones representa una de las características principales de la crónica:</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishSexto->spanishPSX9 }}</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. En términos prácticos, en la crónica periodística:</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishSexto->spanishPSX10 }}</span>
            </div>
        </div>
</div>

@endsection
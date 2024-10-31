@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">

    @if($spanishOctavos->isEmpty())
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
                    @foreach($spanishOctavos as $spanishOctavo)
                    @php
                    $respuestas = [
                        $spanishOctavo->spanishPO1,
                        $spanishOctavo->spanishPO2,
                        $spanishOctavo->spanishPO3,
                        $spanishOctavo->spanishPO4,
                        $spanishOctavo->spanishPO5,
                        $spanishOctavo->spanishPO6,
                        $spanishOctavo->spanishPO7,
                        $spanishOctavo->spanishPO8,
                        $spanishOctavo->spanishPO9,
                        $spanishOctavo->spanishPO10
                    ];

                    $respuestasCorrectas = [
                        null,  // respuesta 1 no es una comparación de string
                        null,  // respuesta 2 no es una comparación de string
                        null,  // respuesta 3 no es una comparación de string
                        null,  // respuesta 4 no es una comparación de string
                        null,  // respuesta 5 no es una comparación de string
                        'A. Una unidad de comunicación con sentido completo, coherencia interna y adecuación a un contexto.',
                        'A. La relación lógica y ordenada entre las ideas que se presentan en el texto.',
                        null,
                        'C. El Romanticismo',
                        'B. Johann Wolfgang von Goethe',
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
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">1. ¿Qué elementos intervienen en el proceso de comunicación? Explica brevemente la función de cada uno.</span> 
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO1 }}</div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">2. ¿Qué diferencia hay entre el lenguaje oral y el lenguaje escrito? Menciona al menos dos ventajas y dos desventajas de cada uno.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO2 }}</div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">3. ¿Qué es un texto? ¿Qué características debe tener un texto para que sea coherente, cohesivo y adecuado?
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO3 }}</div>
        </div>

        <!-- Pregunta 4 -->
        <div class="mb-10 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué es un género literario? ¿Qué tipos de géneros literarios existen y qué rasgos los definen?
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO4}}</div>
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-10 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">5. ¿Qué es una obra literaria? ¿Qué elementos la componen y qué función cumplen?
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO5 }}</div>
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">6. ¿Qué es un texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishOctavo->spanishPO6 }}span>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué es la coherencia en un texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishOctavo->spanishPO7 }}</span>
            </div>
        </div>


        <!-- Pregunta 8 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">8. ¿Qué es una figura retórica? Da un ejemplo de una figura retórica que hayas encontrado en alguna obra literaria que hayas leído y explica su efecto.</span> 
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishOctavo->commentPO8 }}</div>
        </div>


        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué movimiento artístico y filosófico surgió en el siglo XVIII como una reacción revolucionaria en contra de las tendencias de la Ilustración y el Neoclasicismo?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishOctavo->spanishPO9 }}</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué autor alemán fue uno de los máximos exponentes del romanticismo literario y escribió obras como Las cuitas del joven Werther o Fausto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishOctavo->spanishPO10 }}</span>
            </div>
        </div>
</div>

@endsection
@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($mathOctavos->isEmpty())
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
                    @foreach($mathOctavos as $mathOctavo)
                    @php
                    $respuestas = [
                        $mathOctavo->mathPO1,
                        $mathOctavo->mathPO2,
                        $mathOctavo->mathPO3,
                        $mathOctavo->mathPO4,
                        $mathOctavo->mathPO5,
                        $mathOctavo->mathPO6,
                        $mathOctavo->mathPO7,
                        $mathOctavo->mathPO8,
                        $mathOctavo->mathPO9,
                        $mathOctavo->mathPO10
                    ];

                    $respuestasCorrectas = [
                        'C. 5/3', //1
                        'B. 125/8', //2
                        'C. Cualitativa', //3
                        'C. 1296', //4
                        'D. 12', // 5
                        'C. La longitud', // 6
                        'B. 6 metros cuadrados',  // 7
                        'A. Chocolate',  //8
                        'A. 5x + 8x = 650.000', // 9
                        'A. $50.000', // 10
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
                                @endif
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="grid grid-cols-2 gap-8 max-w-4xl" style="margin-top: 1rem">
            <!-- Pregunta 1 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">1. Maria le explica a Carlos que esta raíz se puede
                    resolver de varias formas, una de ellas es aplicando las propiedades. Si Carlos aplica las propiedades
                    el resultado es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/1.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathOctavo->mathPO1 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">2. La Potenciación es una multiplicación repetida o
                    una suma de potencias con algunas propiedades. Si aplicamos dichas propiedades al siguiente término, se
                    obtiene como resultado:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/2.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathOctavo->mathPO2 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. Analizando el diagrama de barras, se observa
                    que la variable de estudio es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/3.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathOctavo->mathPO3 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. Una ecuación es una igualdad en la cual hay
                    un valor desconocido. En la siguiente ecuación, el valor de x corresponde a:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/4.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathOctavo->mathPO4 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Un polinomio aritmético es una expresión en
                    la que aparecen varios signos de agrupación. Con lo anterior, podemos decir que el polinomio (3 + 10) -
                    (4 + 8) - (-5 - 6) da como resultado:</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO5 }}</span>
                </div>
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Si se desea bordear con cinta el siguiente
                    rectángulo, la medida para saber cuánta cinta se necesita es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/6.jpg') }}" alt="Rectángulo sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO6 }}</span>
                </div>
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. Se va a embaldosar un cuarto, cuyas medidas son
                    3m de largo y 2m de ancho. ¿Cuánta baldosa se necesita?</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO7 }}</span>
                </div>
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Según el diagrama de barras, ¿se puede
                    concluir que la moda corresponde a?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/8.png') }}" alt="Diagrama de barras sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO8 }}</span>
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Martha compró 5 pares de zapatos, y Julia
                    compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de zapatos? La
                    ecuación que representa esta situación es:</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO9 }}</span>
                </div>
            </div>

            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Martha compró 5 pares de zapatos, y Julia
                    compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de
                    zapatos?</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathOctavo->mathPO10 }}</span>
                </div>
            </div>
    </div>

@endsection
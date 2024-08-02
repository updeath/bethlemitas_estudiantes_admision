@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($mathDecimos->isEmpty())
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
                    @foreach($mathDecimos as $mathDecimo)
                    @php
                    $respuestas = [
                        $mathDecimo->mathPD1,
                        $mathDecimo->mathPD2,
                        $mathDecimo->mathPD3,
                        $mathDecimo->mathPD4,
                        $mathDecimo->mathPD5,
                        $mathDecimo->mathPD6,
                        $mathDecimo->mathPD7,
                        $mathDecimo->mathPD8,
                        $mathDecimo->mathPD9,
                        $mathDecimo->mathPD10
                    ];

                    $respuestasCorrectas = [
                        'D. 32', //1
                        'B. 125/8', //2
                        'C. Cualitativa', //3
                        'B. 5,66', //4
                        'C. La longitud', // 5
                        'C. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3.2.', // 6
                        'B. 6 metros cuadrados',  // 7
                        'A. Chocolate',  //8
                        'D. 5x + 8x = 650.000', // 9
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
                <label class="block text-sm font-medium text-gray-600">1. Andrés construye torres con cubitos de igual tamaño. La primera torre la construyó con dos cubitos, la segunda con el doble de cubitos de la primera y la tercera con el doble de cubitos de la segunda, como se muestra en la figura. Si se continúan armando torres según el mismo proceso, ¿Cuántos cubitos se requieren para construir la quinta torre?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/1.png') }}" alt="Imagen sin leyenda">
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD1 }}</span>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10 p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">2. La Potenciación es una multiplicación repetida o una suma de potencias con algunas propiedades básicas. Si aplicamos dichas propiedades al siguiente término, se obtiene como resultado:</label>
                <div class="mt-2">
                    <img src="{{ asset('img/math/ten/2.png') }}" alt="Imagen sin leyenda">
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center"> 
                        <span class="ml-2">R/= {{ $mathDecimo->mathPD2 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. Analizando el diagrama de barras, se observa que la variable de estudio es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/3.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD3 }}</span>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. Una ecuación es una igualdad en la cual hay un valor desconocido. En la siguiente ecuación, ¿el valor de x corresponde a?</label>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/4.png') }}" alt="Imagen sin leyenda">
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD4 }}</span>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Si se desea bordear con cinta el siguiente rectángulo, la medida para saber cuánta cinta se necesita es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/5.jpg') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD5 }}</span>
                </div>
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Daniel es un estudiante del curso de matemáticas del colegio Bethlemitas y nos compartió sus calificaciones de este primer periodo (ver la figura). Si las cinco actividades tienen igual porcentaje y se aprueba el curso con una nota mínima de 3.4, ¿es correcto afirmar que?</label>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/6.png') }}" alt="Imagen sin leyenda">
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD6 }}</span>
                </div>
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. Se embaldosará un cuarto, cuyas medidas son 3m de largo y 2m de ancho, la cantidad de baldosa que se necesita es:</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD7 }}</span>
                </div>
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Según el diagrama de barras, ¿se puede concluir que la moda corresponde a?</label>
                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/ten/8.png') }}" alt="Imagen sin leyenda">
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD8 }}</span>
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-12 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Martha compró 5 pares de zapatos, y Julia compró 8 pares de zapatos, entre las dos pagaron $650.000. La ecuación que representa esta situación es:</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD9 }}</span>
                </div>
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Martha compró 5 pares de zapatos, y Julia compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de zapatos?</label>
                
                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathDecimo->mathPD10 }}</span>
                </div> 
            </div>   
    </div>
@endsection
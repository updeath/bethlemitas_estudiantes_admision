@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">

    @if($mathNovenos->isEmpty())
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
                    @foreach($mathNovenos as $mathNoveno)
                    @php
                    $respuestas = [
                        $mathNoveno->mathPNO1,
                        $mathNoveno->mathPNO2,
                        $mathNoveno->mathPNO3,
                        $mathNoveno->mathPNO4,
                        $mathNoveno->mathPNO5,
                        $mathNoveno->mathPNO6,
                        $mathNoveno->mathPNO7,
                        $mathNoveno->mathPNO8,
                        $mathNoveno->mathPNO9,
                        $mathNoveno->mathPNO10
                    ];

                    $respuestasCorrectas = [
                        'D. 32', //1
                        'A. x = 3', //2
                        'Opción 3', //3
                        'Opción 2', //4
                        'C. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3,2.', // 5
                        'Opción 4', // 6
                        'Opción 2',  // 7
                        'Opción 4',  //8
                        'Opción 4', // 9
                        'B. 5 años', // 10
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
                <label class="block text-sm font-medium text-gray-600">1. Andrés construye torres con cubitos de igual
                    tamaño. La primera torre la construyó con dos cubitos, la segunda con el doble de cubitos de la primera
                    y la tercera con el doble de cubitos de la segunda, como se muestra en la figura. Si se continúan
                    armando torres según el mismo proceso, ¿cuántos cubitos se requieren para construir la quinta
                    torre?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/1.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO1 }}</span>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10 p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">2. El valor de x que satisface la ecuación 5 + 4x =
                    17 es:</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO2 }}</span>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">3. Aplicar el primer caso de factorización
                    (factor común) en la siguiente expresión y selecciona la respuesta correcta </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/3.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/3op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/3op2.png') }}" class=" w-[110px]" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/3op3.png') }}" class=" w-[117px]" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/3op4.png') }}" class=" w-[120px]" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO3 }}</span>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">4. Realiza la siguiente resta entre polinomios
                    y elige la opción correcta.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/4.png') }}" class="w-[250px]" alt="Figura sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/4op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/4op2.png') }}" class=" w-[100px]" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/4op3.png') }}" class=" w-[100px]" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/4op4.png') }}" class=" w-[100px]" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO4 }}</span>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Daniel es un estudiante del curso de
                    matemáticas del colegio Bethlemitas y nos compartió sus calificaciones de este primer periodo. (Ver la
                    figura). Si las cinco actividades tienen igual porcentaje y se aprueba el curso con una nota mínima de
                    3.4, ¿es correcto afirmar que?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/5.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO5 }}</span>
                </div>
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">6. Selecciona la respuesta correcta
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/6.png') }}" class="w-[350px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/6op1.png') }}" class=" w-7" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/6op2.png') }}" class=" w-8" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/6op3.png') }}" class=" w-6" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/6op4.png') }}" class=" w-6" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO6 }}</span>
                </div>
            </div>


            <!-- Pregunta 7 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">7. Realiza la siguiente multiplicación entre
                    monomios.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/7.png') }}" class="w-[100px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/7op1.png') }}" class="w-[50px]" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/7op2.png') }}" class="w-[61px]" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/7op3.png') }}" class="w-[40px]" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/7op4.png') }}" class="w-[45px]" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO7 }}</span>
                </div>
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Realiza la multiplicación de un monomio por
                    un polinomio.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/8.png') }}" class="w-[180px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/8op1.png') }}" class="w-[100px]" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/8op2.png') }}" class="w-[100px]" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/8op3.png') }}" class="w-[110px]" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/8op4.png') }}" class="w-[130px]" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO8 }}</span>
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. Realizar la siguiente división entre
                    monomios:
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/9.png') }}" class="w-[100px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/9op1.png') }}" class="w-[70px]" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/9op2.png') }}" class="w-[90px]" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/9op3.png') }}" class="w-[90px]" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/9op4.png') }}" class="w-[90px]" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    <br>
                </div>
                <div>
                    <span class="ml-2">R/= {{ $mathNoveno->mathPNO9 }}</span>
                </div>
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. El promedio (o media aritmética) de las
                    edades de 5 personas es 10 años. Si la suma de las edades de las primeras 4 personas es 45, ¿cuál es la
                    edad de la última persona?</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <span class="ml-2">R/= {{ $mathNoveno->mathPNO10 }}</span>
                    </div>
                </div>

            </div>
    </div>

@endsection
@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($mathSeptimos->isEmpty())
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
                    @foreach($mathSeptimos as $mathSeptimo)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathSeptimo->mathPS10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
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
                <label class="block text-sm font-medium text-gray-600">1. ¿Cuál es el resultado de la siguiente
                    multiplicación? 35.789 x 8?</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">A. 286.313</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">B. 286.312</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">C. 266.312</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">D. 286.315</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10  p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">2. 5x8+7=</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">A. 47</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">B. 75</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">C. 48</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">D. 20</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">Otro: ( espacio para agg texto )</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. El resultado de 12 + 8 x 8 es:</label>
                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 28</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 40</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 76</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">D. 160</span>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. Si tenemos 12.560 cm en el perímetro de una
                    vivienda, ¿Cuánto mide esto en kilómetros?</label>
                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 1,256 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 12,56 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 125,6 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">D. 0,1256 km</span>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Observa la siguiente figura:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/area_triangulo.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 10 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 20 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 13 cm</span>
                </div>
                <div class="flex items-center">
                    <span class="ml-2">D. 40 cm</span>
                </div>
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Se construye un rectángulo de 6 cm de largo
                    y 4 cm de ancho, a partir de tres fichas semejantes, tal como se muestra en la figura.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/largo_fichas.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 1 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 2 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 3 cm</span>
                </div>
                <div class="flex items-center">
                    <span class="ml-2">D. 4 cm</span>
                </div>
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. La gráfica muestra la cantidad de vendedores que
                    necesita una empresa, según la cantidad de puntos de atención que tenga.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/cantidad_vendedores.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 4</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 16</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 8</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">D. 10</span>
                </div>
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. En un colegio, la escala de calificación
                    para la asignatura Geometría es de 0 a 5. Un estudiante aprueba la asignatura si la nota obtenida es
                    mayor o igual que 3. El diagrama de la figura registra las calificaciones obtenidas por los alumnos de
                    grado séptimo en Geometría.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/cantidad_estudiantes.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 21 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 20 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 22 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">D. 23 estudiantes</span>
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-12 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Nicolás debe girar una ruleta dividida en
                    tres partes iguales. Observa la figura.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/ruleta.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">A. 1/2</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">B. 2/3</span>
                </div>
                <div class="flex items-center mb-2">
                    <span class="ml-2">C. 3/3</span>
                </div>
                <div class="flex items-center">
                    <span class="ml-2">D. 1/3</span>
                </div>
            </div>


            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Juan sombreó exactamente 3/16 de un
                    cuadrado. ¿En cuál opción se representa correctamente la parte que sombreó Juan?</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/seven/opcion1.png') }}" class=" h-20 w-20" alt="Gráfica 1 ">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/seven/opcion2.png') }}" class=" h-20 w-20" alt="Gráfica 2 ">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/seven/opcion3.png') }}" class=" h-20 w-20" alt="Gráfica 3 ">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/seven/opcion4.png') }}" class=" h-20 w-20" alt="Gráfica 4 ">
                        <span class="ml-2">Opción 4</span>
                    </div>
                </div>
            </div>
    </div>

@endsection
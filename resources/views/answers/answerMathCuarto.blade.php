@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')

<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($mathCuartos->isEmpty())
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
                    @foreach($mathCuartos as $mathCuarto)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathCuarto->mathPC10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="grid grid-cols-2 gap-8 max-w-4xl  ">
            <!-- Columna Izquierda -->
            <div class="col-span-1">
                <!-- Pregunta 1 -->
                <div class="mb-10">
                    <label class="block text-sm font-medium text-gray-600">1. En un club, los empleados pueden disponer de
                        una hora y media de tiempo para almorzar. ¿Cuál es el tiempo máximo del que pueden disponer los
                        empleados del club para almorzar?</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <span class="ml-2">R/= {{ $mathCuarto->mathPC1 }}</span>
                        </label>
                    </div>
                </div>

                <!-- Pregunta 3 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">3. Miguel está armando un rompecabezas
                        rectangular y le falta ubicar una ficha para terminarlo.</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/fichas.jpg') }}" alt="Imagen de fichas">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC3 }}</span>
                    </div>
                </div>

                <!-- Pregunta 5 -->
                <div class="mb-2 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">5. Hace años, la mamá de Esteban lo midió y
                        marcó una raya en la pared de su casa. Este año hizo lo mismo y se dio cuenta de que Esteban ha
                        crecido 12 centímetros.
                        <br><br>
                        Si la estatura era 98 cm hace 3 años, cuál es su estatura ahora?
                    </label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/crecimiento.jpg') }}" alt="Esteban creció 12 cm">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC5 }}</span>
                    </div>
                </div>

                <!-- Pregunta 7 -->
                <div class="mb-[187px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600">7. Una nave tiene 4 bodegas de carga en las que
                        se guardan 44 cajas en total. Si en cada bodega se guarda la misma cantidad de cajas, ¿Cuántas cajas
                        hay en cada bodega?</label>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC7 }}</span>
                    </div>
                </div>

                <!-- Pregunta 9 -->
                <div class=" border-t p-2 border-gray-400 ">
                    <label class="block text-sm font-medium text-gray-600 mb-2">9. Observa el mapa de un explorador, con
                        las
                        distancias entre su campamento, una roca y un tesoro. ¿Cuál es la distancia entre la roca y el
                        tesoro?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/mapa.jpg') }}" alt="Mapa del explorador">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC9 }}</span>
                    </div>
                </div>
            </div>


            <!-- Columna Derecha -->
            <div class="col-span-1">

                <!-- Pregunta 2 -->
                <div class="mb-[80px]">
                    <label class="block text-sm font-medium text-gray-600">2. Sebastián tiene 45 fichas rojas, 30 fichas
                        verdes y 25 azules. ¿Cuántas fichas tiene Sebastián en total?</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <span class="ml-2">R/= {{ $mathCuarto->mathPC2 }}</span>
                        </label>
                    </div>
                </div>

                <!-- Pregunta 4 -->
                <div class="mb-[54px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">4. La tabla muestra la cantidad de puntos
                        que obtuvo cada niño que participó en un concurso. ¿Cuál de las siguientes opciones muestra los
                        puntos obtenidos en el concurso por cada niño, organizados de menor a mayor?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/tablapuntos.jpg') }}" alt="Tabla de puntos">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC4 }}</span>
                    </div>
                </div>

                <!-- Pregunta 6 -->
                <div class="mb-[200px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">6. Liliana ve que durante esta semana el
                        clima de su barrio será el siguiente:</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/clima.jpg') }}" alt="Climas de la semana">
                    </div>

                    <div class="flex items-center mb-2"> 
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC6 }}</span>
                    </div>
                </div>

                <!-- Pregunta 8 -->
                <div class="mb-4 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">8. Observa la secuencia de números en las
                        banderas. ¿Qué número se debe ubicar en la posición de la bandera 4?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/secuencia.jpg') }}" alt="Secuencia de números en las banderas">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC8 }}</span>
                    </div>

                <!-- Pregunta 10 -->
                <div class=" border-t p-2 border-gray-400 ">
                    <label class="block text-sm font-medium text-gray-600 mb-2">10. Matías hizo una pintura sobre una hoja
                        de forma triangular y para ponerle un marco, señaló con una bolita, los vértices de la hoja. ¿Cuál
                        de las siguientes imágenes muestra la hoja señalando los vértices?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/figuras.jpg') }}" alt="Pintura triangular con vértices señalados">
                    </div>

                    <div class="flex items-center mb-2">
                        <span class="ml-2">R/= {{ $mathCuarto->mathPC10 }}</span>
                    </div>
                </div>
            </div>
    </div>

@endsection
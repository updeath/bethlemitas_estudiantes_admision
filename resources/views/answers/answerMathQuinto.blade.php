@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($mathQuintos->isEmpty())
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
                    @foreach($mathQuintos as $mathQuinto)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $mathQuinto->mathPQ10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="grid grid-cols-2 gap-8 max-w-4xl ">
        <!-- Columna Izquierda -->
        <div class="col-span-1">
            <!-- Pregunta 1 -->
            <div class="mb-[72PX]">
                <label class="block text-sm font-medium text-gray-600">1. Como se escribe el siguiente numero:
                    Noventa mil trescientos veinticuatro</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathQuinto->mathPQ1 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-7 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. ¿Cuál de las siguientes opciones es el
                    total de la suma?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/suma.png') }}" alt=" Imagen de una Suma">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ3 }}</span>
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-2 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. ¿Qué fracción representa la parte verde?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/fracciones.png') }}" class="h-20 w-20" alt="imagen de fracciones">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ5 }}</span>
                </div>
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-[275px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. ¿Cual es la mejor definición del perímetro en
                    una figura geométria?
                </label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ7 }}</span>
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Se tiene la siguiente serie de números:
                    4, 8, 12, 16. ¿Cuáles son los siguientes 3 números de la serie?</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ9 }}</span>
                </div>
            </div>

        </div>

        <!-- Columna Derecha -->
        <div class="col-span-1">

            <!-- Pregunta 2 -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600">2. Identifica como se lee el siguiente número
                    457.145 </label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <span class="ml-2">R/= {{ $mathQuinto->mathPQ2 }}</span>
                    </label>
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-6">4. ¿Cuál de las siguientes opciones es el
                    producto?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/multiplicacion.png') }}" class="w-30 h-20"
                        alt="Imagen de una multiplicacion">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ4 }}</span>
                </div>
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-[105px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. ¿Cuántos minutos hay 2 horas?
                </label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ6 }}</span>
                </div>
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-1 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">8. ¿Según los datos de la gráfica ¿Cuántas
                    medallas ganó Francia?</label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/medallas.png') }}" alt="Medallas">
                </div>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ8 }}</span>
                </div>
            </div>

            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">10. Una droguería recibe 8 cajas de gel
                    antibacterial. Si cada caja contiene 12 frascos de gel, ¿Cuántos frascos recibió en total la
                    droguería?</label>

                <div class="flex items-center mb-2">
                    <span class="ml-2">R/= {{ $mathQuinto->mathPQ10 }}</span>
                </div>
            </div>
        </div>
</div>

@endsection
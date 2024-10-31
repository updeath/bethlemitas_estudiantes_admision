@extends('home.homePage')

@section('title', 'Historial')

@section('sub_title', 'Historial de Lengua Castellana')

@section('content_dashboard')
<div class="flex flex-col mt-8">
    <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Número de Documento</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Nombre Completo</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Promedio</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Respuestas Correctas</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Respuestas Incorrectas</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Respuestas Regulares</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 1</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 2</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 3</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 4</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 5</th>

                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Calificación pregunta 8</th>
                        
                        <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Ver Respuestas</th>

                    </tr>
                </thead>

                <tbody class="bg-white">
                    @foreach ($pruebas as $prueba)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $user->number_documment }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $user->name }} {{ $user->last_name }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->averageSpanishPO }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->correctSpanishPO }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->incorrectSpanishPO }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->regularSpanishPO }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO1 > 0)
                                    {{ $prueba->spanishPO1 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO2 > 0)
                                    {{ $prueba->spanishPO2 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO3 > 0)
                                    {{ $prueba->spanishPO3 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO4 > 0)
                                    {{ $prueba->spanishPO4 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO5 > 0)
                                    {{ $prueba->spanishPO5 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                @if ($prueba->spanishPO8 > 0)
                                    {{ $prueba->spanishPO8 }}
                                @else
                                    <p>No hay calificación</p>
                                @endif
                            </td>
                            <td >
                                <button
                                    onclick="window.location.href='{{ route('history.answers.spanish8', $prueba->id) }}'"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                    <i class="fas fa-file text-sm"></i>
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
            class="bg-white px-4 py-3 border-t  text-gray-900 ">
        </div>
        </div>
    </div>
</div>
@endsection
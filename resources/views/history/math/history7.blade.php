@extends('home.homePage')

@section('title', 'Historial')

@section('sub_title', 'Historial de Matemáticas')

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
                                {{ $prueba->averagePS }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->correctPS }}
                            </td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                {{ $prueba->incorrectPS }}
                            </td>
                            <td >
                                <button
                                    onclick="window.location.href='{{ route('history.answers7', $prueba->id) }}'"
                                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                    <i class="fas fa-file text-sm"></i>
                                </button>
                            </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div
            class="bg-white px-4 py-3 border-t text-gray-900 ">
        </div>
        </div>
    </div>
</div>
@endsection
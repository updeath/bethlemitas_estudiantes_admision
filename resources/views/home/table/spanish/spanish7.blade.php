@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Resultados de Grados 7 - Lengua Castellana')

@section('content_dashboard')

    <div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="flex items-center mb-2 lg:mb-0">
            <form id="resetearForm" action="{{ route('reset.spanish7') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                    Resetear Tabla
                </button>
            </form>

            <div class="m-2">
                <a href="{{route('exportar.excel.Spanish7')}}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-download mr-2"></i> Exportar excel
                </a>
            </div>
        </div>

        <div class="relative">
            <form action="{{route('tables.spanish7')}}" method="GET" class="flex items-center">
                <input type="search" name="search" class="bg-purple-white shadow rounded-l border-0 p-2"
                    placeholder="Buscar">
                <button type="submit"
                    class="bg-purple-white hover:bg-purple-200 text-purple-lighter font-bold py-2 px-4 rounded-r">
                    <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52.966 52.966"
                        style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                        <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
                                c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
                                C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
                                S32.459,40,21.983,40z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>


    <div class="flex flex-col mt-8">
        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nombre Completo</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Promedio</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Intentos</th>
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
                                Pregunta 1</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 2</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 3</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 4</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 5</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 6</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 7</th>
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($promedioData as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['user']->name }} {{ $data['user']->last_name }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ number_format($data['promedio'], 2) }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['cantidadDeVeces'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['cantidadRespuestasBuenas'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['cantidadRespuestasMalas'] }}
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['cantidadRespuestasRegulares'] }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS1 !== null && $data['user']->spanishSeptimo->spanishPS1 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal1('{{ $data['comment1'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS1', ['userId' => $data['user']->id]) }}"   
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS2 !== null && $data['user']->spanishSeptimo->spanishPS2 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal2('{{ $data['comment2'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS2', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS3 !== null && $data['user']->spanishSeptimo->spanishPS3 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal3('{{ $data['comment3'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS3', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS4 !== null && $data['user']->spanishSeptimo->spanishPS4 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal4('{{ $data['comment4'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS4', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS5 !== null && $data['user']->spanishSeptimo->spanishPS5 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal5('{{ $data['comment5'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS5', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS6 !== null && $data['user']->spanishSeptimo->spanishPS6 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal6('{{ $data['comment6'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS6', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishSeptimo)
                                        @if ($data['user']->spanishSeptimo->spanishPS7 !== null && $data['user']->spanishSeptimo->spanishPS7 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal7('{{ $data['comment7'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPS7', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="1" max="5" name="cantidad"
                                                        placeholder="Calificación"
                                                        class="rounded-l-md px-3 py-1 border text-gray-800 border-gray-300 focus:outline-none focus:border-blue-500">
                                                    <button type="submit"
                                                        class="bg-blue-500 hover:bg-blue-600 text-white rounded-r-md px-4 py-1 focus:outline-none">
                                                        Enviar Calificación
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div
                class="bg-white px-4 py-3 border-t text-gray-900 ">
                {{ $users->links() }}
            </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal1"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle1"><em>Pregunta 2 - Grado 7</em></h5>
                    <p class="text-white text-sm">2. Identifique en el cuento dos oraciones simples y señale en ellas los
                        siguientes componentes: Sintagma nominal, sintagma verbal, sujeto expreso, sujeto tácito.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody1">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal1()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal2"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle2"><em>Pregunta 2 - Grado 7</em></h5>
                    <p class="text-white text-sm">2. Identifique en el cuento dos oraciones simples y señale en ellas los
                        siguientes componentes: Sintagma nominal, sintagma verbal, sujeto expreso, sujeto tácito.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody2">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal2()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal3"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle3"><em>Pregunta 3 - Grado 7</em></h5>
                    <p class="text-white text-sm">3. Mencione diez aspectos que se deban tener en cuenta en una exposición
                        oral:</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody3">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal3()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal4"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle4"><em>Pregunta 4 - Grado 7</em></h5>
                    <p class="text-white text-sm">4. ¿Qué es el texto informativo y cuáles son los tipos de textos
                        informativos? Escriba, además, las características de cada uno de ellos.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody4">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal4()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal5"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle5"><em>Pregunta 5 - Grado 7</em></h5>
                    <p class="text-white text-sm">5. ¿Qué es el texto argumentativo y cuáles son los tipos de textos
                        argumentativos? Escriba, además, las características de cada uno de ellos.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody5">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal5()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal6"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle6"><em>Pregunta 6 - Grado 7</em></h5>
                    <p class="text-white text-sm">6. ¿Cuáles son las características generales de los medios de
                        comunicación? Mencione cinco características.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody6">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal6()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal7"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle7"><em>Pregunta 7 - Grado 7</em></h5>
                    <p class="text-white text-sm">7. ¿Qué es una mesa redonda?</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody7">
                    <!-- Contenido del modal -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal7()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
        function showModal1(comment) {
            var modalTitle = document.getElementById('bookModalTitle1');
            var modalBody = document.getElementById('bookModalBody1');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal1').style.display = 'flex';
        }

        function hideModal1() {
            document.getElementById('bookModal1').style.display = 'none';
        }
    </script>

    <script>
        function showModal2(comment) {
            var modalTitle = document.getElementById('bookModalTitle2');
            var modalBody = document.getElementById('bookModalBody2');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal2').style.display = 'flex';
        }

        function hideModal2() {
            document.getElementById('bookModal2').style.display = 'none';
        }
    </script>

    <script>
        function showModal3(comment) {
            var modalTitle = document.getElementById('bookModalTitle3');
            var modalBody = document.getElementById('bookModalBody3');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal3').style.display = 'flex';
        }

        function hideModal3() {
            document.getElementById('bookModal3').style.display = 'none';
        }
    </script>

    <script>
        function showModal4(comment) {
            var modalTitle = document.getElementById('bookModalTitle4');
            var modalBody = document.getElementById('bookModalBody4');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal4').style.display = 'flex';
        }

        function hideModal4() {
            document.getElementById('bookModal4').style.display = 'none';
        }
    </script>

    <script>
        function showModal5(comment) {
            var modalTitle = document.getElementById('bookModalTitle5');
            var modalBody = document.getElementById('bookModalBody5');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal5').style.display = 'flex';
        }

        function hideModal5() {
            document.getElementById('bookModal5').style.display = 'none';
        }
    </script>

    <script>
        function showModal6(comment) {
            var modalTitle = document.getElementById('bookModalTitle6');
            var modalBody = document.getElementById('bookModalBody6');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal6').style.display = 'flex';
        }

        function hideModal6() {
            document.getElementById('bookModal6').style.display = 'none';
        }
    </script>

    <script>
        function showModal7(comment) {
            var modalTitle = document.getElementById('bookModalTitle7');
            var modalBody = document.getElementById('bookModalBody7');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal7').style.display = 'flex';
        }

        function hideModal7() {
            document.getElementById('bookModal7').style.display = 'none';
        }
    </script>

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'error',
                title: '{{ session('error') }}',
            });
        </script>
    @endif

    @if (session('info'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                iconColor: 'white',
                customClass: {
                    popup: 'colored-toast',
                },
                showConfirmButton: false,
                timer: 2500,
                timerProgressBar: true,
            });
            Toast.fire({
                icon: 'info',
                title: '{{ session('info') }}',
            });
        </script>
    @endif

    <script>
        document.getElementById('resetearForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Evita que el formulario se envíe de inmediato

            Swal.fire({
                title: '¿Estás seguro de que deseas resetear la tabla?',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, resetear',
                confirmButtonColor: '#e53e3e', // Color rojo
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                }
            });
        });
    </script>


@endsection

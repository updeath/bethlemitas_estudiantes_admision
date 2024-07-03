@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Resultados de Grados 4 - Lengua Castellana - Observaciones')

@section('content_dashboard')

    <div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="relative">
            <form action="{{ route('tables2.spanish4') }}" method="GET" class="flex items-center">
                <input type="search" name="search" class="bg-purple-white shadow rounded-l border-0 p-2" placeholder="Buscar">
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
        </div>
        </form>

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
                            Promedio - Matematicas</th>

                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Promedio - Lengua Castellana</th>

                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Promedio - Inglés</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Observaciones del Coordinador(a)</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Observaciones del Psicooriantador(a)</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Observaciones del Rector(a)</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Observaciones del Docente - Matematicas</th>

                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Observaciones del Docente - Lengua Castellana</th>

                            <th
                            class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                            Observaciones del Docente - Ingles</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Descargar PDF</th>

                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($promedioData as $data)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $data['user']->name }} {{ $data['user']->last_name }}
                                </td>
                                <!-- Promedio Matematicas -->
                                <td></td>

                                <!-- Promedio Lengua Castellana -->
                                <td> </td>

                                <!-- Promedio Ingles -->
                                <td></td>

                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['observacion'])
                                        @if ($data['observacionPredeterminadaPresente'])
                                            <button
                                                onclick="openObservationModal('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                <i class="fas fa-plus mr-2"></i> Añadir Observación
                                            </button>
                                        @else
                                            <button
                                                onclick="openObservationModal('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                            @php
                                                $observacionesConcatenadas = implode('<br> <br> - ', $data['observacion']);
                                            @endphp
                                            <button
                                                onclick="openObservationModalVisualizar('{{ $data['user']->name }} {{ $data['user']->last_name }}', '{{ $observacionesConcatenadas }}')"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>
                                        @endif
                                    @else
                                        <button
                                            onclick="openObservationModal('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                            <i class="fas fa-plus mr-2"></i> Añadir Observación
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['observacion2'])
                                        @if ($data['observacionPredeterminadaPresente2'])
                                            <button
                                                onclick="openObservationModal2('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                <i class="fas fa-plus mr-2"></i> Añadir Observación
                                            </button>
                                        @else
                                            <button
                                                onclick="openObservationModal2('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                            @php
                                                $observacionesConcatenadas = implode('<br> <br> - ', $data['observacion2']);
                                            @endphp
                                            <button
                                                onclick="openObservationModalVisualizar2('{{ $data['user']->name }} {{ $data['user']->last_name }}', '{{ $observacionesConcatenadas }}')"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>
                                        @endif
                                    @else
                                        <button
                                            onclick="openObservationModal2('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                            <i class="fas fa-plus mr-2"></i> Añadir Observación
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['observacion3'])
                                        @if ($data['observacionPredeterminadaPresente3'])
                                            <button
                                                onclick="openObservationModal3('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                <i class="fas fa-plus mr-2"></i> Añadir Observación
                                            </button>
                                        @else
                                            <button
                                                onclick="openObservationModal3('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                            @php
                                                $observacionesConcatenadas = implode('<br> <br> - ', $data['observacion3']);
                                            @endphp
                                            <button
                                                onclick="openObservationModalVisualizar3('{{ $data['user']->name }} {{ $data['user']->last_name }}', '{{ $observacionesConcatenadas }}')"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>
                                        @endif
                                    @else
                                        <button
                                            onclick="openObservationModal3('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                            <i class="fas fa-plus mr-2"></i> Añadir Observación
                                        </button>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <!--  -->
                                    @if ($data['observacion4'])
                                        @if ($data['observacionPredeterminadaPresente4'])
                                            <button
                                                onclick="openObservationModal4('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                <i class="fas fa-plus mr-2"></i> Añadir Observación
                                            </button>
                                        @else
                                            <button
                                                onclick="openObservationModal4('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                                class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-plus text-sm"></i>
                                            </button>
                                            @php
                                                $observacionesConcatenadas = implode('<br> <br> - ', $data['observacion4']);
                                            @endphp
                                            <button
                                                onclick="openObservationModalVisualizar4('{{ $data['user']->name }} {{ $data['user']->last_name }}', '{{ $observacionesConcatenadas }}')"
                                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                <i class="fas fa-eye text-sm"></i>
                                            </button>
                                        @endif
                                    @else
                                        <button
                                            onclick="openObservationModal4('{{ $data['user']->name }} {{ $data['user']->last_name }}')"
                                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                            <i class="fas fa-plus mr-2"></i> Añadir Observación
                                        </button>
                                    @endif
                                </td>

                                <!-- Docente Lengua Castellana -->
                                <td></td>

                                <!-- Docente Ingles -->
                                <td></td>

                                

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <a href="{{ route('generate.pdf', ['userId' => $data['user']->id]) }}"
                                        class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition duration-300">
                                        <i class="fas fa-download mr-2"></i> Descargar PDF
                                    </a>
                                </td>
                        @endforeach
                    </tbody>
                </table>
                <div
                    class="bg-white px-4 py-3 border-t text-gray-900">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
    <div id="observationModal" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($data['user']))
                        <form id="observationForm"
                            action="{{ route('save.observationsSpanishPC', ['userId' => $data['user']->id]) }}"
                            method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                <textarea id="observationTextarea" name="observation" rows="3"
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModal()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModal2" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($data['user']))
                        <form id="observationForm"
                            action="{{ route('save.observationsSpanishPC2', ['userId' => $data['user']->id]) }}"
                            method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                <textarea id="observationTextarea" name="observation" rows="3"
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModal2()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModal3" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($data['user']))
                        <form id="observationForm"
                            action="{{ route('save.observationsSpanishPC3', ['userId' => $data['user']->id]) }}"
                            method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                <textarea id="observationTextarea" name="observation" rows="3"
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModal3()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModal4" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($data['user']))
                        <form id="observationForm"
                            action="{{ route('save.observationsSpanishPC4', ['userId' => $data['user']->id]) }}"
                            method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                <textarea id="observationTextarea" name="observation" rows="3"
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModal4()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal de visualizar observaciones --}}
    <div id="observationModalVisualizar" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <div id="observationsContainer">

                    </div>

                    <button onclick="closeObservationModalVisualizar()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModalVisualizar2" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <div id="observationsContainer2">

                    </div>

                    <button onclick="closeObservationModalVisualizar2()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModalVisualizar3" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <div id="observationsContainer3">

                    </div>

                    <button onclick="closeObservationModalVisualizar3()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModalVisualizar4" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($data['user']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del estudiante: {{ $data['user']->name }}
                            {{ $data['user']->last_name }}</p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <div id="observationsContainer4">

                    </div>

                    <button onclick="closeObservationModalVisualizar4()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <a href="{{ route('tables.spanish4') }}" type="submit" class="text-gray-700 rounded-md hover:text-blue-500 ">
        <svg class="h-8 w-8" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
            <polyline points="11 17 6 12 11 7" />
            <polyline points="18 17 13 12 18 7" />
        </svg>
    </a>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <script>
        function openObservationModal(studentName) {
            document.getElementById('observationModal').classList.remove('hidden');

        }

        function closeObservationModal() {
            document.getElementById('observationModal').classList.add('hidden');
        }
    </script>
    <script>
        function openObservationModal2(studentName) {
            document.getElementById('observationModal2').classList.remove('hidden');
        }

        function closeObservationModal2() {
            document.getElementById('observationModal2').classList.add('hidden');
        }
    </script>
    <script>
        function openObservationModal3(studentName) {
            document.getElementById('observationModal3').classList.remove('hidden');
        }

        function closeObservationModal3() {
            document.getElementById('observationModal3').classList.add('hidden');
        }
    </script>

    <script>
        function openObservationModal4(studentName) {
            document.getElementById('observationModal4').classList.remove('hidden');
        }

        function closeObservationModal4() {
            document.getElementById('observationModal4').classList.add('hidden');
        }
    </script>

    {{-- Visualizar observaciones modal --}}
    <script>
        function openObservationModalVisualizar(studentName, observations) {
            document.getElementById('observationModalVisualizar').classList.remove('hidden');
            document.getElementById('observationsContainer').innerHTML = observations;
        }

        function closeObservationModalVisualizar() {
            document.getElementById('observationModalVisualizar').classList.add('hidden');
        }
    </script>

    <script>
        function openObservationModalVisualizar2(studentName, observations) {
            document.getElementById('observationModalVisualizar2').classList.remove('hidden');
            document.getElementById('observationsContainer2').innerHTML = observations;
        }

        function closeObservationModalVisualizar2() {
            document.getElementById('observationModalVisualizar2').classList.add('hidden');
        }
    </script>

    <script>
        function openObservationModalVisualizar3(studentName, observations) {
            document.getElementById('observationModalVisualizar3').classList.remove('hidden');
            document.getElementById('observationsContainer3').innerHTML = observations;
        }

        function closeObservationModalVisualizar3() {
            document.getElementById('observationModalVisualizar3').classList.add('hidden');
        }
    </script>
    <script>
        function openObservationModalVisualizar4(studentName, observations) {
            document.getElementById('observationModalVisualizar4').classList.remove('hidden');
            document.getElementById('observationsContainer4').innerHTML = observations;
        }

        function closeObservationModalVisualizar4() {
            document.getElementById('observationModalVisualizar4').classList.add('hidden');
        }
    </script>
@endsection

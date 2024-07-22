@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Resultados de Grados 10 - Lengua Castellana')

@section('content_dashboard')

    <div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="flex items-center mb-2 lg:mb-0">
            <form id="resetearForm" action="{{ route('reset.spanish10') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                    Resetear Tabla
                </button>
            </form>

            <div class="m-2">
                <a href="{{route('exportar.excel.Spanish10')}}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-download mr-2"></i> Exportar excel
                </a>
            </div>
        </div>

        <div class="relative">
            <form action="{{ route('tables.spanish10') }}" method="GET" class="flex items-center">
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

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Ver Respuestas</th>
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
                                    @if ($data['user']->spanishDecimo)
                                        <a href="{{ route('fragment.spanishPD4', ['userId' => $data['user']->id]) }}"
                                            class="inline-block bg-blue-500 hover:bg-blue-700 text-white rounded-full px-4 py-2 transition duration-300 ease-in-out">
                                            Calificar
                                        </a>
                                    @else
                                        <!-- Manejo si no existe spanishQuinto -->
                                        <p>No hay respuesta del aspirante</p>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishDecimo)
                                        @if ($data['user']->spanishDecimo->spanishPD5 !== null && $data['user']->spanishDecimo->spanishPD5 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                @php
                                                    $comment5 = $data['comment5'];
                                                    $comment5Clean = preg_replace("/[\r\n]/", '<br>\n', $comment5);
                                                @endphp
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal5('{{ $comment5Clean }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPD5', ['userId' => $data['user']->id]) }}"
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
                                    @if ($data['user']->spanishDecimo)
                                        @if ($data['user']->spanishDecimo->spanishPD6 !== null && $data['user']->spanishDecimo->spanishPD6 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                @php
                                                    $comment6 = $data['comment6'];
                                                    $comment6Clean = preg_replace("/[\r\n]/", '<br>\n', $comment6);
                                                @endphp
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal6('{{ $comment6Clean }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPD6', ['userId' => $data['user']->id]) }}"
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
                                    @if ($data['user']->spanishDecimo)
                                        @if ($data['user']->spanishDecimo->spanishPD7 !== null && $data['user']->spanishDecimo->spanishPD7 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                @php
                                                    $comment7 = $data['comment7'];
                                                    $comment7Clean = preg_replace("/[\r\n]/", '<br>\n', $comment7);
                                                @endphp
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal7('{{ $comment7Clean  }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPD7', ['userId' => $data['user']->id]) }}"
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
                                <td >
                                    <button
                                        onclick="window.location.href='{{ route('answer.SpanishDecimo', ['userId' => $data['user']->id]) }}'"
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                        <i class="fas fa-file text-sm"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white px-4 py-3 border-t text-gray-900 ">
                {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>




    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal5"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle5"><em>Pregunta 5 - Grado 10</em></h5>
                    <p class="text-white text-sm">5. Analice la siguiente historieta y luego escriba cuál es su intención
                        comunicativa de acuerdo al análisis pragmático de la imagen. Enfatice en cómo los elementos
                        extralingüísticos afectan la transmisión del mensaje.</p>
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
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle6"><em>Pregunta 6 - Grado 10</em></h5>
                    <p class="text-white text-sm">6. ¿Qué es la pragmática? ¿A qué ciencia pertenece? ¿Cuál es su objeto de
                        estudio? ¿Qué aspectos intervienen en un análisis pragmático?</p>
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
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle7"><em>Pregunta 7 - Grado 10</em></h5>
                    <p class="text-white text-sm">7. ¿Qué son los tecnicismos y los neologismos? Mencione, además, un
                        ejemplo de cada concepto.</p>
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

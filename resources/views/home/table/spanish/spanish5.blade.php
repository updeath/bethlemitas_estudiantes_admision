@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Resultados de Grados 5 - Lengua Castellana')

<style>
    .colored-toast.swal2-icon-success {
        background-color: #a5dc86 !important;
    }

    .colored-toast.swal2-icon-error {
        background-color: #f27474 !important;
    }

    .colored-toast.swal2-icon-warning {
        background-color: #f8bb86 !important;
    }

    .colored-toast.swal2-icon-info {
        background-color: #3fc3ee !important;
    }

    .colored-toast.swal2-icon-question {
        background-color: #87adbd !important;
    }

    .colored-toast .swal2-title {
        color: white;
    }

    .colored-toast .swal2-close {
        color: white;
    }

    .colored-toast .swal2-html-container {
        color: white;
    }

    .add{
        filter: drop-shadow(0 0 10px black )
    }

</style>

@section('content_dashboard')

    <div class="flex flex-col lg:flex-row items-center justify-between m-2 relative">
        <div class="flex flex-col lg:flex-row items-center mb-2 lg:mb-0">
            <form id="resetearForm" action="{{ route('reset.spanish5') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mb-2 lg:mb-0 lg:mr-2">
                    Resetear Tabla
                </button>
            </form>

            <a href="{{route('exportar.excel.Spanish5')}}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg mb-2 lg:mb-0 lg:mr-2">
                <i class="fas fa-download mr-2"></i> Exportar excel
            </a>


            <div class="lg:absolute  right-0">
                <form action="{{ route('tables.spanish5') }}" method="GET" class="flex items-center">
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
                                Pregunta 6</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 7</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Pregunta 10</th>

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
                                    {{ $data['cantidadRespuestasRegulares'] }}
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    @if ($data['user']->spanishQuinto)
                                        @if ($data['user']->spanishQuinto->spanishPQ6 !== null && $data['user']->spanishQuinto->spanishPQ6 != 0)
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
                                                    onclick="showModal('{{ $comment6Clean }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('actualizar.spanishPQ6', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="0" max="5" name="cantidad"
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
                                    @if ($data['user']->spanishQuinto)
                                        @if ($data['user']->spanishQuinto->spanishPQ7 !== null && $data['user']->spanishQuinto->spanishPQ7 != 0)
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
                                                    class="inline-block bg-gray-500 hover:bg-gray-600 rounded-full px-2 py-1 text-xs font-semibold text-white mr-1 mb-1 btn-show-info"
                                                    onclick="showModal7('{{ $comment7Clean }}')" id="calificarButton7">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPQ7', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="0" max="5" name="cantidad"
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
                                    @if ($data['user']->spanishQuinto)
                                        @if ($data['user']->spanishQuinto->spanishPQ10 !== null && $data['user']->spanishQuinto->spanishPQ10 != 0)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                @php
                                                    $comment10 = $data['comment10'];
                                                    $comment10Clean = preg_replace("/[\r\n]/", '<br>\n', $comment10);
                                                @endphp
                                                <button
                                                    class="inline-block bg-gray-500 hover:bg-gray-600 rounded-full px-2 py-1 text-xs font-semibold text-white mr-1 mb-1 btn-show-info"
                                                    onclick="showModal10('{{ $comment10Clean }}')"
                                                    id="calificarButton10">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPQ10', ['userId' => $data['user']->id]) }}"
                                                    method="POST" class="flex items-center space-x-2">
                                                    @csrf
                                                    <input type="number" min="0" max="5" name="cantidad"
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
                                        onclick="window.location.href='{{ route('answer.SpanishQuinto', ['userId' => $data['user']->id]) }}'"
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
                {{ $users->links() }}
            </div>
            </div>
        </div>
    </div>

    

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal6"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle"><em>Pregunta 6 - Grado 5</em></h5>
                    <p class="text-gray-100 text-sm">Escribe en los siguientes renglones, qué es lo que más te ha gustado
                        del colegio.</p>
                </div>
                <div class="modal-body p-6 max-h-64 overflow-y-auto" id="bookModalBody">
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
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle7"><em>Pregunta 7 - Grado 5</em></h5>
                    <label class="block text-sm font-medium text-white mb-3">7. Lee el siguiente texto y extrae de él
                        algunos sustantivos que encuentres.</label>
                    <h1 class="font-bold text-center"> Don Quijote de la Mancha </h1>
                    <p class="mb-10">En un lugar de la Mancha, de cuyo nombre no quiero acordarme, vivía un hidalgo de los
                        de lanza y astillero, escudo de cuero, rocín, flaco y galgo corredor. <br>
                        Tenía en su casa una ama que pasaba de los cuarenta y una sobrina que no llegaba a los veinte, y un
                        mozo de campo y plaza que encillaba el rocín y tenía otros oficios. Rozaba la edad de nuestro
                        hidalgo con los cincuenta años; era de complexión recia, seco de carnes, enjuto de rostro, gran
                        madrugador y amigo de la caza. Quieren decir que tenía el sobrenombre de Quijada o Quesada, que en
                        esto hay alguna diferencia en los autores que de este caso escriben..</p>
                </div>
                <div class="modal-body p-6 max-h-[400px] overflow-y-auto" id="bookModalBody7">
                    <!-- Aquí se mostrará la información del libro -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal7()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="fixed inset-0 z-50 overflow-auto bg-black bg-opacity-50 flex items-center justify-center" id="bookModal10"
        style="display: none;">
        <div class="modal-dialog w-full md:w-1/2 lg:w-1/3 xl:w-1/3">
            <div class="modal-content border border-blue-500 bg-white rounded-lg shadow-lg">
                <div class="modal-header bg-blue-500 text-white border-b border-gray-300 py-4 px-6 rounded-t-lg">
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle10"><em>Pregunta 10 - Grado 5</em>
                    </h5>
                    <label class="block text-sm font-medium text-white mb-3">10. Termina la historia a
                        continuación:</label>
                    <p class="mb-10">Había una zorra que nunca había visto un león. La puso el destino un día delante de
                        la real fiera. Y como era la primera vez que lo veía, sintió un miedo espantoso y...</p>
                </div>
                <div class="modal-body p-6 max-h-[400px] overflow-y-auto" id="bookModalBody10">
                    <!-- Aquí se mostrará la información del libro -->
                </div>
                <div class="modal-footer bg-[#3A8BC0] py-4 px-6 rounded-b-lg flex justify-end" id="modalFooter">
                    <button type="button"
                        class="btn bg-gray-200 hover:bg-gray-300 text-gray-700 rounded-full px-4 py-2 ml-2"
                        onclick="hideModal10()">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function showModal(comment) {
            var modalTitle = document.getElementById('bookModalTitle');
            var modalBody = document.getElementById('bookModalBody');


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

    <script>
        function showModal10(comment) {
            var modalTitle = document.getElementById('bookModalTitle10');
            var modalBody = document.getElementById('bookModalBody10');


            var modalContent = '<p><b>Respuesta: </b>' + comment + '</p>';

            modalBody.innerHTML = modalContent;

            document.getElementById('bookModal10').style.display = 'flex';
        }

        function hideModal10() {
            document.getElementById('bookModal10').style.display = 'none';
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

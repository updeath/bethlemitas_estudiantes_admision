@extends('home.homePage')

@section('title', 'Resultados')


@section('sub_title', 'Resultados de Grados 4 - Lengua Castellana')

@section('content_dashboard')

<div class="flex flex-col lg:flex-row items-center justify-between m-2 relative">
    <div class="flex flex-col lg:flex-row items-center mb-2 lg:mb-0">
        <form id="resetearForm" action="{{ route('reset.spanish4') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg mb-2 lg:mb-0 lg:mr-2">
                Resetear Tabla
            </button>
        </form>

        <a href="{{route('exportar.excel.Spanish4')}}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg mb-2 lg:mb-0 lg:mr-2">
            <i class="fas fa-download mr-2"></i> Exportar excel
        </a>


        <div class="lg:absolute  right-0">
            <form action="{{ route('tables.spanish4') }}" method="GET" class="flex items-center">
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
                                Pregunta 8</th>




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
                                    @if ($data['user']->spanishCuarto)
                                        @if ($data['user']->spanishCuarto->spanishPC8 !== null && $data['user']->spanishCuarto->spanishPC8 != 1)
                                            <button
                                                class="bg-green-500 hover:bg-green-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info">
                                                Calificación Exitosamente
                                            </button>
                                        @else
                                            <div class="flex items-center space-x-2">
                                                <button
                                                    class="bg-gray-500 hover:bg-gray-600 rounded-full px-3 py-1 text-xs font-semibold text-white btn-show-info"
                                                    onclick="showModal('{{ $data['comment8'] }}')">
                                                    Visualizar Respuesta
                                                </button>
                                                <form
                                                    action="{{ route('calificar.spanishPC8', ['userId' => $data['user']->id]) }}"
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
                class="bg-white dark:bg-gray-800 px-4 py-3 border-t dark:border-gray-700 text-gray-900 dark:text-white">
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
                    <h5 class="modal-title text-xl font-semibold" id="bookModalTitle"><em>Pregunta 8 - Grado 4</em></h5>
                    <label class="block text-sm font-medium text-white mb-3">8. Lee el inicio del cuento "La sopa de
                        piedras". Escribe un final para esta historia.</label>
                    <h1 class="font-bold text-center"> "La sopa de piedras"</h1>
                    <p>Un monje estaba haciendo la colecta en una región donde la gente tenía fama de ser muy tacaña. Llegó
                        a casa de unos campesinos, pero alló no le quisieron dar nada. Así que como era la hora de comer y
                        el monje estaba bastante hambriento, dijo: -Pues me voy a preparar una sopa de piedra riquísima.</p>
                    <p>Ni corto ni perezoso cogió una piedra del suelo, la limpió y la miró muy bien para comprobar que era
                        la adecuada, la piedra idónea para hacer una sopa. Los campesinos comenzaron a reírse del monje.
                        Decían que estaba loco, que todo era una gran mentira. Sin embargo, el monje les dijo:</p>
                    <p class="mb-10">-¿Cómo? ¿No me digan que no han tomado nunca una sopa de piedra? ¡Pero si es un plato
                        exquisito!</p>
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
@endsection

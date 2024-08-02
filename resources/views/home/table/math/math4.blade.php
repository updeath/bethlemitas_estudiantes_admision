@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Resultados de Grados 4 - Matemáticas')

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

    <div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="flex items-center mb-2 lg:mb-0">
            <form id="resetearForm" action="{{ route('reset.math4') }}" method="POST">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg">
                    Resetear Tabla
                </button>
            </form>

            <div class="m-2">
                <a href="{{ route('exportar.excel.math4') }}"
                    class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-download mr-2"></i> Exportar excel
                </a>
            </div>

        </div>

        <div class="relative">
            <form action="{{ route('table.math4') }}" method="GET" class="flex items-center">
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
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b    border-gray-200 bg-gray-50">
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
                                <td >
                                    <button
                                        onclick="window.location.href='{{ route('answer.mathCuarto', ['userId' => $data['user']->id]) }}'"
                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                        <i class="fas fa-file text-sm"></i>
                                    </button>
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

@endsection

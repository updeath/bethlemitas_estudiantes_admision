@extends('home.homePage')

@section('title', 'Formulario de Español grado 10°')

@section('content_dashboard')

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

    <div class="bg-white rounded-lg  p-7 mx-10">
            <a href="{{route('tables.spanish10')}}" type="submit"
            class="text-gray-700 rounded-md hover:text-blue-500  ">
                <svg class="h-8 w-8"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="11 17 6 12 11 7" />  <polyline points="18 17 13 12 18 7" /></svg>
            </a>
            <h1 class="text-3xl font-bold text-center mb-4"><em>Calificar fragmentos de pregunta 4</em></h1>
        
            <!-- Pregunta 4 -->
            @foreach ($promedioData as $data)
            <div class="mb-5 ">
                <label class="block text-sm font-medium text-gray-600 mb-5">
                    4. Lee los siguientes fragmentos de textos e identifica su género. Luego, escribe el nombre del género al que pertenece en la línea ubicada en la parte inferior de cada uno.
                </label>

                <div class="mb-10">
                    <div class=" mb-4">
                        <span class="text-lg font-semibold mb-2">Fragmento A:</span><br>
                        <img src="{{ asset('img/spanish/nine/4A.jpeg') }}" alt="Imagen sin leyenda" class="ml-4 w-200 h-auto rounded-lg">
                    </div>

                    <p class="bg-gray-200 text-gray-800 py-4 px-6 rounded-md shadow-md mb-4">
                        <span class="font-bold">Respuesta del aspirante:</span> <br>{{ $data['comment4_1'] }}
                    </p>

                    <span class="text-gray-600 block mb-2">Nota: Evitar escribir números utilizando el teclado.</span>

                    <form action="{{ route('calificar.spanishPD4_1', ['userId' => $data['user']->id]) }}" method="POST" class="flex items-center space-x-2">
                        @csrf

                        <div class="flex items-center border rounded-l-md border-gray-300">
                            <label for="cantidad" class="px-3 py-2 bg-gray-200 border-r text-gray-800">Calificación</label>
                            <input type="number" min="0" max="1.2" step="0.1" name="cantidad" id="cantidad" placeholder="0 - 1,2" class="p-2 focus:outline-none focus:border-blue-500">
                        </div>

                        <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md focus:outline-none">
                            Enviar Calificación
                        </button>
                    </form>
                </div>
            </div>
        @endforeach

            <div class="mb-5 border-t p-4 border-gray-400">
                @foreach ($promedioData as $data)
                    <div class="mb-10">
                    <span class="text-lg font-semibold mb-2">Fragmento B:</span><br>
                        <div class=" mb-4 flex justify-center">
                            <img src="{{ asset('img/spanish/nine/4B.jpeg') }}" class=" h-auto rounded-lg">
                        </div>
                        <p class="bg-gray-200 text-gray-800 py-4 px-6 rounded-md shadow-md mb-4">
                            <span class="font-bold">Respuesta del aspirante:</span> <br>{{ $data['comment4_2'] }}
                        </p>
                        <span class="text-gray-600 block mb-2">Nota: Evitar escribir números utilizando el teclado.</span>
                        <form action="{{ route('calificar.spanishPD4_2', ['userId' => $data['user']->id]) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <div class="flex items-center border rounded-l-md border-gray-300">
                                <label for="cantidad" class="px-3 py-2 bg-gray-200 border-r text-gray-800">Calificación</label>
                                <input type="number" min="0" max="1.2" step="0.1" name="cantidad" id="cantidad" placeholder="0 - 1,2" class="p-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md focus:outline-none">
                                Enviar Calificación
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="mb-5 border-t p-4 border-gray-400">
                @foreach ($promedioData as $data)
                    <div class="mb-10">
                    <span class="text-lg font-semibold mb-2">Fragmento C:</span><br>
                        <div class="flex justify-center mb-4">
                            
                            <img src="{{ asset('img/spanish/nine/4C.jpeg') }}"  class="ml-4 w-200 h-auto rounded-lg">
                        </div>
                        <p class="bg-gray-200 text-gray-800 py-4 px-6 rounded-md shadow-md mb-4">
                            <span class="font-bold">Respuesta del aspirante:</span> <br>{{ $data['comment4_3'] }}
                        </p>
                        <span class="text-gray-600 block mb-2">Nota: Evitar escribir números utilizando el teclado.</span>
                        <form action="{{ route('calificar.spanishPD4_3', ['userId' => $data['user']->id]) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <div class="flex items-center border rounded-l-md border-gray-300">
                                <label for="cantidad" class="px-3 py-2 bg-gray-200 border-r text-gray-800">Calificación</label>
                                <input type="number" min="0" max="1.2" step="0.1" name="cantidad" id="cantidad" placeholder="0 - 1,2" class="p-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md focus:outline-none">
                                Enviar Calificación
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
            <div class="mb-5 border-t p-4 border-gray-400">
                @foreach ($promedioData as $data)
                    <div class="mb-10">
                        <div class=" mb-4">
                            <span class="text-lg font-semibold mb-2">Fragmento D:</span><br>
                            <img src="{{ asset('img/spanish/nine/4D.jpeg') }}"  class="ml-4 w-200 h-auto rounded-lg">
                        </div>
                        <p class="bg-gray-200 text-gray-800 py-4 px-6 rounded-md shadow-md mb-4">
                            <span class="font-bold">Respuesta del aspirante:</span> <br>{{ $data['comment4_4'] }}
                        </p>
                        <span class="text-gray-600 block mb-2">Nota: Evitar escribir números utilizando el teclado.</span>
                        <form action="{{ route('calificar.spanishPD4_4', ['userId' => $data['user']->id]) }}" method="POST" class="flex items-center space-x-2">
                            @csrf
                            <div class="flex items-center border rounded-l-md border-gray-300">
                                <label for="cantidad" class="px-3 py-2 bg-gray-200 border-r text-gray-800">Calificación</label>
                                <input type="number" min="0" max="1.2" step="0.1" name="cantidad" id="cantidad" placeholder="0 - 1,2" class="p-2 focus:outline-none focus:border-blue-500">
                            </div>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-r-md focus:outline-none">
                                Enviar Calificación
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endsection

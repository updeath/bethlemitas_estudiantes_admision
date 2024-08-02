@extends('home.homePage')

@section('title', 'Formulario de Matemáticas grado 7°')

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
    <div class="bg-white rounded-lg p-7 mx-10">
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
            grado 7°</h1>

        <form class=" max-w-2xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.math7') }}" method="POST">
            @csrf
            <!-- Pregunta 1 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">1. ¿Cuál es el resultado de la siguiente
                    multiplicación? 35.789 x 8?</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS1" name="mathPS1"
                            value="A. 286.313">
                        <span class="ml-2">A. 286.313</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS1" name="mathPS1"
                            value="B. 286.312">
                        <span class="ml-2">B. 286.312</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS1" name="mathPS1"
                            value="C. 266.312">
                        <span class="ml-2">C. 266.312</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS1" name="mathPS1"
                            value="D. 286.315">
                        <span class="ml-2">D. 286.315</span>
                    </label>
                </div>
                @error('mathPS1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">2. 5x8+7=</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS2" name="mathPS2"
                            value="A. 47">
                        <span class="ml-2">A. 47</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS2" name="mathPS2"
                            value="B. 75">
                        <span class="ml-2">B. 75</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS2" name="mathPS2"
                            value="C. 48">
                        <span class="ml-2">C. 48</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS2" name="mathPS2"
                            value="D. 20">
                        <span class="ml-2">D. 20</span>
                    </label>
                </div>
                @error('mathPS2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. El resultado de 12 + 8 x 8 es:</label>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS3" name="mathPS3" value="A. 28">
                    <span class="ml-2">A. 28</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS3" name="mathPS3" value="B. 40">
                    <span class="ml-2">B. 40</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS3" name="mathPS3"
                        value="C. 76">
                    <span class="ml-2">C. 76</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS3" name="mathPS3"
                        value="D. 160">
                    <span class="ml-2">D. 160</span>
                </div>
                @error('mathPS3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. Si tenemos 12.560 cm en el perímetro de una
                    vivienda, ¿Cuánto mide esto en kilómetros?</label>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS4" name="mathPS4"
                        value="A. 1,256 km">
                    <span class="ml-2">A. 1,256 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS4" name="mathPS4"
                        value="B. 12,56 km">
                    <span class="ml-2">B. 12,56 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS4" name="mathPS4"
                        value="C. 125,6 km">
                    <span class="ml-2">C. 125,6 km</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS4" name="mathPS4"
                        value="D. 0,1256 km">
                    <span class="ml-2">D. 0,1256 km</span>
                </div>
                @error('mathPS4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Observa la siguiente figura:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/area_triangulo.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS5" name="mathPS5"
                        value="A. 10 cm">
                    <span class="ml-2">A. 10 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS5" name="mathPS5"
                        value="B. 20 cm">
                    <span class="ml-2">B. 20 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS5" name="mathPS5"
                        value="C. 13 cm">
                    <span class="ml-2">C. 13 cm</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS5" name="mathPS5"
                        value="D. 40 cm">
                    <span class="ml-2">D. 40 cm</span>
                </div>
                @error('mathPS5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Se construye un rectángulo de 6 cm de largo
                    y 4 cm de ancho, a partir de tres fichas semejantes, tal como se muestra en la figura.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/largo_fichas.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS6" name="mathPS6"
                        value="A. 1 cm">
                    <span class="ml-2">A. 1 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS6" name="mathPS6"
                        value="B. 2 cm">
                    <span class="ml-2">B. 2 cm</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS6" name="mathPS6"
                        value="C. 3 cm">
                    <span class="ml-2">C. 3 cm</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS6" name="mathPS6"
                        value="D. 4 cm">
                    <span class="ml-2">D. 4 cm</span>
                </div>
                @error('mathPS6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. La gráfica muestra la cantidad de vendedores que
                    necesita una empresa, según la cantidad de puntos de atención que tenga.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/cantidad_vendedores.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS7" name="mathPS7"
                        value="A. 4">
                    <span class="ml-2">A. 4</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS7" name="mathPS7"
                        value="B. 16">
                    <span class="ml-2">B. 16</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS7" name="mathPS7"
                        value="C. 8">
                    <span class="ml-2">C. 8</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS7" name="mathPS7"
                        value="D. 10">
                    <span class="ml-2">D. 10</span>
                </div>
                @error('mathPS7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. En un colegio, la escala de calificación
                    para la asignatura Geometría es de 0 a 5. Un estudiante aprueba la asignatura si la nota obtenida es
                    mayor o igual que 3. El diagrama de la figura registra las calificaciones obtenidas por los alumnos de
                    grado séptimo en Geometría.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/cantidad_estudiantes.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS8" name="mathPS8"
                        value="A. 21 estudiantes">
                    <span class="ml-2">A. 21 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS8" name="mathPS8"
                        value="B. 20 estudiantes">
                    <span class="ml-2">B. 20 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS8" name="mathPS8"
                        value="C. 22 estudiantes">
                    <span class="ml-2">C. 22 estudiantes</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS8" name="mathPS8"
                        value="D. 23 estudiantes">
                    <span class="ml-2">D. 23 estudiantes</span>
                </div>
                @error('mathPS8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-12 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Nicolás debe girar una ruleta dividida en
                    tres partes iguales. Observa la figura.</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/seven/ruleta.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS9" name="mathPS9"
                        value="A. 1/2">
                    <span class="ml-2">A. 1/2</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS9" name="mathPS9"
                        value="B. 2/3">
                    <span class="ml-2">B. 2/3</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS9" name="mathPS9"
                        value="C. 3/3">
                    <span class="ml-2">C. 3/3</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPS9" name="mathPS9"
                        value="D. 1/3">
                    <span class="ml-2">D. 1/3</span>
                </div>
                @error('mathPS9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Juan sombreó exactamente 3/16 de un
                    cuadrado. ¿En cuál opción se representa correctamente la parte que sombreó Juan?</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/seven/opcion1.png') }}" class=" h-20 w-20" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS10" name="mathPS10"
                            value="Opción 1">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/seven/opcion2.png') }}" class=" h-20 w-20" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS10" name="mathPS10"
                            value="Opción 2">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/seven/opcion3.png') }}" class=" h-20 w-20" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS10" name="mathPS10"
                            value="Opción 3">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/seven/opcion4.png') }}" class=" h-20 w-20" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPS10" name="mathPS10"
                            value="Opción 4">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPS10')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>


            <!-- Botón de enviar respuestas -->
            <div class="ml-[5%] mt-5">
                <button type="submit"
                    class="bg-[#3A8BC0] text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none">Enviar
                    Respuestas</button>
            </div>
        </form>
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
@endsection

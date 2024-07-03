@extends('home.homePage')

@section('title', 'Formulario de Matemáticas grado 8°')

@section('content_dashboard')
    <div class="bg-white rounded-lg p-7 mx-10">
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
            grado 8°</h1>

        <form class=" max-w-2xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.math8') }}" method="POST">
            @csrf

            <!-- Pregunta 1 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">1. Maria le explica a Carlos que esta raíz se puede
                    resolver de varias formas, una de ellas es aplicando las propiedades. Si Carlos aplica las propiedades
                    el resultado es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/1.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO1" name="mathPO1"
                            value="1">
                        <span class="ml-2">A. 5/4</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO1" name="mathPO1"
                            value="1">
                        <span class="ml-2">B. 4/6</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO1" name="mathPO1"
                            value="5">
                        <span class="ml-2">C. 5/3</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO1" name="mathPO1"
                            value="1">
                        <span class="ml-2">D. 2/4</span>
                    </label>
                </div>
                @error('mathPO1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">2. La Potenciación es una multiplicación repetida o
                    una suma de potencias con algunas propiedades. Si aplicamos dichas propiedades al siguiente término, se
                    obtiene como resultado:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/2.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO2" name="mathPO2"
                            value="1">
                        <span class="ml-2">A. 125/2</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO2" name="mathPO2"
                            value="5">
                        <span class="ml-2">B. 125/8</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO2" name="mathPO2"
                            value="1">
                        <span class="ml-2">C. 8/125</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO2" name="mathPO2"
                            value="1">
                        <span class="ml-2">D. -8/125</span>
                    </label>
                </div>
                @error('mathPO2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. Analizando el diagrama de barras, se observa
                    que la variable de estudio es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/3.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO3" name="mathPO3"
                            value="1">
                        <span class="ml-2">A. Numérica</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO3" name="mathPO3"
                            value="1">
                        <span class="ml-2">B. Cuantitativa</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO3" name="mathPO3"
                            value="5">
                        <span class="ml-2">C. Cualitativa</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO3" name="mathPO3"
                            value="1">
                        <span class="ml-2">D. Literal</span>
                    </label>
                </div>
                @error('mathPO3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. Una ecuación es una igualdad en la cual hay
                    un valor desconocido. En la siguiente ecuación, el valor de x corresponde a:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/4.png') }}" alt="Figura sin leyenda">
                </div>

                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO4" name="mathPO4"
                            value="1">
                        <span class="ml-2">A. 1287</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO4" name="mathPO4"
                            value="1">
                        <span class="ml-2">B. 12</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO4" name="mathPO4"
                            value="5">
                        <span class="ml-2">C. 1296</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPO4" name="mathPO4"
                            value="1">
                        <span class="ml-2">D. 21</span>
                    </label>
                </div>
                @error('mathPO4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Un polinomio aritmético es una expresión en
                    la que aparecen varios signos de agrupación. Con lo anterior, podemos decir que el polinomio (3 + 10) -
                    (4 + 8) - (-5 - 6) da como resultado:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO5" name="mathPO5"
                        value="1">
                    <span class="ml-2">A. -4</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO5" name="mathPO5"
                        value="1">
                    <span class="ml-2">B. 10</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO5" name="mathPO5"
                        value="1">
                    <span class="ml-2">C. 5</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO5" name="mathPO5"
                        value="5">
                    <span class="ml-2">D. 12</span>
                </div>
                @error('mathPO5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Si se desea bordear con cinta el siguiente
                    rectángulo, la medida para saber cuánta cinta se necesita es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/6.jpg') }}" alt="Rectángulo sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO6" name="mathPO6"
                        value="1">
                    <span class="ml-2">A. El área</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO6" name="mathPO6"
                        value="1">
                    <span class="ml-2">B. La medida de su base</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO6" name="mathPO6"
                        value="5">
                    <span class="ml-2">C. La longitud</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO6" name="mathPO6"
                        value="1">
                    <span class="ml-2">D. Los centímetros de la altura</span>
                </div>
                @error('mathPO6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. Se va a embaldosar un cuarto, cuyas medidas son
                    3m de largo y 2m de ancho. ¿Cuánta baldosa se necesita?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO7" name="mathPO7"
                        value="1">
                    <span class="ml-2">A. 5 metros cuadrados</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO7" name="mathPO7"
                        value="5">
                    <span class="ml-2">B. 6 metros cuadrados</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO7" name="mathPO7"
                        value="1">
                    <span class="ml-2">C. 12 metros cuadrados</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO7" name="mathPO7"
                        value="1">
                    <span class="ml-2">D. 10 metros cuadrados</span>
                </div>
                @error('mathPO7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Según el diagrama de barras, ¿se puede
                    concluir que la moda corresponde a?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/eight/8.png') }}" alt="Diagrama de barras sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO8" name="mathPO8"
                        value="5">
                    <span class="ml-2">A. Chocolate</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO8" name="mathPO8"
                        value="1">
                    <span class="ml-2">B. Vainilla</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO8" name="mathPO8"
                        value="1">
                    <span class="ml-2">C. Fresas</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO8" name="mathPO8"
                        value="1">
                    <span class="ml-2">D. Chicle</span>
                </div>
                @error('mathPO8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Martha compró 5 pares de zapatos, y Julia
                    compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de zapatos? La
                    ecuación que representa esta situación es:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO9" name="mathPO9"
                        value="5">
                    <span class="ml-2">A. 5x + 8x = 650.000</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO9" name="mathPO9"
                        value="1">
                    <span class="ml-2">B. 5x - 8x = 650.000</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO9" name="mathPO9"
                        value="1">
                    <span class="ml-2">C. x + 8x = 650.000</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO9" name="mathPO9"
                        value="1">
                    <span class="ml-2">D. 5x + 8x = 650.000</span>
                </div>
                @error('mathPO9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Martha compró 5 pares de zapatos, y Julia
                    compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de
                    zapatos?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO10" name="mathPO10"
                        value="5">
                    <span class="ml-2">A. $50.000</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO10" name="mathPO10"
                        value="1">
                    <span class="ml-2">B. $40.000</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO10" name="mathPO10"
                        value="1">
                    <span class="ml-2">C. $60.000</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPO10" name="mathPO10"
                        value="1">
                    <span class="ml-2">D. $25.000</span>
                </div>
                @error('mathPO10')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
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
@endsection

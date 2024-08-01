@extends('home.homePage')

@section('title', 'Formulario de Matematicas grado 4°')


@section('content_dashboard')
    <div class="bg-white rounded-lg  p-7 mx-10">

        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
            grado 4°</h1>

        <form class="grid grid-cols-2 gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md"
            action="{{ route('store.mathCuarto') }}" method="POST">
            @csrf
            <!-- Columna Izquierda -->
            <div class="col-span-1">

                <!-- Pregunta 1 -->
                <div class="mb-10">
                    <label class="block text-sm font-medium text-gray-600">1. En un club, los empleados pueden disponer de
                        una hora y media de tiempo para almorzar. ¿Cuál es el tiempo máximo del que pueden disponer los
                        empleados del club para almorzar?</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC1" name="mathPC1"
                                value="A. 30 minutos">
                            <span class="ml-2">A. 30 minutos</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC1" name="mathPC1"
                                value="B. 60 minutos">
                            <span class="ml-2">B. 60 minutos</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC1" name="mathPC1"
                                value="C. 75 minutos">
                            <span class="ml-2">C. 75 minutos</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC1" name="mathPC1"
                                value="D. 90 minutos">
                            <span class="ml-2">D. 90 minutos</span>
                        </label>
                    </div>
                    @error('mathPC1')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <!-- Pregunta 3 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">3. Miguel está armando un rompecabezas
                        rectangular y le falta ubicar una ficha para terminarlo.</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/fichas.jpg') }}" alt="Imagen de fichas">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC3" name="mathPC3"
                        value="A">
                        <span class="ml-2">A</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC3" name="mathPC3"
                        value="B">
                        <span class="ml-2">B</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC3" name="mathPC3"
                        value="C">
                        <span class="ml-2">C</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC3" name="mathPC3"
                        value="D">
                        <span class="ml-2">D</span>
                    </div>
                    @error('mathPC3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 5 -->
                <div class="mb-2 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">5. Hace años, la mamá de Esteban lo midió y
                        marcó una raya en la pared de su casa. Este año hizo lo mismo y se dio cuenta de que Esteban ha
                        crecido 12 centímetros.
                        <br><br>
                        Si la estatura era 98 cm hace 3 años, cuál es su estatura ahora?
                    </label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/crecimiento.jpg') }}" alt="Esteban creció 12 cm">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC5" name="mathPC5"
                        value="A. 76 cm">
                        <span class="ml-2">A. 76 cm</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC5" name="mathPC5"
                        value="B. 86 cm">
                        <span class="ml-2">B. 86 cm</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC5" name="mathPC5"
                        value="C. 100 cm">
                        <span class="ml-2">C. 100 cm</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC5" name="mathPC5"
                        value="D. 110 cm">
                        <span class="ml-2">D. 110 cm</span>
                    </div>
                    @error('mathPC5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 7 -->
                <div class="mb-[187px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600">7. Una nave tiene 4 bodegas de carga en las que
                        se guardan 44 cajas en total. Si en cada bodega se guarda la misma cantidad de cajas, ¿Cuántas cajas
                        hay en cada bodega?</label>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC7" name="mathPC7"
                        value="A. 40">
                        <span class="ml-2">A. 40</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC7" name="mathPC7"
                        value="B. 22">
                        <span class="ml-2">B. 22</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC7" name="mathPC7"
                        value="C. 11">
                        <span class="ml-2">C. 11</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC7" name="mathPC7"
                        value="D. 4">
                        <span class="ml-2">D. 4</span>
                    </div>
                    @error('mathPC7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 9 -->
                <div class=" border-t p-2 border-gray-400 ">
                    <label class="block text-sm font-medium text-gray-600 mb-2">9. Observa el mapa de un explorador, con
                        las
                        distancias entre su campamento, una roca y un tesoro. ¿Cuál es la distancia entre la roca y el
                        tesoro?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/mapa.jpg') }}" alt="Mapa del explorador">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC9" name="mathPC9"
                        value="A. 700 metros">
                        <span class="ml-2">A. 700 metros</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC9" name="mathPC9"
                        value="B. 350 metros">
                        <span class="ml-2">B. 350 metros</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC9" name="mathPC9"
                        value="C. 150 metros">
                        <span class="ml-2">C. 150 metros</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC9" name="mathPC9"
                        value="D. 100 metros">
                        <span class="ml-2">D. 100 metros</span>
                    </div>
                </div>
                @error('mathPC9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Columna Derecha -->
            <div class="col-span-1">

                <!-- Pregunta 2 -->
                <div class="mb-[80px]">
                    <label class="block text-sm font-medium text-gray-600">2. Sebastián tiene 45 fichas rojas, 30 fichas
                        verdes y 25 azules. ¿Cuántas fichas tiene Sebastián en total?</label>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC2" name="mathPC2"
                            value="A. 55">
                            <span class="ml-2">A. 55</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC2" name="mathPC2"
                            value="B. 75">
                            <span class="ml-2">B. 75</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC2" name="mathPC2"
                            value="C. 100">
                            <span class="ml-2">C. 100</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPC2" name="mathPC2"
                            value="D. 350">
                            <span class="ml-2">D. 350</span>
                        </label>
                    </div>
                    @error('mathPC2')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <!-- Pregunta 4 -->
                <div class="mb-[54px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">4. La tabla muestra la cantidad de puntos
                        que obtuvo cada niño que participó en un concurso. ¿Cuál de las siguientes opciones muestra los
                        puntos obtenidos en el concurso por cada niño, organizados de menor a mayor?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/tablapuntos.jpg') }}" alt="Tabla de puntos">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC4" name="mathPC4"
                        value="A. 7, 9, 12">
                        <span class="ml-2">A. 7, 9, 12</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC4" name="mathPC4"
                        value="B. 9, 7, 12">
                        <span class="ml-2">B. 9, 7, 12</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC4" name="mathPC4"
                        value="C. 9, 12, 7">
                        <span class="ml-2">C. 9, 12, 7</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC4" name="mathPC4"
                        value="D. 12, 7, 9">
                        <span class="ml-2">D. 12, 7, 9</span>
                    </div>
                    @error('mathPC4')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <!-- Pregunta 6 -->
                <div class="mb-[200px] border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">6. Liliana ve que durante esta semana el
                        clima de su barrio será el siguiente:</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/clima.jpg') }}" alt="Climas de la semana">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC6" name="mathPC6"
                        value="A">
                        <span class="ml-2">A</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC6" name="mathPC6"
                        value="B">
                        <span class="ml-2">B</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC6" name="mathPC6"
                        value="C">
                        <span class="ml-2">C</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC6" name="mathPC6"
                        value="D">
                        <span class="ml-2">D</span>
                    </div>
                    @error('mathPC6')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <!-- Pregunta 8 -->
                <div class="mb-4 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">8. Observa la secuencia de números en las
                        banderas. ¿Qué número se debe ubicar en la posición de la bandera 4?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/secuencia.jpg') }}" alt="Secuencia de números en las banderas">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC8" name="mathPC8"
                        value="A. 4">
                        <span class="ml-2">A. 4</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC8" name="mathPC8"
                        value="B. 9">
                        <span class="ml-2">B. 9</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC8" name="mathPC8"
                        value="C. 14">
                        <span class="ml-2">C. 14</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC8" name="mathPC8"
                        value="D. 18">
                        <span class="ml-2">D. 18</span>
                    </div>
                    @error('mathPC8')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>

                <!-- Pregunta 10 -->
                <div class=" border-t p-2 border-gray-400 ">
                    <label class="block text-sm font-medium text-gray-600 mb-2">10. Matías hizo una pintura sobre una hoja
                        de forma triangular y para ponerle un marco, señaló con una bolita, los vértices de la hoja. ¿Cuál
                        de las siguientes imágenes muestra la hoja señalando los vértices?</label>

                    <div class="mb-4">
                        <img src="{{ asset('img/math/four/figuras.jpg') }}" alt="Pintura triangular con vértices señalados">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC10" name="mathPC10"
                        value="A">
                        <span class="ml-2">A.</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC10" name="mathPC10"
                        value="B">
                        <span class="ml-2">B.</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC10" name="mathPC10"
                        value="C">
                        <span class="ml-2">C.</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPC10" name="mathPC10"
                        value="D">
                        <span class="ml-2">D.</span>
                    </div>
                    @error('mathPC10')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>


            </div>

            <!-- Contenedor del botón de envío centrado -->
            <div class=" ml-[5%] mt-5 ">
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

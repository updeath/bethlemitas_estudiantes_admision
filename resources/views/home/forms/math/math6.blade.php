@extends('home.homePage')

@section('title', 'Formulario de Matematicas grado 4°')

@section('content_dashboard')
<div class="bg-white rounded-lg  p-7 mx-10">
    <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
        grado 6°</h1>

        <form class="grid grid-cols-2 gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md"
            action="{{ route('store.math6') }}" method="POST">
            @csrf
        <!-- Columna Izquierda -->
        <div class="col-span-1">

            <!-- Pregunta 1 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">1. La maestra Luisa compró 13 cajas con 5
                    paquetes de bombones cada una. ¿Cuántos paquetes de bombones hay en total en todas las
                    cajas?</label>
                <div class="mt-2">
                    <label class="inline-flex items-center"> 
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX1" name="mathPSX1"
                        value="1">
                        <span class="ml-2">A. Hay 45 paquetes.</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX1" name="mathPSX1"
                        value="1">
                        <span class="ml-2">B. Hay 18 cajas.</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX1" name="mathPSX1"
                        value="1">
                        <span class="ml-2">C. Hay 55 cajas.</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX1" name="mathPSX1"
                        value="5">
                        <span class="ml-2">D. Hay 65 paquetes.</span>
                    </label>
                </div>
                @error('mathPSX1')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-[124px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. Las letras en una ecuación representan:
                </label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX3" name="mathPSX3"
                    value="5">
                    <span class="ml-2">A. La variable</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX3" name="mathPSX3"
                    value="1">
                    <span class="ml-2">B. El resultado</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX3" name="mathPSX3"
                    value="1">
                    <span class="ml-2">C. El valor</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX3" name="mathPSX3"
                    value="1">
                    <span class="ml-2">D. El numero</span>
                </div>
                @error('mathPSX3')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-12 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Cada deposito contiene 56 litros de agua,
                    ¿cuántos litros de agua hay en total en nueve depósitos iguales?
                </label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX5" name="mathPSX5"
                    value="1">
                    <span class="ml-2">A. 810 Litros</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX5" name="mathPSX5"
                    value="1">
                    <span class="ml-2">B. 503 Litros</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX5" name="mathPSX5"
                    value="5">
                    <span class="ml-2">C. 504 Litros</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX5" name="mathPSX5"
                    value="1">
                    <span class="ml-2">D. 103 Litros</span>
                </div>
                @error('mathPSX5')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-[128px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. La profesora María tiene un curso de 35
                    estudiantes. Ella desea organizar a todos en grupos de igual número de estudiantes.
                    ¿Cuál es la mayor cantidad de estudiantes por grupo, que puede hacer la profesora maria?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX7" name="mathPSX7"
                    value="5">
                    <span class="ml-2">A. 7</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX7" name="mathPSX7"
                    value="1">
                    <span class="ml-2">B. 5</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX7" name="mathPSX7"
                    value="1">
                    <span class="ml-2">C. 3</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX7" name="mathPSX7"
                    value="1">
                    <span class="ml-2">D. 10</span>
                </div>
                @error('mathPSX7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Para simplificar una fracción y obtener
                    una equivalente, se divide el numerador y el denominador entre el mismo número. Si tenemos 9/27 y su
                    equivalente 3/9 , entonces el número empleado para simplificar es:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX9" name="mathPSX9"
                    value="1">
                    <span class="ml-2">A. 4 </span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX9" name="mathPSX9"
                    value="1">
                    <span class="ml-2">B. 6 </span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX9" name="mathPSX9"
                    value="1">
                    <span class="ml-2">C. 9 </span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX9" name="mathPSX9"
                    value="5">
                    <span class="ml-2">D. 3</span>
                </div>
                @error('mathPSX9')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

        </div>

        <!-- Columna Derecha -->
        <div class="col-span-1">

            <!-- Pregunta 2 -->
            <div class="mb-[60px]">
                <label class="block text-sm font-medium text-gray-600">2. Responda el valor de hacer la siguiente suma:
                    x + 2x + 3x =
                </label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX2" name="mathPSX2"
                        value="1">
                        <span class="ml-2">A. 5</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX2" name="mathPSX2"
                        value="5">
                        <span class="ml-2">B. 6X</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX2" name="mathPSX2"
                        value="1">
                        <span class="ml-2">C. 5X</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX2" name="mathPSX2"
                        value="1">
                        <span class="ml-2">D. 6</span>
                    </label>
                </div>
                @error('mathPSX2')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-6 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">4. La señora Robles pagó $15 por 5 cajas de
                    pastelillos que compró en el supermercado. En total compró 35 pastelillos, como lo representa la
                    siguiente ecuación. <br>
                    5x = 35 <br> <br>
                    ¿Qué representa la x en la ecuación?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX4" name="mathPSX4"
                    value="1">
                    <span class="ml-2">A. El costo por pastelillo</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX4" name="mathPSX4"
                    value="1">
                    <span class="ml-2">B. El numero de cajas de pastelillos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX4" name="mathPSX4"
                    value="5">
                    <span class="ml-2">C. El numero de pastelillos por caja</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX4" name="mathPSX4"
                    value="1">
                    <span class="ml-2">D. El costo de cada caja de pastelillos</span>
                </div>
                @error('mathPSX4')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-7 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. Para una fiesta en el colegio se compran
                    568 globos azules y rojos. Si 234 son rojos ¿ cuántos globos son azules?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX6" name="mathPSX6"
                    value="1">
                    <span class="ml-2">A. 345</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX6" name="mathPSX6"
                    value="1">
                    <span class="ml-2">B. 350</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX6" name="mathPSX6"
                    value="1">
                    <span class="ml-2">C. 123</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX6" name="mathPSX6"
                    value="5">
                    <span class="ml-2">D. 334</span>
                </div>
                @error('mathPSX6')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Recordemos que las partes de un
                    fraccionario son el Numerador (partes que se toman de la unidad) y el Denominador (partes en que se
                    divide una unidad). Entonces, del fraccionario 4/5 podemos decir que la gráfica que lo representa
                    es:</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/six/opcion1.gif') }}" class=" h-20 w-20" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX8" name="mathPSX8"
                        value="1">
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/six/opcion2.gif') }}" class=" h-20 w-20" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX8" name="mathPSX8"
                        value="1">
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/six/opcion3.gif') }}" class=" h-20 w-20" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX8" name="mathPSX8"
                        value="5">
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/six/opcion4.gif') }}" class=" h-20 w-20" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPSX8" name="mathPSX8"
                        value="1">
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPSX8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>
            </div>


            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">10. En la fiesta de Anita se repartieron 3/6
                    de torta de chocolate, 2/6 de torta de vainilla y 5/6 de torta de fresa. La cantidad de torta que se
                    repartió en total fue:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX10" name="mathPSX10"
                    value="1">
                    <span class="ml-2">A. 10/18</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX10" name="mathPSX10"
                    value="1">
                    <span class="ml-2">B. 3/6</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX10" name="mathPSX10"
                    value="1">
                    <span class="ml-2">C. 5/6</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPSX10" name="mathPSX10"
                    value="5">
                    <span class="ml-2">D. 10/6</span>
                </div>
                @error('mathPSX10')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>
        </div>
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
@endsection
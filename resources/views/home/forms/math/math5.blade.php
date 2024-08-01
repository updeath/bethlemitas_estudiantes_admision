@extends('home.homePage')

@section('title', 'Formulario de Matematicas grado 4°')

@section('content_dashboard')
<div class="bg-white rounded-lg  p-7 mx-10">
    <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
        grado 5°</h1>

        <form class="grid grid-cols-2 gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md"
            action="{{ route('store.math5') }}" method="POST">
            @csrf
        <!-- Columna Izquierda -->
        <div class="col-span-1">

            <!-- Pregunta 1 -->
            <div class="mb-[72PX]">
                <label class="block text-sm font-medium text-gray-600">1. Como se escribe el siguiente numero:
                    Noventa mil trescientos veinticuatro</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ1" name="mathPQ1"
                        value="A. 90324">
                        <span class="ml-2">A. 90324</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ1" name="mathPQ1"
                        value="B. 900.324">
                        <span class="ml-2">B. 900.324</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ1" name="mathPQ1"
                        value="C. 9.0324">
                        <span class="ml-2">C. 9.0324</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ1" name="mathPQ1"
                        value="D. 90.324">
                        <span class="ml-2">D. 90.324</span>
                    </label>
                </div>
                @error('mathPQ1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-7 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">3. ¿Cuál de las siguientes opciones es el
                    total de la suma?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/suma.png') }}" alt=" Imagen de una Suma">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ3" name="mathPQ3"
                    value="A. 823.824.300">
                    <span class="ml-2">A. 823.824.300</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ3" name="mathPQ3"
                    value="B. 703.800.300">
                    <span class="ml-2">B. 703.800.300</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ3" name="mathPQ3"
                    value="C. 723.804.258">
                    <span class="ml-2">C. 723.804.258</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ3" name="mathPQ3"
                    value="D. 723.824.317">
                    <span class="ml-2">D. 723.824.317</span>
                </div>
                @error('mathPQ3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-2 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. ¿Qué fracción representa la parte verde?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/fracciones.png') }}" class="h-20 w-20" alt="imagen de fracciones">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ5" name="mathPQ5"
                    value="A. 3/8">
                    <span class="ml-2">A. 3/8</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ5" name="mathPQ5"
                    value="B. 5/8">
                    <span class="ml-2">B. 5/8</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ5" name="mathPQ5"
                    value="C. 3/5">
                    <span class="ml-2">C. 3/5</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ5" name="mathPQ5"
                    value="D. 5/3">
                    <span class="ml-2">D. 5/3</span>
                </div>
                @error('mathPQ5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-[275px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">7. ¿Cual es la mejor definición del perímetro en
                    una figura geométria?
                </label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ7" name="mathPQ7"
                    value="A. Es la suma de la longitud de todos los lados.">
                    <span class="ml-2">A. Es la suma de la longitud de todos los lados.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ7" name="mathPQ7"
                    value="B. Es la suma de todos los lados.">
                    <span class="ml-2">B. Es la suma de todos los lados.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ7" name="mathPQ7"
                    value="C. Es la multiplicación de todos los lados.">
                    <span class="ml-2">C. Es la multiplicación de todos los lados.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ7" name="mathPQ7"
                    value="D. Es la multiplicación de la base por la altura.">
                    <span class="ml-2">D. Es la multiplicación de la base por la altura.</span>
                </div>
                @error('mathPQ7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">9. Se tiene la siguiente serie de números:
                    4, 8, 12, 16. ¿Cuáles son los siguientes 3 números de la serie?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ9" name="mathPQ9"
                    value="A. 17, 18, 19">
                    <span class="ml-2">A. 17, 18, 19</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ9" name="mathPQ9"
                    value="B. 20, 21, 22">
                    <span class="ml-2">B. 20, 21, 22</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ9" name="mathPQ9"
                    value="C. 20, 24, 28">
                    <span class="ml-2">C. 20, 24, 28</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ9" name="mathPQ9"
                    value="D. 20, 24, 25">
                    <span class="ml-2">D. 20, 24, 25</span>
                </div>
                @error('mathPQ9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

        </div>

        <!-- Columna Derecha -->
        <div class="col-span-1">

            <!-- Pregunta 2 -->
            <div class="mb-5">
                <label class="block text-sm font-medium text-gray-600">2. Identifica como se lee el siguiente número
                    457.145 </label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ2" name="mathPQ2"
                        value="A. Cuatrocientos sesenta mil ciento cuarenta y cinco">
                        <span class="ml-2">A. Cuatrocientos sesenta mil ciento cuarenta y cinco</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ2" name="mathPQ2"
                        value="B. Cuatrocientos cincuenta mil ciento cincuenta">
                        <span class="ml-2">B. Cuatrocientos cincuenta mil ciento cincuenta</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ2" name="mathPQ2"
                        value="C. Cuatrocientos cincuenta y siete mil ciento cuarenta y cinco">
                        <span class="ml-2">C. Cuatrocientos cincuenta y siete mil ciento cuarenta y cinco</span>
                    </label>
                </div>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPQ2" name="mathPQ2"
                        value="D. Trescientos sesenta y cinco mil novecientos ochenta y siete">
                        <span class="ml-2">D. Trescientos sesenta y cinco mil novecientos ochenta y siete</span>
                    </label>
                </div>
                @error('mathPQ2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-6">4. ¿Cuál de las siguientes opciones es el
                    producto?
                </label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/multiplicacion.png') }}" class="w-30 h-20"
                        alt="Imagen de una multiplicacion">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ4" name="mathPQ4"
                    value="A. 17550">
                    <span class="ml-2">A. 17550</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ4" name="mathPQ4"
                    value="B. 17500">
                    <span class="ml-2">B. 17500</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ4" name="mathPQ4"
                    value="C. 15700">
                    <span class="ml-2">C. 15700</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ4" name="mathPQ4"
                    value="D. 15750">
                    <span class="ml-2">D. 15750</span>
                </div>
                @error('mathPQ4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-[105px] border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">6. ¿Cuántos minutos hay 2 horas?
                </label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ6" name="mathPQ6"
                    value="A. 60 minutos">
                    <span class="ml-2">A. 60 minutos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ6" name="mathPQ6"
                    value="B. 120 minutos">
                    <span class="ml-2">B. 120 minutos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ6" name="mathPQ6"
                    value="C. 350 minutos">
                    <span class="ml-2">C. 350 minutos</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ6" name="mathPQ6"
                    value="D. 150 minutos">
                    <span class="ml-2">D. 150 minutos</span>
                </div>
                @error('mathPQ6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-1 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">8. ¿Según los datos de la gráfica ¿Cuántas
                    medallas ganó Francia?</label>

                <div class="mb-4">
                    <img src="{{ asset('img/math/five/medallas.png') }}" alt="Medallas">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ8" name="mathPQ8"
                    value="A. 30">
                    <span class="ml-2">A. 30</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ8" name="mathPQ8"
                    value="B. 5">
                    <span class="ml-2">B. 5</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ8" name="mathPQ8"
                    value="C. 15">
                    <span class="ml-2">C. 15</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ8" name="mathPQ8"
                    value="D. 25">
                    <span class="ml-2">D. 25</span>
                </div>
                @error('mathPQ8')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400 ">
                <label class="block text-sm font-medium text-gray-600 mb-2">10. Una droguería recibe 8 cajas de gel
                    antibacterial. Si cada caja contiene 12 frascos de gel, ¿Cuántos frascos recibió en total la
                    droguería?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ10" name="mathPQ10"
                    value="A. 96 frascos">
                    <span class="ml-2">A. 96 frascos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ10" name="mathPQ10"
                    value="B. 80 frascos">
                    <span class="ml-2">B. 80 frascos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ10" name="mathPQ10"
                    value="C. 88 frascos">
                    <span class="ml-2">C. 88 frascos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPQ10" name="mathPQ10"
                    value="D. 90 frascos">
                    <span class="ml-2">D. 90 frascos</span>
                </div>
                @error('mathPQ10')
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
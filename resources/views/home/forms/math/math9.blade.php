@extends('home.homePage')

@section('title', 'Formulario de Matematicas grado 9°')

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

    .container-success {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 80vh; /* Centra verticalmente */
        text-align: center; /* Centra horizontalmente el contenido */
        padding: 20px;
    }

    .container-success img {
        width: 250px; /* Ajusta el tamaño del logo según tus necesidades */
        margin-bottom: 15px;
    }

    .info-success {
        display: flex;
        justify-content: center;
        align-items: center;
        background-color: #d4edda; /* Fondo verde claro (aviso de éxito) */
        color: #155724; /* Texto verde oscuro */
        border: 1px solid #c3e6cb; /* Borde verde claro */
        padding: 15px 25px; /* Ajusta el padding interno */
        border-radius: 5px; /* Bordes redondeados */
        max-width: 550px; /* Limita el ancho máximo */
        width: 100%; /* Asegura que el div ocupe todo el ancho disponible */
        height: 100px;
        box-shadow: 0 7px 8px rgba(0, 0, 0, 0.1); /* Sombra para dar un efecto elevado */
        margin-top: 10px; /* Reduce el espacio entre el logo y el mensaje */
        font-size: 23px;
    }

</style>

@section('content_dashboard')
@if (!$hasRecord)
    <div class="bg-white rounded-lg  p-7 mx-10">
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a
            grado 9°</h1>

        <form class=" max-w-2xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.math9') }}" method="POST">
            @csrf

            <!-- Pregunta 1 -->
            <div class="mb-10">
                <label class="block text-sm font-medium text-gray-600">1. Andrés construye torres con cubitos de igual
                    tamaño. La primera torre la construyó con dos cubitos, la segunda con el doble de cubitos de la primera
                    y la tercera con el doble de cubitos de la segunda, como se muestra en la figura. Si se continúan
                    armando torres según el mismo proceso, ¿cuántos cubitos se requieren para construir la quinta
                    torre?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/1.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO1" name="mathPNO1" value="A. 2"
                    {{old('mathPNO1') == 'A. 2' ? 'checked' : ''}}>
                    <span class="ml-2">A. 2</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO1" name="mathPNO1" value="B. 8"
                    {{old('mathPNO1') == 'B. 8' ? 'checked' : ''}}>
                    <span class="ml-2">B. 8</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO1" name="mathPNO1" value="C. 16"
                    {{old('mathPNO1') == 'C. 16' ? 'checked' : ''}}>
                    <span class="ml-2">C. 16</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO1" name="mathPNO1" value="D. 32"
                    {{old('mathPNO1') == 'D. 32' ? 'checked' : ''}}>
                    <span class="ml-2">D. 32</span>
                </div>
                @error('mathPNO1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600">2. El valor de x que satisface la ecuación 5 + 4x =
                    17 es:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO2" name="mathPNO2" value="A. x = 3"
                    {{old('mathPNO2') == 'A. x = 3' ? 'checked' : ''}}>
                    <span class="ml-2">A. x = 3</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO2" name="mathPNO2" value="B. x = 2"
                    {{old('mathPNO2') == 'B. x = 2' ? 'checked' : ''}}>
                    <span class="ml-2">B. x = 2</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO2" name="mathPNO2" value="C. x = 11/2"
                    {{old('mathPNO2') == 'C. x = 11/2' ? 'checked' : ''}}>
                    <span class="ml-2">C. x = 11/2</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO2" name="mathPNO2" value="D. x = -3"
                    {{old('mathPNO2') == 'D. x = -3' ? 'checked' : ''}}>
                    <span class="ml-2">D. x = -3</span>
                </div>
                @error('mathPNO2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">3. Aplicar el primer caso de factorización
                    (factor común) en la siguiente expresión y selecciona la respuesta correcta </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/3.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/3op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO3" name="mathPNO3"
                            value="Opción 1" {{old('mathPNO3') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/3op2.png') }}" class=" w-[110px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO3" name="mathPNO3"
                            value="Opción 2" {{old('mathPNO3') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/3op3.png') }}" class=" w-[117px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO3" name="mathPNO3"
                            value="Opción 3" {{old('mathPNO3') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/3op4.png') }}" class=" w-[120px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO3" name="mathPNO3"
                            value="Opción 4" {{old('mathPNO3') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO3')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">4. Realiza la siguiente resta entre polinomios
                    y elige la opción correcta.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/4.png') }}" class="w-[250px]" alt="Figura sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/4op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO4" name="mathPNO4"
                            value="Opción 1" {{old('mathPNO4') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/4op2.png') }}" class=" w-[100px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO4" name="mathPNO4"
                            value="Opción 2" {{old('mathPNO4') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/4op3.png') }}" class=" w-[100px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO4" name="mathPNO4"
                            value="Opción 3" {{old('mathPNO4') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/4op4.png') }}" class=" w-[100px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO4" name="mathPNO4"
                            value="Opción 4" {{old('mathPNO4') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO4')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-2">5. Daniel es un estudiante del curso de
                    matemáticas del colegio Bethlemitas y nos compartió sus calificaciones de este primer periodo. (Ver la
                    figura). Si las cinco actividades tienen igual porcentaje y se aprueba el curso con una nota mínima de
                    3.4, ¿es correcto afirmar que?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/5.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO5" name="mathPNO5"
                        value="A. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y cuando la divido entre cinco me da como resultado 3,5."
                        {{old('mathPNO5') == 'A. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y cuando la divido entre cinco me da como resultado 3,5.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado
                        16 y cuando la divido entre cinco me da como resultado 3,5.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO5" name="mathPNO5"
                        value="B. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado 16."
                        {{old('mathPNO5') == 'B. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado 16.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Daniel aprobó matemáticas, pues la suma de sus calificaciones da como resultado
                        16.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO5" name="mathPNO5"
                        value="C. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3,2."
                        {{old('mathPNO5') == 'C. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3,2.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como
                        resultado 16 y si dividimos entre 5 da como resultado 3,2.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="mathPNO5" name="mathPNO5"
                        value="D. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 18 y si lo dividimos entre 6 da como resultado 3."
                        {{old('mathPNO5') == 'D. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 18 y si lo dividimos entre 6 da como resultado 3.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como
                        resultado 18 y si lo dividimos entre 6 da como resultado 3.</span>
                </div>
                @error('mathPNO5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">6. Selecciona la respuesta correcta
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/6.png') }}" class="w-[350px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/6op1.png') }}" class=" w-7" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO6" name="mathPNO6"
                            value="Opción 1" {{old('mathPNO6') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/6op2.png') }}" class=" w-8" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO6" name="mathPNO6"
                            value="Opción 2" {{old('mathPNO6') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/6op3.png') }}" class=" w-6" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO6" name="mathPNO6"
                            value="Opción 3" {{old('mathPNO6') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/6op4.png') }}" class=" w-6" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO6" name="mathPNO6"
                            value="Opción 4" {{old('mathPNO6') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO6')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>


            <!-- Pregunta 7 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">7. Realiza la siguiente multiplicación entre
                    monomios.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/7.png') }}" class="w-[100px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/7op1.png') }}" class="w-[50px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO7" name="mathPNO7"
                            value="Opción 1" {{old('mathPNO7') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/7op2.png') }}" class="w-[61px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO7" name="mathPNO7"
                            value="Opción 2" {{old('mathPNO7') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/7op3.png') }}" class="w-[40px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO7" name="mathPNO7"
                            value="Opción 3" {{old('mathPNO7') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/7op4.png') }}" class="w-[45px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO7" name="mathPNO7"
                            value="Opción 4" {{old('mathPNO7') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO7')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Realiza la multiplicación de un monomio por
                    un polinomio.
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/8.png') }}" class="w-[180px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/8op1.png') }}" class="w-[100px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO8" name="mathPNO8"
                            value="Opción 1" {{old('mathPNO8') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/8op2.png') }}" class="w-[100px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO8" name="mathPNO8"
                            value="Opción 2" {{old('mathPNO8') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/8op3.png') }}" class="w-[110px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO8" name="mathPNO8"
                            value="Opción 3" {{old('mathPNO8') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/8op4.png') }}" class="w-[130px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO8" name="mathPNO8"
                            value="Opción 4" {{old('mathPNO8') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO8')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. Realizar la siguiente división entre
                    monomios:
                </label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/math/nine/9.png') }}" class="w-[100px]" alt="Imagen sin leyenda">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/9op1.png') }}" class="w-[70px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO9" name="mathPNO9"
                            value="Opción 1" {{old('mathPNO9') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/math/nine/9op2.png') }}" class="w-[90px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO9" name="mathPNO9"
                            value="Opción 2" {{old('mathPNO9') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/9op3.png') }}" class="w-[90px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO9" name="mathPNO9"
                            value="Opción 3" {{old('mathPNO9') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/math/nine/9op4.png') }}" class="w-[90px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO9" name="mathPNO9"
                            value="Opción 4" {{old('mathPNO9') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('mathPNO9')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. El promedio (o media aritmética) de las
                    edades de 5 personas es 10 años. Si la suma de las edades de las primeras 4 personas es 45, ¿cuál es la
                    edad de la última persona?</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO10" name="mathPNO10"
                            value="A. 4 años" {{old('mathPNO10') == 'A. 4 años' ? 'checked' : ''}}>
                        <span class="ml-2">A. 4 años</span>
                    </div>

                    <div class="mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO10" name="mathPNO10"
                            value="B. 5 años" {{old('mathPNO10') == 'B. 5 años' ? 'checked' : ''}}>
                        <span class="ml-2">B. 5 años</span>
                    </div>

                    <div class=" ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO10" name="mathPNO10"
                            value="C. 7 años" {{old('mathPNO10') == 'C. 7 años' ? 'checked' : ''}}>
                        <span class="ml-2">C. 7 años</span>
                    </div>

                    <div class=" ">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPNO10" name="mathPNO10"
                            value="D. 9 años" {{old('mathPNO10') == 'D. 9 años' ? 'checked' : ''}}>
                        <span class="ml-2">D. 9 años</span>
                    </div>
                    @error('mathPNO10')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span>
                        </p>
                    @enderror
                </div>

            </div>
            <div class="ml-[5%] mt-5">
                <button type="submit"
                    class="bg-[#3A8BC0] text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none">Enviar
                    Respuestas</button>
            </div>
        </form>
    </div>
@else 
    <div class="container-success">
        <img src="{{ asset('img/logo.png') }}" alt="logo">
        <div class="info-success">
            <h1><i class="fas fa-check text-sm"></i> El formulario se ha completado exitosamente</h1>
        </div>
    </div>
@endif
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

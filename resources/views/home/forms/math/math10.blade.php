@extends('home.homePage')

@section('title', 'Formulario de Matematicas grado 10°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Matemáticas <br> para aspirantes a grado 10°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.math10') }}" method="POST">
            @csrf

                <!-- Pregunta 1 -->
                <div class="mb-10">
                    <label class="block text-sm font-medium text-gray-600">1. Andrés construye torres con cubitos de igual tamaño. La primera torre la construyó con dos cubitos, la segunda con el doble de cubitos de la primera y la tercera con el doble de cubitos de la segunda, como se muestra en la figura. Si se continúan armando torres según el mismo proceso, ¿Cuántos cubitos se requieren para construir la quinta torre?</label>

                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/1.png') }}" alt="Imagen sin leyenda">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD1" name="mathPD1" value="A. 2"
                        {{old('mathPD1') == 'A. 2' ? 'checked' : ''}}>
                        <span class="ml-2">A. 2</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD1" name="mathPD1" value="B. 8"
                        {{old('mathPD1') == 'B. 8' ? 'checked' : ''}}>
                        <span class="ml-2">B. 8</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD1" name="mathPD1" value="C. 16"
                        {{old('mathPD1') == 'C. 16' ? 'checked' : ''}}>
                        <span class="ml-2">C. 16</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD1" name="mathPD1" value="D. 32"
                        {{old('mathPD1') == 'D. 32' ? 'checked' : ''}}>
                        <span class="ml-2">D. 32</span>
                    </div>
                    @error('mathPD1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 2 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600">2. La Potenciación es una multiplicación repetida o una suma de potencias con algunas propiedades básicas. Si aplicamos dichas propiedades al siguiente término, se obtiene como resultado:</label>
                    <div class="mt-2">
                        <img src="{{ asset('img/math/ten/2.png') }}" alt="Imagen sin leyenda">
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPD2" name="mathPD2" value="A. 125/2"
                            {{old('mathPD2') == 'A. 125/2' ? 'checked' : ''}}>
                            <span class="ml-2">A. 125/2</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPD2" name="mathPD2" value="B. 125/8"
                            {{old('mathPD2') == 'B. 125/8' ? 'checked' : ''}}>
                            <span class="ml-2">B. 125/8</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPD2" name="mathPD2" value="C. 8/125"
                            {{old('mathPD2') == 'C. 8/125' ? 'checked' : ''}}>
                            <span class="ml-2">C. 8/125</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <label class="inline-flex items-center">
                            <input type="radio" class="form-radio text-indigo-600" id="mathPD2" name="mathPD2" value="D. -8/125"
                            {{old('mathPD2') == 'D. -8/125' ? 'checked' : ''}}>
                            <span class="ml-2">D. -8/125</span>
                        </label>
                    </div>
                    @error('mathPD2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 3 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">3. Analizando el diagrama de barras, se observa que la variable de estudio es:</label>

                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/3.png') }}" alt="Imagen sin leyenda">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD3" name="mathPD3" value="A. Numérica"
                        {{old('mathPD3') == 'A. Numérica' ? 'checked' : ''}}>
                        <span class="ml-2">A. Numérica</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD3" name="mathPD3" value="B. Cuantitativa"
                        {{old('mathPD3') == 'B. Cuantitativa' ? 'checked' : ''}}>
                        <span class="ml-2">B. Cuantitativa</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD3" name="mathPD3" value="C. Cualitativa"
                        {{old('mathPD3') == 'C. Cualitativa' ? 'checked' : ''}}>
                        <span class="ml-2">C. Cualitativa</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD3" name="mathPD3" value="D. Literal"
                        {{old('mathPD3') == 'D. Literal' ? 'checked' : ''}}>
                        <span class="ml-2">D. Literal</span>
                    </div>
                    @error('mathPD3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 4 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">4. Una ecuación es una igualdad en la cual hay un valor desconocido. En la siguiente ecuación, ¿el valor de x corresponde a?</label>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/4.png') }}" alt="Imagen sin leyenda">
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD4" name="mathPD4" value="A. 1,28"
                        {{old('mathPD4') == 'A. 1,28' ? 'checked' : ''}}>
                        <span class="ml-2">A. 1,28</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD4" name="mathPD4" value="B. 5,66"
                        {{old('mathPD4') == 'B. 5,66' ? 'checked' : ''}}>
                        <span class="ml-2">B. 5,66</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD4" name="mathPD4" value="C. 4,33"
                        {{old('mathPD4') == 'C. 4,33' ? 'checked' : ''}}>
                        <span class="ml-2">C. 4,33</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD4" name="mathPD4" value="D. 9,87"
                        {{old('mathPD4') == 'D. 9,87' ? 'checked' : ''}}>
                        <span class="ml-2">D. 9,87</span>
                    </div>
                    @error('mathPD4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 5 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">5. Si se desea bordear con cinta el siguiente rectángulo, la medida para saber cuánta cinta se necesita es:</label>

                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/5.jpg') }}" alt="Imagen sin leyenda">
                    </div>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD5" name="mathPD5" value="A. El área"
                        {{old('mathPD5') == 'A. El área' ? 'checked' : ''}}>
                        <span class="ml-2">A. El área</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD5" name="mathPD5" value="B. La medida de su base"
                        {{old('mathPD5') == 'B. La medida de su base' ? 'checked' : ''}}>
                        <span class="ml-2">B. La medida de su base</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD5" name="mathPD5" value="C. La longitud"
                        {{old('mathPD5') == 'C. La longitud' ? 'checked' : ''}}>
                        <span class="ml-2">C. La longitud</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD5" name="mathPD5" value="D. Los centímetros de la altura"
                        {{old('mathPD5') == 'D. Los centímetros de la altura' ? 'checked' : ''}}>
                        <span class="ml-2">D. Los centímetros de la altura</span>
                    </div>
                    @error('mathPD5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 6 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">6. Daniel es un estudiante del curso de matemáticas del colegio Bethlemitas y nos compartió sus calificaciones de este primer periodo (ver la figura). Si las cinco actividades tienen igual porcentaje y se aprueba el curso con una nota mínima de 3.4, ¿es correcto afirmar que?</label>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/6.png') }}" alt="Imagen sin leyenda">
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD6" name="mathPD6" value="A. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y cuando la divido entre cinco me da como resultado 3.5."
                        {{old('mathPD6') == 'A. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y cuando la divido entre cinco me da como resultado 3.5.' ? 'checked' : ''}}>
                        <span class="ml-2">A. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y cuando la divido entre cinco me da como resultado 3.5.</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD6" name="mathPD6" value="B. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16."
                        {{old('mathPD6') == 'B. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16.' ? 'checked' : ''}}>
                        <span class="ml-2">B. Daniel aprobó matemáticas porque la suma de sus calificaciones da como resultado 16.</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD6" name="mathPD6" value="C. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3.2."
                        {{old('mathPD6') == 'C. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3.2.' ? 'checked' : ''}}>
                        <span class="ml-2">C. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3.2.</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD6" name="mathPD6" value="D. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 18 y si lo divido entre 6 da como resultado 3."
                        {{old('mathPD6') == 'D. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 18 y si lo divido entre 6 da como resultado 3.' ? 'checked' : ''}}>
                        <span class="ml-2">D. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 18 y si lo divido entre 6 da como resultado 3.</span>
                    </div>
                    @error('mathPD6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 7 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600">7. Se embaldosará un cuarto, cuyas medidas son 3m de largo y 2m de ancho, la cantidad de baldosa que se necesita es:</label>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD7" name="mathPD7" value="A. 5 metros cuadrados"
                        {{old('mathPD7') == 'A. 5 metros cuadrados' ? 'checked' : ''}}>
                        <span class="ml-2">A. 5 metros cuadrados</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD7" name="mathPD7" value="B. 6 metros cuadrados"
                        {{old('mathPD7') == 'B. 6 metros cuadrados' ? 'checked' : ''}}>
                        <span class="ml-2">B. 6 metros cuadrados</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD7" name="mathPD7" value="C. 12 metros cuadrados"
                        {{old('mathPD7') == 'C. 12 metros cuadrados' ? 'checked' : ''}}>
                        <span class="ml-2">C. 12 metros cuadrados</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD7" name="mathPD7" value="D. 10 metros cuadrados"
                        {{old('mathPD7') == 'D. 10 metros cuadrados' ? 'checked' : ''}}>
                        <span class="ml-2">D. 10 metros cuadrados</span>
                    </div>
                    @error('mathPD7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 8 -->
                <div class="mb-10 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-3">8. Según el diagrama de barras, ¿se puede concluir que la moda corresponde a?</label>
                    <div class="flex items-center mb-2">
                        <img src="{{ asset('img/math/ten/8.png') }}" alt="Imagen sin leyenda">
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD8" name="mathPD8" value="A. Chocolate"
                        {{old('mathPD8') == 'A. Chocolate' ? 'checked' : ''}}>
                        <span class="ml-2">A. Chocolate</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD8" name="mathPD8" value="B. Vainilla"
                        {{old('mathPD8') == 'B. Vainilla' ? 'checked' : ''}}>
                        <span class="ml-2">B. Vainilla</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD8" name="mathPD8" value="C. Fresas"
                        {{old('mathPD8') == 'C. Fresas' ? 'checked' : ''}}>
                        <span class="ml-2">C. Fresas</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD8" name="mathPD8" value="D. Chicle"
                        {{old('mathPD8') == 'D. Chicle' ? 'checked' : ''}}>
                        <span class="ml-2">D. Chicle</span>
                    </div>
                    @error('mathPD8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 9 -->
                <div class="mb-12 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-2">9. Martha compró 5 pares de zapatos, y Julia compró 8 pares de zapatos, entre las dos pagaron $650.000. La ecuación que representa esta situación es:</label>

                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD9" name="mathPD9" value="A. 5x + 9x = 650.000"
                        {{old('mathPD9') == 'A. 5x + 9x = 650.000' ? 'checked' : ''}}>
                        <span class="ml-2">A. 5x + 9x = 650.000</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD9" name="mathPD9" value="B. 5x - 8x = 650.000"
                        {{old('mathPD9') == 'B. 5x - 8x = 650.000' ? 'checked' : ''}}>
                        <span class="ml-2">B. 5x - 8x = 650.000</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD9" name="mathPD9" value="C. x + 8x = 650.000"
                        {{old('mathPD9') == 'C. x + 8x = 650.000' ? 'checked' : ''}}>
                        <span class="ml-2">C. x + 8x = 650.000</span>
                    </div>
                    <div class="flex items-center">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD9" name="mathPD9" value="D. 5x + 8x = 650.000"
                        {{old('mathPD9') == 'D. 5x + 8x = 650.000' ? 'checked' : ''}}>
                        <span class="ml-2">D. 5x + 8x = 650.000</span>
                    </div>
                    @error('mathPD9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
                </div>

                <!-- Pregunta 10 -->
                <div class="mb-3 border-t p-2 border-gray-400">
                    <label class="block text-sm font-medium text-gray-600 mb-3">10. Martha compró 5 pares de zapatos, y Julia compró 8 pares de zapatos. Entre las dos pagaron $650.000. ¿Cuál es el costo de cada par de zapatos?</label>
                    
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD10" name="mathPD10" value="A. $50.000"
                        {{old('mathPD10') == 'A. $50.000' ? 'checked' : ''}}>
                        <span class="ml-2">A. $50.000</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD10" name="mathPD10" value="B. $40.000"
                        {{old('mathPD10') == 'B. $40.000' ? 'checked' : ''}}>
                        <span class="ml-2">B. $40.000</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD10" name="mathPD10" value="C. $60.000"
                        {{old('mathPD10') == 'C. $60.000' ? 'checked' : ''}}>
                        <span class="ml-2">C. $60.000</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <input type="radio" class="form-radio text-indigo-600" id="mathPD10" name="mathPD10" value="D. $25.000"
                        {{old('mathPD10') == 'D. $25.000' ? 'checked' : ''}}>
                        <span class="ml-2">D. $25.000</span>
                    </div>
                    @error('mathPD10')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
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

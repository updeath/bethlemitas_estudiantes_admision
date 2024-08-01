@extends('home.homePage')

@section('Formulario de Español grado 6°')

@section('content_dashboard')

<div class="bg-white rounded-lg  p-7 mx-10">
    <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 6°</h1>

    <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish6') }}" method="POST">
        @csrf
        <!-- Pregunta 1 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">1. ¿Qué es el género narrativo? Argumente su respuesta.
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm "             
            id="commentPSX1" 
            name="commentPSX1"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX1') }}</textarea>
            @error('commentPSX1')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
        @enderror
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">2. ¿Cuáles son los subgéneros narrativos? Enumérelos y escriba las características de cada uno.
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
            id="commentPSX2" 
            name="commentPSX2"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX2') }}</textarea>
            @error('commentPSX2')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
        @enderror
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">3. ¿Qué es el género lírico? Argumente su respuesta.
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
            id="commentPSX3" 
            name="commentPSX3"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX3') }}</textarea>
            @error('commentPSX3')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
        @enderror
        </div>

        <!-- Pregunta 4 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué tipo de textos hacen parte del género lírico? Menciónelos y escriba cuáles son sus características.
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
            id="commentPSX4" 
            name="commentPSX4"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX4') }}</textarea>
            @error('commentPSX4')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
        @enderror
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">5. ¿Qué es el género dramático? Argumente su respuesta y mencione algunos ejemplos de los textos dramáticos.
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm "
            id="commentPSX5" 
            name="commentPSX5"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX5') }}</textarea>
            @error('commentPSX5')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
        @enderror
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">6. Escriba las características propias y  las diferencias, entre el <span class="font-medium">mito</span> y la <span  class="font-medium">leyenda</span>:
            </label>
            <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
            id="commentPSX6" 
            name="commentPSX6"  
            placeholder="Tu respuesta aquí: ">{{ old('commentPSX6') }}</textarea>
            @error('commentPSX6')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué es la crónica?</label>

            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX7" name="spanishPSX7" value="A. Información interpretativa de hechos o acontecimientos.">
                <span class="ml-2">A. Información interpretativa de hechos o acontecimientos.</span>
            </div>
            <div class="flex items-center">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX7" name="spanishPSX7" value="B. Narración breve de hechos de ficción.">
                <span class="ml-2">B. Narración breve de hechos de ficción.</span>
            </div>
            <div class="flex items-center mt-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX7" name="spanishPSX7" value="C. Relato popular de un hecho real o fabuloso adornado con elementos fantásticos.">
                <span class="ml-2">C. Relato popular de un hecho real o fabuloso adornado con elementos fantásticos.</span>
            </div>
            @error('spanishPSX7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Dentro de qué género se enmarca comúnmente la crónica?</label>

            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX8" name="spanishPSX8" value="A. El género fantástico.">
                <span class="ml-2">A. El género fantástico.</span>
            </div>
            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX8" name="spanishPSX8" value="B. El género periodístico.">
                <span class="ml-2">B. El género periodístico.</span>
            </div>
            <div class="flex items-center">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX8" name="spanishPSX8" value="C. El género dramático.">
                <span class="ml-2">C. El género dramático.</span>
            </div>
            @error('spanishPSX8')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
        </div>


        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. Señale cuál de las siguientes opciones representa una de las características principales de la crónica:</label>

            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX9" name="spanishPSX9" value="A. Participan personajes ficticios.">
                <span class="ml-2">A. Participan personajes ficticios.</span>
            </div>
            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX9" name="spanishPSX9" value="B. El texto está compuesto por hechos fantásticos.">
                <span class="ml-2">B. El texto está compuesto por hechos fantásticos.</span>
            </div>
            <div class="flex items-center">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX9" name="spanishPSX9" value="C. Narra hechos ocurridos en forma cronológica.">
                <span class="ml-2">C. Narra hechos ocurridos en forma cronológica.</span>
            </div>
            @error('spanishPSX9')
            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. En términos prácticos, en la crónica periodística:</label>

            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX10" name="spanishPSX10" value="A. La narración se apoya en testimonios de testigos reales o ficticios.">
                <span class="ml-2">A. La narración se apoya en testimonios de testigos reales o ficticios.</span>
            </div>
            <div class="flex items-center mb-2">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX10" name="spanishPSX10" value="B. Se dejan a un lado los aspectos emocionales de las partes y el eje gira en torno a los sucesos que se desea mencionar.">
                <span class="ml-2">B. Se dejan a un lado los aspectos emocionales de las partes y el eje gira en torno a los sucesos que se desea mencionar.</span>
            </div>
            <div class="flex items-center">
                <input type="radio" class="form-radio text-indigo-600" id="spanishPSX10" name="spanishPSX10" value="C. Ambas opciones son correctas.">
                <span class="ml-2">C. Ambas opciones son correctas.</span>
            </div>
            @error('spanishPSX10')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
        </div>

        <div class=" ml-[5%] mt-5 ">
            <button type="submit"
                class="bg-[#3A8BC0] text-white py-2 px-4 rounded-md hover:bg-blue-500 focus:outline-none">Enviar
                Respuestas
            </button>
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
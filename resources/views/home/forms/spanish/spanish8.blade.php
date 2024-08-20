@extends('home.homePage')

@section('title', 'Formulario de Español grado 8°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 8°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish8') }}" method="POST">
            @csrf
            <!-- Pregunta 1 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">1. ¿Qué elementos intervienen en el proceso de comunicación? Explica brevemente la función de cada uno.</span> 
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO1" 
                name="commentPO1"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO1') }}</textarea>
                @error('commentPO1')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">2. ¿Qué diferencia hay entre el lenguaje oral y el lenguaje escrito? Menciona al menos dos ventajas y dos desventajas de cada uno.
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO2" 
                name="commentPO2"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO2') }}</textarea>
                @error('commentPO2')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">3. ¿Qué es un texto? ¿Qué características debe tener un texto para que sea coherente, cohesivo y adecuado?
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO3" 
                name="commentPO3"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO3') }}</textarea>
                @error('commentPO3')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué es un género literario? ¿Qué tipos de géneros literarios existen y qué rasgos los definen?
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO4" 
                name="commentPO4"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO4') }}</textarea>
                @error('commentPO4')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">5. ¿Qué es una obra literaria? ¿Qué elementos la componen y qué función cumplen?
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO5" 
                name="commentPO5"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO5') }}</textarea>
                @error('commentPO5')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">6. ¿Qué es un texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO6" name="spanishPO6" value="A. Una unidad de comunicación con sentido completo, coherencia interna y adecuación a un contexto."
                    {{old('spanishPO6') == 'A. Una unidad de comunicación con sentido completo, coherencia interna y adecuación a un contexto.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Una unidad de comunicación con sentido completo, coherencia interna y adecuación a un contexto.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO6" name="spanishPO6" value="B. Una unidad lingüística formada por una o más palabras que expresan una idea."
                    {{old('spanishPO6') == 'B. Una unidad lingüística formada por una o más palabras que expresan una idea.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Una unidad lingüística formada por una o más palabras que expresan una idea.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO6" name="spanishPO6" value="C. Una unidad gramatical formada por un sujeto y un predicado que constituyen una oración."
                    {{old('spanishPO6') == 'C. Una unidad gramatical formada por un sujeto y un predicado que constituyen una oración.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Una unidad gramatical formada por un sujeto y un predicado que constituyen una oración.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO6" name="spanishPO6" value="D. Una unidad semántica formada por un significante y un significado que constituyen una palabra."
                    {{old('spanishPO6') == 'D. Una unidad semántica formada por un significante y un significado que constituyen una palabra.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Una unidad semántica formada por un significante y un significado que constituyen una palabra.</span>
                </div>
                @error('spanishPO6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué es la coherencia en un texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO7" name="spanishPO7" value="A. La relación lógica y ordenada entre las ideas que se presentan en el texto."
                    {{old('spanishPO7') == 'A. La relación lógica y ordenada entre las ideas que se presentan en el texto.' ? 'checked' : ''}}>
                    <span class="ml-2">A. La relación lógica y ordenada entre las ideas que se presentan en el texto.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO7" name="spanishPO7" value="B. La conexión adecuada entre las palabras, las oraciones y los párrafos del texto."
                    {{old('spanishPO7') == 'B. La conexión adecuada entre las palabras, las oraciones y los párrafos del texto.' ? 'checked' : ''}}>
                    <span class="ml-2">B. La conexión adecuada entre las palabras, las oraciones y los párrafos del texto.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO7" name="spanishPO7" value="C. La adaptación del texto al propósito comunicativo, al destinatario y al registro."
                    {{old('spanishPO7') == 'C. La adaptación del texto al propósito comunicativo, al destinatario y al registro.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La adaptación del texto al propósito comunicativo, al destinatario y al registro.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO7" name="spanishPO7" value="D. La corrección ortográfica, gramatical y léxica del texto."
                    {{old('spanishPO7') == 'D. La corrección ortográfica, gramatical y léxica del texto.' ? 'checked' : ''}}>
                    <span class="ml-2">D. La corrección ortográfica, gramatical y léxica del texto.</span>
                </div>
                @error('spanishPO7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">8. ¿Qué es una figura retórica? Da un ejemplo de una figura retórica que hayas encontrado en alguna obra literaria que hayas leído y explica su efecto.</span> 
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPO8" 
                name="commentPO8"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPO8') }}</textarea>
                @error('commentPO8')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>


            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué movimiento artístico y filosófico surgió en el siglo XVIII como una reacción revolucionaria en contra de las tendencias de la Ilustración y el Neoclasicismo?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO9" name="spanishPO9" value="A. El Barroco"
                    {{old('spanishPO9') == 'A. El Barroco' ? 'checked' : ''}}>
                    <span class="ml-2">A. El Barroco</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO9" name="spanishPO9" value="B. El Renacimiento"
                    {{old('spanishPO9') == 'B. El Renacimiento' ? 'checked' : ''}}>
                    <span class="ml-2">B. El Renacimiento</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO9" name="spanishPO9" value="C. El Romanticismo"
                    {{old('spanishPO9') == 'C. El Romanticismo' ? 'checked' : ''}}>
                    <span class="ml-2">C. El Romanticismo</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO9" name="spanishPO9" value="D. El Realismo"
                    {{old('spanishPO9') == 'D. El Realismo' ? 'checked' : ''}}>
                    <span class="ml-2">D. El Realismo</span>
                </div>
                @error('spanishPO9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué autor alemán fue uno de los máximos exponentes del romanticismo literario y escribió obras como Las cuitas del joven Werther o Fausto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO10" name="spanishPO10" value="A. Friedrich Schiller"
                    {{old('spanishPO10') == 'A. Friedrich Schiller' ? 'checked' : ''}}>
                    <span class="ml-2">A. Friedrich Schiller</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO10" name="spanishPO10" value="B. Johann Wolfgang von Goethe"
                    {{old('spanishPO10') == 'B. Johann Wolfgang von Goethe' ? 'checked' : ''}}>
                    <span class="ml-2">B. Johann Wolfgang von Goethe</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO10" name="spanishPO10" value="C. Heinrich Heine"
                    {{old('spanishPO10') == 'C. Heinrich Heine' ? 'checked' : ''}}>
                    <span class="ml-2">C. Heinrich Heine</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPO10" name="spanishPO10" value="D. Thomas Mann"
                    {{old('spanishPO10') == 'D. Thomas Mann' ? 'checked' : ''}}>
                    <span class="ml-2">D. Thomas Mann</span>
                </div>
                @error('spanishPO10')
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
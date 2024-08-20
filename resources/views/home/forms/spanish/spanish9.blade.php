@extends('home.homePage')

@section('title', 'Formulario de Español grado 9°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 9°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish9') }}" method="POST">
            @csrf


            <!-- Pregunta 1 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">1. ¿Qué función comunicativa tiene el siguiente texto?</label>

                <p>"Estimado señor Pérez: <br><br>

                Le escribo para expresarle mi interés en participar en el proceso de selección para el cargo de asistente administrativo que usted anunció en el periódico El Tiempo. Soy egresado del programa de Administración de Empresas de la Universidad Nacional y cuento con dos años de experiencia en el sector financiero. Adjunto mi hoja de vida para que pueda conocer más sobre mi perfil profesional.
                <br><br>
                Quedo atento a cualquier información adicional que requiera y agradezco su atención.
                <br><br>
                Cordialmente,
                <br><br>
                Juan García".</p>
                <br><br>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO1" name="spanishPNO1" value="A. Narrar"
                    {{old('spanishPNO1') == 'A. Narrar' ? 'checked' : ''}}>
                    <span class="ml-2">A. Narrar</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO1" name="spanishPNO1" value="B. Informar"
                    {{old('spanishPNO1') == 'B. Informar' ? 'checked' : ''}}>
                    <span class="ml-2">B. Informar</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO1" name="spanishPNO1" value="C. Argumentar"
                    {{old('spanishPNO1') == 'C. Argumentar' ? 'checked' : ''}}>
                    <span class="ml-2">C. Argumentar</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO1" name="spanishPNO1" value="D. Solicitar"
                    {{old('spanishPNO1') == 'D. Solicitar' ? 'checked' : ''}}>
                    <span class="ml-2">D. Solicitar</span>
                </div>
                @error('spanishPNO1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 2 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué palabra es un sinónimo de “efímero” en el siguiente fragmento?</label>

                <p>“La vida es efímera, como una flor que se marchita en un día. Por eso hay que aprovechar cada momento, cada oportunidad, cada sueño.”</p> <br>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO2" name="spanishPNO2" value="A. Breve"
                    {{old('spanishPNO2') == 'A. Breve' ? 'checked' : ''}}>
                    <span class="ml-2">A. Breve</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO2" name="spanishPNO2" value="B. Bello"
                    {{old('spanishPNO2') == 'B. Bello' ? 'checked' : ''}}>
                    <span class="ml-2">B. Bello</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO2" name="spanishPNO2" value="C. Triste"
                    {{old('spanishPNO2') == 'C. Triste' ? 'checked' : ''}}>
                    <span class="ml-2">C. Triste</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO2" name="spanishPNO2" value="D. Frágil"
                    {{old('spanishPNO2') == 'D. Frágil' ? 'checked' : ''}}>
                    <span class="ml-2">D. Frágil</span>
                </div>
                @error('spanishPNO2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <span>Basándote en tus conocimientos previos y la siguiente definición, responde la pregunta.</span>
                <br><br>
                <p><em>Un sintagma es una palabra o un conjunto de palabras que se organizan alrededor de un núcleo y desempeñan algún tipo de función sintáctica dentro de la oración.</em></p> <br>
                <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Qué tipo de sintagma tiene un verbo como núcleo?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO3" name="spanishPNO3" value="A. Sintagma nominal"
                    {{old('spanishPNO3') == 'A. Sintagma nominal' ? 'checked' : ''}}>
                    <span class="ml-2">A. Sintagma nominal</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO3" name="spanishPNO3" value="B. Sintagma verbal"
                    {{old('spanishPNO3') == 'B. Sintagma verbal' ? 'checked' : ''}}>
                    <span class="ml-2">B. Sintagma verbal</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO3" name="spanishPNO3" value="C. Sintagma preposicional"
                    {{old('spanishPNO3') == 'C. Sintagma preposicional' ? 'checked' : ''}}>
                    <span class="ml-2">C. Sintagma preposicional</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO3" name="spanishPNO3" value="D. Sintagma adjetival"
                    {{old('spanishPNO3') == 'D. Sintagma adjetival' ? 'checked' : ''}}>
                    <span class="ml-2">D. Sintagma adjetival</span>
                </div>
                @error('spanishPNO3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 4 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">4. ¿Qué categoría gramatical es la palabra <em>“que”</em> cuando introduce una oración subordinada sustantiva?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO4" name="spanishPNO4" value="A. Preposición"
                    {{old('spanishPNO4') == 'A. Preposición' ? 'checked' : ''}}>
                    <span class="ml-2">A. Preposición</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO4" name="spanishPNO4" value="B. Conjunción"
                    {{old('spanishPNO4') == 'B. Conjunción' ? 'checked' : ''}}>
                    <span class="ml-2">B. Conjunción</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO4" name="spanishPNO4" value="C. Interjección"
                    {{old('spanishPNO4') == 'C. Interjección' ? 'checked' : ''}}>
                    <span class="ml-2">C. Interjección</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO4" name="spanishPNO4" value="D. Adverbio"
                    {{old('spanishPNO4') == 'D. Adverbio' ? 'checked' : ''}}>
                    <span class="ml-2">D. Adverbio</span>
                </div>
                @error('spanishPNO4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 5 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">5. ¿Qué tipo de argumento se utiliza en el siguiente texto?</label>
                <p>
                “Los animales no deben ser usados para experimentos científicos, porque tienen derechos y merecen respeto. Además, existen otras alternativas más éticas y eficientes para realizar investigaciones, como el uso de modelos informáticos o celulares.”
                </p>
                <br>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO5" name="spanishPNO5" value="A. De autoridad"
                    {{old('spanishPNO5') == 'A. De autoridad' ? 'checked' : ''}}>
                    <span class="ml-2">A. De autoridad</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO5" name="spanishPNO5" value="B. De ejemplificación"
                    {{old('spanishPNO5') == 'B. De ejemplificación' ? 'checked' : ''}}>
                    <span class="ml-2">B. De ejemplificación</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO5" name="spanishPNO5" value="C. De analogía"
                    {{old('spanishPNO5') == 'C. De analogía' ? 'checked' : ''}}>
                    <span class="ml-2">C. De analogía</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO5" name="spanishPNO5" value="D. De causa y efecto"
                    {{old('spanishPNO5') == 'D. De causa y efecto' ? 'checked' : ''}}>
                    <span class="ml-2">D. De causa y efecto</span>
                </div>
                @error('spanishPNO5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 6 -->
            <div class="mb-3 border-t p-2 border-gray-400">

                <h1 class="font-bold">Responde de la pregunta 6 a la 10, basándote en el siguiente texto.</h1>
                <br>
                <span>Lee el siguiente fragmento del libro La Vorágine de José Eustasio Rivera.</span> <br><br>
                <p>"El sol se había puesto ya; pero la claridad que aún conservaba el cielo permitía distinguir las cosas en la espesura del bosque. Los árboles se erguían como gigantes, con sus ramas entrelazadas formando una bóveda impenetrable. El silencio era profundo, sólo interrumpido por el rumor de algún arroyo oculto entre la maleza o el grito lejano de alguna fiera. De pronto, se oyó un disparo. Luego otro. Y después una ráfaga de tiros que parecía una descarga de fusilería. Era la señal convenida. Los caucheros habían encontrado la maloca de los indios y habían empezado el ataque."</p> <br>

                <label class="block text-sm font-medium text-gray-600 mb-3">6. ¿Qué tipo de narrador tiene el texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO6" name="spanishPNO6" value="A. Omnisciente"
                    {{old('spanishPNO6') == 'A. Omnisciente' ? 'checked' : ''}}>
                    <span class="ml-2">A. Omnisciente</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO6" name="spanishPNO6" value="B. Testigo"
                    {{old('spanishPNO6') == 'B. Testigo' ? 'checked' : ''}}>
                    <span class="ml-2">B. Testigo</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO6" name="spanishPNO6" value="C. Protagonista"
                    {{old('spanishPNO6') == 'C. Protagonista' ? 'checked' : ''}}>
                    <span class="ml-2">C. Protagonista</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO6" name="spanishPNO6" value="D. Equisciente"
                    {{old('spanishPNO6') == 'D. Equisciente' ? 'checked' : ''}}>
                    <span class="ml-2">D. Equisciente</span>
                </div>
                @error('spanishPNO6')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué significa la palabra “maloca” en el contexto del texto de <span class="text-black font-bold">La Vorágine?</span></label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO7" name="spanishPNO7" value="A. Una planta medicinal."
                    {{old('spanishPNO7') == 'A. Una planta medicinal.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Una planta medicinal.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO7" name="spanishPNO7" value="B. Una choza grande."
                    {{old('spanishPNO7') == 'B. Una choza grande.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Una choza grande.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO7" name="spanishPNO7" value="C. Una canoa rápida."
                    {{old('spanishPNO7') == 'C. Una canoa rápida.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Una canoa rápida.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO7" name="spanishPNO7" value="D. Una trampa mortal."
                    {{old('spanishPNO7') == 'D. Una trampa mortal.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Una trampa mortal.</span>
                </div>
                @error('spanishPNO7')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué efecto produce el uso de la conjunción “pero” en la primera oración del texto de <span class="text-black font-bold">La Vorágine?</span></label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO8" name="spanishPNO8" value="A. Expresa una oposición entre dos ideas."
                    {{old('spanishPNO8') == 'A. Expresa una oposición entre dos ideas.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Expresa una oposición entre dos ideas.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO8" name="spanishPNO8" value="B. Introduce una consecuencia lógica."
                    {{old('spanishPNO8') == 'B. Introduce una consecuencia lógica.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Introduce una consecuencia lógica.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO8" name="spanishPNO8" value="C. Añade una información adicional."
                    {{old('spanishPNO8') == 'C. Añade una información adicional.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Añade una información adicional.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO8" name="spanishPNO8" value="D. Establece una relación temporal."
                    {{old('spanishPNO8') == 'D. Establece una relación temporal.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Establece una relación temporal.</span>
                </div>
                @error('spanishPNO8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué recurso literario se emplea en el fragmento de <span class="text-black font-bold">La Vorágine?</span> al comparar los árboles con gigantes?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO9" name="spanishPNO9" value="A. Metáfora"
                    {{old('spanishPNO9') == 'A. Metáfora' ? 'checked' : ''}}>
                    <span class="ml-2">A. Metáfora</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO9" name="spanishPNO9" value="B. Hipérbole"
                    {{old('spanishPNO9') == 'B. Hipérbole' ? 'checked' : ''}}>
                    <span class="ml-2">B. Hipérbole</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO9" name="spanishPNO9" value="C. Símil"
                    {{old('spanishPNO9') == 'C. Símil' ? 'checked' : ''}}>
                    <span class="ml-2">C. Símil</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO9" name="spanishPNO9" value="D. Personificación"
                    {{old('spanishPNO9') == 'D. Personificación' ? 'checked' : ''}}>
                    <span class="ml-2">D. Personificación</span>
                </div>
                @error('spanishPNO9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué tema se aborda en el texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO10" name="spanishPNO10" value="A. La explotación del caucho en la Amazonía."
                    {{old('spanishPNO10') == 'A. La explotación del caucho en la Amazonía.' ? 'checked' : ''}}>
                    <span class="ml-2">A. La explotación del caucho en la Amazonía.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO10" name="spanishPNO10" value="B. La aventura de un poeta en la selva que viaja en busca de su amada."
                    {{old('spanishPNO10') == 'B. La aventura de un poeta en la selva que viaja en busca de su amada.' ? 'checked' : ''}}>
                    <span class="ml-2">B. La aventura de un poeta en la selva que viaja en busca de su amada.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO10" name="spanishPNO10" value="C. La violencia contra los pueblos indígenas y la barbarie de la explotación."
                    {{old('spanishPNO10') == 'C. La violencia contra los pueblos indígenas y la barbarie de la explotación.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La violencia contra los pueblos indígenas y la barbarie de la explotación.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPNO10" name="spanishPNO10" value="D. La belleza y el misterio de la naturaleza."
                    {{old('spanishPNO10') == 'D. La belleza y el misterio de la naturaleza.' ? 'checked' : ''}}>
                    <span class="ml-2">D. La belleza y el misterio de la naturaleza.</span>
                </div>
                @error('spanishPNO10')
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
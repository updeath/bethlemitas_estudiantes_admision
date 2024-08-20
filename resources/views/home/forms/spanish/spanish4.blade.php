@extends('home.homePage')

@section( 'Formulario de Español grado 4°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 4°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish4') }}" method="POST">
            @csrf
            
            <!-- Pregunta 1 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">1. Las palabras resaltadas en el texto se encuentran en:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/four/1.jpg') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC1" name="spanishPC1" value="A. Presente"
                    {{old('spanishPC1') == 'A. Presente' ? 'checked' : ''}}>
                    <span class="ml-2">A. Presente</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC1" name="spanishPC1" value="B. Pasado"
                    {{old('spanishPC1') == 'B. Pasado' ? 'checked' : ''}}>
                    <span class="ml-2">B. Pasado</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC1" name="spanishPC1" value="C. Futuro"
                    {{old('spanishPC1') == 'C. Futuro' ? 'checked' : ''}}>
                    <span class="ml-2">C. Futuro</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC1" name="spanishPC1" value="D. Infinitivo"
                    {{old('spanishPC1') == 'D. Infinitivo' ? 'checked' : ''}}>
                    <span class="ml-2">D. Infinitivo</span>
                </div>
                @error('spanishPC1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué pasa si en la receta no realizamos el paso dos?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC2" name="spanishPC2" value="A. Nada, porque el pastel de todos modos sale bien." {{old('spanishPC2') == 'A. Nada, porque el pastel de todos modos sale bien.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Nada, porque el pastel de todos modos sale bien.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC2" name="spanishPC2" value="B. No se puede realizar el pastel porque le haría falta el huevo." {{old('spanishPC2') == 'B. No se puede realizar el pastel porque le haría falta el huevo.' ? 'checked' : ''}}>
                    <span class="ml-2">B. No se puede realizar el pastel porque le haría falta el huevo. </span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC2" name="spanishPC2" value="C. El pastel no saldría bien porque la mantequilla no se batió." {{old('spanishPC2') == 'C. El pastel no saldría bien porque la mantequilla no se batió.' ? 'checked' : ''}}>
                    <span class="ml-2">C. El pastel no saldría bien porque la mantequilla no se batió.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC2" name="spanishPC2" value="D. Nada porque enseguida se acomodan los ingredientes." {{old('spanishPC2') == 'D. Nada porque enseguida se acomodan los ingredientes.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Nada porque enseguida se acomodan los ingredientes.</span>
                </div>
                @error('spanishPC2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Cual de las palabras no es un verbo?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC3" name="spanishPC3" value="A. Enjuagar"
                    {{old('spanishPC3') == 'A. Enjuagar' ? 'checked' : ''}}>
                    <span class="ml-2">A. Enjuagar</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC3" name="spanishPC3" value="B. Sazonador"
                    {{old('spanishPC3') == 'B. Sazonador' ? 'checked' : ''}}>
                    <span class="ml-2">B. Sazonador</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC3" name="spanishPC3" value="C. Escurrir"
                    {{old('spanishPC3') == 'C. Escurrir' ? 'checked' : ''}}>
                    <span class="ml-2">C. Escurrir</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC3" name="spanishPC3" value="D. Agregar"
                    {{old('spanishPC3') == 'D. Agregar' ? 'checked' : ''}}>
                    <span class="ml-2">D. Agregar</span>
                </div>
                @error('spanishPC3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            


            <!-- Pregunta 4 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-black mb-3">Lee el siguiente texto y contesta las preguntas 4 y 5</label>
                <p class="mb-10">"Para el dolor de estómago, es necesario <span class="font-medium underline">cortar</span> unas ramitas de yerbabuena y ponerlas a <span class="font-medium underline">cocer</span> en una taza de agua. Enseguida, se debe <span class="font-medium underline">tomar</span> este té con un poco de azúcar. <span class="font-medium underline">Repetir</span>  esto cada 4 horas para <span class="font-medium underline">obtener</span> mejores resultados."</p>
                <label class="block text-sm font-medium text-gray-600 mb-3">4. ¿Cuáles son los ingredientes del remedio anterior?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/four/4.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC4" name="spanishPC4" value="A. Ramitas y té"
                    {{old('spanishPC4') == 'A. Ramitas y té' ? 'checked' : ''}}>
                    <span class="ml-2">A. Ramitas y té</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC4" name="spanishPC4" value="B. Yerbabuena y agua"
                    {{old('spanishPC4') == 'B. Yerbabuena y agua' ? 'checked' : ''}}>
                    <span class="ml-2">B. Yerbabuena y agua</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC4" name="spanishPC4" value="C. Yerbabuena, agua y un poco de azúcar" {{old('spanishPC4') == 'C. Yerbabuena, agua y un poco de azúcar' ? 'checked' : ''}}>
                    <span class="ml-2">C. Yerbabuena, agua y un poco de azúcar</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC4" name="spanishPC4" value="D. Fuego lento y agua"
                    {{old('spanishPC4') == 'D. Fuego lento y agua' ? 'checked' : ''}}>
                    <span class="ml-2">D. Fuego lento y agua</span>
                </div>
                @error('spanishPC4')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">5. Las palabras resaltadas y subrayadas en el texto son:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC5" name="spanishPC5" value="A. Sustantivos"
                    {{old('spanishPC5') == 'A. Sustantivos' ? 'checked' : ''}}>
                    <span class="ml-2">A. Sustantivos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC5" name="spanishPC5" value="B. Verbos"
                    {{old('spanishPC5') == 'B. Verbos' ? 'checked' : ''}}>
                    <span class="ml-2">B. Verbos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC5" name="spanishPC5" value="C. Personajes"
                    {{old('spanishPC5') == 'C. Personajes' ? 'checked' : ''}}>
                    <span class="ml-2">C. Personajes</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC5" name="spanishPC5" value="D. Malestares"
                    {{old('spanishPC5') == 'D. Malestares' ? 'checked' : ''}}>
                    <span class="ml-2">D. Malestares</span>
                </div>
                @error('spanishPC5')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">6. Los tíos de Antonio lo llevaron a acampar a un monte cercano. Al llegar allí, vieron una señal de prohibición que se usa para evitar incendios. Esta señal es:</label>

                <div class="grid grid-cols-2 gap-4">
                    <div class="mb-2">
                        <img src="{{ asset('img/spanish/four/op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                        <input type="radio" class="form-radio text-indigo-600" id="spanishPC6" name="spanishPC6" value="Opción 1"
                        {{old('spanishPC6') == 'Opción 1' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 1</span>
                    </div>

                    <div class="mb-2">
                        <img src="{{ asset('img/spanish/four/op2.png') }}"class=" w-[100px]" alt="Gráfica 2 ">
                        <input type="radio" class="form-radio text-indigo-600" id="spanishPC6" name="spanishPC6" value="Opción 2"
                        {{old('spanishPC6') == 'Opción 2' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 2</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/spanish/four/op3.png') }}" class=" w-[100px]" alt="Gráfica 3 ">
                        <input type="radio" class="form-radio text-indigo-600" id="spanishPC6" name="spanishPC6" value="Opción 3"
                        {{old('spanishPC6') == 'Opción 3' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 3</span>
                    </div>

                    <div class=" ">
                        <img src="{{ asset('img/spanish/four/op4.png') }}"class=" w-[100px]" alt="Gráfica 4 ">
                        <input type="radio" class="form-radio text-indigo-600" id="spanishPC6" name="spanishPC6" value="Opción 4"
                        {{old('spanishPC6') == 'Opción 4' ? 'checked' : ''}}>
                        <span class="ml-2">Opción 4</span>
                    </div>
                    @error('spanishPC6')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                    @enderror
                </div>
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">7. Juan tiene que escribir un texto sobre el cuidado de las mascotas. La fuente de información que más le sirve para escribir su texto es:</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC7" name="spanishPC7" value="A. La enfermera del centro de salud, porque ella sabe sobre muchas enfermedades."
                    {{old('spanishPC7') == 'A. La enfermera del centro de salud, porque ella sabe sobre muchas enfermedades.' ? 'checked' : ''}}>
                    <span class="ml-2">A. La enfermera del centro de salud, porque ella sabe sobre muchas enfermedades.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC7" name="spanishPC7" value="B. El libro ´Vida sana de las mascotas´, porque trata diversos aspectos sobre la crianza y cuidado de las mascotas"
                    {{old('spanishPC7') == 'B. El libro ´Vida sana de las mascotas´, porque trata diversos aspectos sobre la crianza y cuidado de las mascotas' ? 'checked' : ''}}>
                    <span class="ml-2">B. El libro "Vida sana de las mascotas", porque trata diversos aspectos sobre la crianza y cuidado de las mascotas.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC7" name="spanishPC7" value="C. La profesora de ciencias sociales, porque en clase les ha hablado sobre la importancia de tener una mascota."
                    {{old('spanishPC7') == 'C. La profesora de ciencias sociales, porque en clase les ha hablado sobre la importancia de tener una mascota.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La profesora de ciencias sociales, porque en clase les ha hablado sobre la importancia de tener una mascota.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC7" name="spanishPC7" value="D. El libro de ciencias naturales, porque este contiene información sobre todo tipo de especies."
                    {{old('spanishPC7') == 'D. El libro de ciencias naturales, porque este contiene información sobre todo tipo de especies.' ? 'checked' : ''}}>
                    <span class="ml-2">D. El libro de ciencias naturales, porque este contiene información sobre todo tipo de especies.</span>
                </div>
                @error('spanishPC7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. Lee el inicio del cuento "La sopa de piedras". Escribe un final para esta historia.</label>
                <h1 class="font-bold text-center"> "La sopa de piedras"</h1>
                <p>Un monje estaba haciendo la colecta en una región donde la gente tenía fama de ser muy tacaña. Llegó a casa de unos campesinos, pero alló no le quisieron dar nada. Así que como era la hora de comer y el monje estaba bastante hambriento, dijo: -Pues me voy a preparar una sopa de piedra riquísima.</p>
                <p>Ni corto ni perezoso cogió una piedra del suelo, la limpió y la miró muy bien para comprobar que era la adecuada, la piedra idónea para hacer una sopa.  Los campesinos comenzaron a reírse del monje. Decían que estaba loco, que todo era una gran mentira. Sin embargo, el monje les dijo:</p>
                <p class="mb-10">-¿Cómo? ¿No me digan que no han tomado nunca una sopa de piedra? ¡Pero si es un plato exquisito!</p>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm" 
                    id="commentPC8" 
                    name="commentPC8" 
                    placeholder="Tu respuesta aquí:">{{ old('commentPC8') }}</textarea>
                    @error('commentPC8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <h1 class="font-bold text-center"> "La sopa de piedras"</h1>
                <p>Hace mucho tiempo, un niño paseaba por un prado en cuyo centro encontró un árbol marcado con estas palabras: "Soy un árbol encantado, di las palabras mágicas y verás"</p>
                <br>
                <p>El niño trató de acertar el hechizo. Probó con un ¡abracadabra!, ¡tan-ta-tachán!, y muchas otras cosas. Triste porque nada pasaba, dijo: 
                -¡Por favor, arbolito! y, de repente, se abrió una gran puerta en el tronco del árbol. Adentro estaba oscuro, pero se alcanzaba a leer un cartel que decía: "Sigue haciendo magia", a lo que el niño le respondió : -¡Gracias arbolito!, y se encendió una luz que alumbraba el camino hacia una montaña de juguetes y chocolates que pudo compartir con sus amigos. 
                Desde entonces, "Por favor" y "Gracias" son palabras mágicas. </p>
                <br>
                <h3 class="mb-10 text-right font-bold">Anonimo.</h3>

                <label class="block text-sm font-medium text-gray-600 mb-3">9. El texto anterior es:</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/four/9.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC9" name="spanishPC9" value="A. Un poema, porque utiliza palabras bonitas"
                    {{old('spanishPC9') == 'A. Un poema, porque utiliza palabras bonitas' ? 'checked' : ''}}>
                    <span class="ml-2">A. Un poema, porque utiliza palabras bonitas</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC9" name="spanishPC9" value="B. Un cuento, porque narra una historia sobre un árbol"
                    {{old('spanishPC9') == 'B. Un cuento, porque narra una historia sobre un árbol' ? 'checked' : ''}}>
                    <span class="ml-2">B. Un cuento, porque narra una historia sobre un árbol</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC9" name="spanishPC9" value="C. Una ronda, porque se repiten muchas palabras"
                    {{old('spanishPC9') == 'C. Una ronda, porque se repiten muchas palabras' ? 'checked' : ''}}>
                    <span class="ml-2">C. Una ronda, porque se repiten muchas palabras</span>
                </div>
                @error('spanishPC9')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. La lectura de esta historia enseña que:</label>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC10" name="spanishPC10" value="A. Es bueno conversar con los árboles encantados."
                    {{old('spanishPC10') == 'A. Es bueno conversar con los árboles encantados.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Es bueno conversar con los árboles encantados.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC10" name="spanishPC10" value="B. Cuando se quiere lograr algo, hay que intentarlo muchas veces."
                    {{old('spanishPC10') == 'B. Cuando se quiere lograr algo, hay que intentarlo muchas veces.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Cuando se quiere lograr algo, hay que intentarlo muchas veces.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPC10" name="spanishPC10" value="C. Pedir el favor y agradecer nos ayuda a conseguir lo que queremos."
                    {{old('spanishPC10') == 'C. Pedir el favor y agradecer nos ayuda a conseguir lo que queremos.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Pedir el favor y agradecer nos ayuda a conseguir lo que queremos.</span>
                </div>
                @error('spanishPC10')
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

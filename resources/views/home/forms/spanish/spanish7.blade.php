@extends('home.homePage')

@section('title', 'Formulario de Español grado 7°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 7°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish7') }}" method="POST">
            @csrf

            <div class="mb-10">
                <label>Lea el siguiente texto y responda las preguntas. </label>
                <br><br>
                <h1 class="font-bold">La casa</h1>
                <br>
                <p>He aquí una casa loca, cuyas escaleras no conducen a nada. Uno abre la puerta y cree entrar y en realidad ha salido. Pero cuando uno cree salir sucede lo contrario: uno ha entrado. Y la mayoría de las veces uno no se explica a dónde ha llegado, o qué ha sido del cuerpo de uno en esta casa. Las ventanas tienen la peculiaridad de no mirar hacia afuera sino hacia adentro. Todos los muebles cuelgan a medio metro del techo principal. De manera que para llegar a ellos es necesaria la imposibilidad de volar, o un salto largo y elástico que le permita a uno aferrarse de una silla, por ejemplo, y luego escalarla y sentarse en ella, como en un peligroso columpio. Y lo peor ocurre cuando cada uno de los movimientos oscilantes de los muebles tiende a vencer el equilibrio de los ocupantes, de manera que muchos se han despedazado intentando resistir más de una hora sentados en el mismo sitio. Todos los muebles confabulan sus movimientos para desbaratar a sus ocupantes, y ya se sabe que los muebles flotantes procuran sobre todo que los cuerpos sean derrotados de cabeza; nadie ha podido saltar incólume. Siempre, en la caída, hay otro mueble oscilante que se las arregla para que el cuerpo en condena se estrelle de cabeza contra el suelo.</p>

                <p>A pesar de estas aparentes incomodidades, se escuchan, en la casa, cuando cae la noche, muchas voces y risas, y chocar de copas (y muebles). Nadie ve llegar a los invitados, y tampoco salir, y eso se debe seguramente a la otra originalidad de la puerta, que da la sensación de permitir entrar y salir al mismo tiempo, sin que verdaderamente se haya salido o entrado. Nadie sabe, además, quién es el dueño o quiénes habitan la casa permanentemente. Alguien nos cuenta que vive una pareja de niños. Otros aseguran que no son niños, sino enanos: de lo contrario no se justificarían las fiestas de siempre, escandalizadas por las exclamaciones más obscenas que sea posible imaginar. Hay quienes afirman que nadie vive en la casa, y que en caso contrario no serían niños y tampoco enanos sus habitantes, sino dos jorobadas dementes. Ni unos ni otros dicen la verdad. No han acabado de entender que todos son en realidad mis habitantes, que están dentro de mí como también yo estoy dentro de ellos, que yo soy algo vivo, y que a pesar de todas las vueltas que puedan dar por el mundo quizá nunca les sea posible abandonar mi tiranía para siempre, porque también yo estoy dentro de mí.</p>
            </div>
            
            <!-- Pregunta 1 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">1. Escriba las siguientes categorías gramaticales encontradas  en el cuento: </label>
                <div class="flex items-center text-sm text-gray-700 mb-3">
                    <ul class="pr-10">
                        <li>● Articulo</li>
                        <li>● Pronombre</li>
                        <li>● Sustantivo</li>
                    </ul>

                    <ul class="px-10">
                        <li>● Adjetivo</li>
                        <li>● Verbo</li>
                        <li>● Adveribio</li>
                    </ul>

                    <ul class="px-10">
                        <li>● Interjección</li>
                        <li>● Conjución</li>
                        <li>● Preposición</li>
                    </ul>
                </div>

                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS1" 
                name="commentPS1"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS1') }}</textarea>

                @error('commentPS1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 2 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">2. Identifique en el cuento dos oraciones simples y señale en ellas los siguientes componentes: <span class=" text-black font-medium">Sintagma nominal, sintagma verbal, sujeto expreso, sujeto tácito.</span> 
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS2" 
                name="commentPS2"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS2') }}</textarea>
                @error('commentPS2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">3. Mencione diez aspectos que se deban tener en cuenta en una exposición oral:
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS3" 
                name="commentPS3"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS3') }}</textarea>
                @error('commentPS3')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 4 -->
            <div class="mb-10  border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué es el texto informativo y cuáles son los tipos de textos informativos? Escriba, además, las características de cada uno de ellos. 
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS4" 
                name="commentPS4"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS4') }}</textarea>
                @error('commentPS4')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">5.  ¿Qué es el texto argumentativo y cuáles son los tipos de textos argumentativos? Escriba, además, las características de cada uno de ellos.
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS5" 
                name="commentPS5"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS5') }}</textarea>
                @error('commentPS5')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 6 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">6. ¿Cuáles son las características generales de los medios de comunicación? Mencione cinco características.
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS6" 
                name="commentPS6"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS6') }}</textarea>
                @error('commentPS6')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 7 -->
            <div class="mb-10 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">7.  ¿Qué es una mesa redonda?
                </label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPS7" 
                name="commentPS7"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPS7') }}</textarea>
                @error('commentPS7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 8 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué categoría gramatical es la palabra “ay” cuando expresa sorpresa o dolor?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS8" name="spanishPS8" value="A. Preposición"
                    {{old('spanishPS8') == 'A. Preposición' ? 'checked' : ''}}>
                    <span class="ml-2">A. Preposición</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS8" name="spanishPS8" value="B. Conjunción"
                    {{old('spanishPS8') == 'B. Conjunción' ? 'checked' : ''}}>
                    <span class="ml-2">B. Conjunción</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS8" name="spanishPS8" value="C. Interjección"
                    {{old('spanishPS8') == 'C. Interjección' ? 'checked' : ''}}>
                    <span class="ml-2">C. Interjección</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS8" name="spanishPS8" value="D. Adverbio"
                    {{old('spanishPS8') == 'D. Adverbio' ? 'checked' : ''}}>
                    <span class="ml-2">D. Adverbio</span>
                </div>
                @error('spanishPS8')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué es la comunicación?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS9" name="spanishPS9" value="A. El proceso de intercambio de información entre un emisor y un receptor mediante un código y un canal."
                    {{old('spanishPS9') == 'A. El proceso de intercambio de información entre un emisor y un receptor mediante un código y un canal.' ? 'checked' : ''}}>
                    <span class="ml-2">A. El proceso de intercambio de información entre un emisor y un receptor mediante un código y un canal.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS9" name="spanishPS9" value="B. El conjunto de signos que se utilizan para expresar ideas, sentimientos o emociones."
                    {{old('spanishPS9') == 'B. El conjunto de signos que se utilizan para expresar ideas, sentimientos o emociones.' ? 'checked' : ''}}>
                    <span class="ml-2">B. El conjunto de signos que se utilizan para expresar ideas, sentimientos o emociones.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS9" name="spanishPS9" value="C. La capacidad de comprender y producir diferentes tipos de textos orales y escritos."
                    {{old('spanishPS9') == 'C. La capacidad de comprender y producir diferentes tipos de textos orales y escritos.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La capacidad de comprender y producir diferentes tipos de textos orales y escritos.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS9" name="spanishPS9" value="D. La ciencia que estudia el origen, la estructura y el funcionamiento del lenguaje."
                    {{old('spanishPS9') == 'D. La ciencia que estudia el origen, la estructura y el funcionamiento del lenguaje.' ? 'checked' : ''}}>
                    <span class="ml-2">D. La ciencia que estudia el origen, la estructura y el funcionamiento del lenguaje.</span>
                </div>
                @error('spanishPS9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué es el código en la comunicación?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS10" name="spanishPS10" value="A. El sistema de signos y reglas que comparten el emisor y el receptor para entenderse."
                    {{old('spanishPS10') == 'A. El sistema de signos y reglas que comparten el emisor y el receptor para entenderse.' ? 'checked' : ''}}>
                    <span class="ml-2">A. El sistema de signos y reglas que comparten el emisor y el receptor para entenderse.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS10" name="spanishPS10" value="B. El medio físico por el que se transmite el mensaje del emisor al receptor."
                    {{old('spanishPS10') == 'B. El medio físico por el que se transmite el mensaje del emisor al receptor.' ? 'checked' : ''}}>
                    <span class="ml-2">B. El medio físico por el que se transmite el mensaje del emisor al receptor.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS10" name="spanishPS10" value="C. La información que el emisor quiere comunicar al receptor."
                    {{old('spanishPS10') == 'C. La información que el emisor quiere comunicar al receptor.' ? 'checked' : ''}}>
                    <span class="ml-2">C. La información que el emisor quiere comunicar al receptor.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPS10" name="spanishPS10" value="D. La situación o el contexto en el que se produce la comunicación."
                    {{old('spanishPS10') == 'D. La situación o el contexto en el que se produce la comunicación.' ? 'checked' : ''}}>
                    <span class="ml-2">D. La situación o el contexto en el que se produce la comunicación.</span>
                </div>
                @error('spanishPS10')
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
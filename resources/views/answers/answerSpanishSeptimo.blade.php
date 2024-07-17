@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($spanishSeptimos->isEmpty())
        <p>No hay respuestas disponibles para este usuario.</p>
    @else
        <div class="respuestas" style="overflow-x: scroll;">
            <table>
                <thead>
                    <tr>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 1</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 2</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 3</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 4</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 5</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 6</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 7</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 8</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 9</th>
                        <th class="px-3.5 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">pregunta 10</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($spanishSeptimos as $spanishSeptimo)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishSeptimo->spanishPS10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="bg-white rounded-lg  p-7 mx-10">
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

            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS1 }}</div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">2. Identifique en el cuento dos oraciones simples y señale en ellas los siguientes componentes: <span class=" text-black font-medium">Sintagma nominal, sintagma verbal, sujeto expreso, sujeto tácito.</span> 
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS2 }}</div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">3. Mencione diez aspectos que se deban tener en cuenta en una exposición oral:
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS3 }}</div>
        </div>

        <!-- Pregunta 4 -->
        <div class="mb-10  border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">4. ¿Qué es el texto informativo y cuáles son los tipos de textos informativos? Escriba, además, las características de cada uno de ellos. 
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS4 }}</div>
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-10 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">5.  ¿Qué es el texto argumentativo y cuáles son los tipos de textos argumentativos? Escriba, además, las características de cada uno de ellos.
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS5 }}</div>
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-10 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">6. ¿Cuáles son las características generales de los medios de comunicación? Mencione cinco características.
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS6 }}</div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-10 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">7.  ¿Qué es una mesa redonda?
            </label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishSeptimo->commentPS7 }}</div>
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué categoría gramatical es la palabra “ay” cuando expresa sorpresa o dolor?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Preposición</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Conjunción</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Interjección</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Adverbio</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9) ¿Qué es la comunicación?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. El proceso de intercambio de información entre un emisor y un receptor mediante un código y un canal.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. El conjunto de signos que se utilizan para expresar ideas, sentimientos o emociones.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. La capacidad de comprender y producir diferentes tipos de textos orales y escritos.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. La ciencia que estudia el origen, la estructura y el funcionamiento del lenguaje.</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class=" border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10) ¿Qué es el código en la comunicación?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. El sistema de signos y reglas que comparten el emisor y el receptor para entenderse.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. El medio físico por el que se transmite el mensaje del emisor al receptor.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. La información que el emisor quiere comunicar al receptor.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. La situación o el contexto en el que se produce la comunicación.</span>
            </div>
        </div>
</div>

@endsection
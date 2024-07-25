@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($spanishCuartos->isEmpty())
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
                    @foreach($spanishCuartos as $spanishCuarto)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishCuarto->spanishPC10 }}</td>
                            <!-- Agrega más columnas según los preguntas de tu tabla -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>

<div class="bg-white rounded-lg  p-7 mx-10">
        <!-- Pregunta 1 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">1. Las palabras resaltadas en el texto se encuentran en:</label>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/four/1.jpg') }}" alt="Imagen sin leyenda">
            </div>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Presente</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Pasado</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Futuro</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">D. Infinitivo</span>
            </div>
        </div>

        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué pasa si en la receta no realizamos el paso dos?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Nada, porque el pastel de todos modos sale bien.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. No se puede realizar el pastel porque le haría falta el huevo. </span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. El pastel no saldría bien porque la mantequilla no se batió.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Nada porque enseguida se acomodan los ingredientes.</span>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Cual de las palabras no es un verbo?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Enjuagar</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Sazonador</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Escurrir</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Agregar</span>
            </div>
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
                <span class="ml-2">A. Ramitas y té</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Yerbabuena y agua</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Yerbabuena, agua y un poco de azúcar</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Fuego lento y agua</span>
            </div>
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">5. Las palabras resaltadas y subrayadas en el texto son:</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Sustantivos</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Verbos</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Personajes</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Malestares</span>
            </div>
        </div>

        <!-- Pregunta 6 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">6. Los tíos de Antonio lo llevaron a acampar a un monte cercano. Al llegar allí, vieron una señal de prohibición que se usa para evitar incendios. Esta señal es:</label>

            <div class="grid grid-cols-2 gap-4">
                <div class="mb-2">
                    <img src="{{ asset('img/spanish/four/op1.png') }}" class=" w-[100px]" alt="Gráfica 1 ">
                    <span class="ml-2">Opción 1</span>
                </div>

                <div class="mb-2">
                    <img src="{{ asset('img/spanish/four/op2.png') }}"class=" w-[100px]" alt="Gráfica 2 ">
                    <span class="ml-2">Opción 2</span>
                </div>

                <div class=" ">
                    <img src="{{ asset('img/spanish/four/op3.png') }}" class=" w-[100px]" alt="Gráfica 3 ">
                    <span class="ml-2">Opción 3</span>
                </div>

                <div class=" ">
                    <img src="{{ asset('img/spanish/four/op4.png') }}"class=" w-[100px]" alt="Gráfica 4 ">
                    <span class="ml-2">Opción 4</span>
                </div>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. Juan tiene que escribir un texto sobre el cuidado de las mascotas. La fuente de información que más le sirve para escribir su texto es:</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. La enfermera del centro de salud, porque ella sabe sobre muchas enfermedades.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. El libro "Vida sana de las mascotas", porque trata diversos aspectos sobre la crianza y cuidado de las mascotas.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. La profesora de ciencias sociales, porque en clase les ha hablado sobre la importancia de tener una mascota.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. El libro de ciencias naturales, porque este contiene información sobre todo tipo de especies.</span>
            </div>
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. Lee el inicio del cuento "La sopa de piedras". Escribe un final para esta historia.</label>
            <h1 class="font-bold text-center"> "La sopa de piedras"</h1>
            <p>Un monje estaba haciendo la colecta en una región donde la gente tenía fama de ser muy tacaña. Llegó a casa de unos campesinos, pero alló no le quisieron dar nada. Así que como era la hora de comer y el monje estaba bastante hambriento, dijo: -Pues me voy a preparar una sopa de piedra riquísima.</p>
            <p>Ni corto ni perezoso cogió una piedra del suelo, la limpió y la miró muy bien para comprobar que era la adecuada, la piedra idónea para hacer una sopa.  Los campesinos comenzaron a reírse del monje. Decían que estaba loco, que todo era una gran mentira. Sin embargo, el monje les dijo:</p>
            <p class="mb-10">-¿Cómo? ¿No me digan que no han tomado nunca una sopa de piedra? ¡Pero si es un plato exquisito!</p>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm">
                R/= {{ $spanishCuarto->commentPC8 }}</div>
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
                <span class="ml-2">A. Un poema, porque utiliza palabras bonitas</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Un cuento, porque narra una historia sobre un árbol</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Una ronda, porque se repiten muchas palabras</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. La lectura de esta historia enseña que:</label>
            <div class="flex items-center mb-2">
                <span class="ml-2">A. Es bueno conversar con los árboles encantados.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Cuando se quiere lograr algo, hay que intentarlo muchas veces.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Pedir el favor y agradecer nos ayuda a conseguir lo que queremos.</span>
            </div>
        </div>
</div>

@endsection
@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($spanishNovenos->isEmpty())
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
                    @foreach($spanishNovenos as $spanishNoveno)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishNoveno->spanishPNO10 }}</td>
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
                <span class="ml-2">A. Narrar</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Informar</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Argumentar</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Solicitar</span>
            </div>
        </div>


        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué palabra es un sinónimo de “efímero” en el siguiente fragmento?</label>

            <p>“La vida es efímera, como una flor que se marchita en un día. Por eso hay que aprovechar cada momento, cada oportunidad, cada sueño.”</p> <br>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Breve</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Bello</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Triste</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Frágil</span>
            </div>
        </div>


        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <span>Basándote en tus conocimientos previos y la siguiente definición, responde la pregunta.</span>
            <br><br>
            <p><em>Un sintagma es una palabra o un conjunto de palabras que se organizan alrededor de un núcleo y desempeñan algún tipo de función sintáctica dentro de la oración.</em></p> <br>
            <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Qué tipo de sintagma tiene un verbo como núcleo?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Sintagma nominal</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Sintagma verbal</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Sintagma preposicional</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Sintagma adjetival</span>
            </div>
        </div>


        <!-- Pregunta 4 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">4. ¿Qué categoría gramatical es la palabra <em>“que”</em> cuando introduce una oración subordinada sustantiva?</label>

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


        <!-- Pregunta 5 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">5. ¿Qué tipo de argumento se utiliza en el siguiente texto?</label>
            <p>
            “Los animales no deben ser usados para experimentos científicos, porque tienen derechos y merecen respeto. Además, existen otras alternativas más éticas y eficientes para realizar investigaciones, como el uso de modelos informáticos o celulares.”
            </p>
            <br>
            <div class="flex items-center mb-2">
                <span class="ml-2">A. De autoridad</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. De ejemplificación</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. De analogía</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. De causa y efecto</span>
            </div>
        </div>


        <!-- Pregunta 6 -->
        <div class="mb-3 border-t p-2 border-gray-400">

            <h1 class="font-bold">Responde de la pregunta 6 a la 10, basándote en el siguiente texto.</h1>
            <br>
            <span>Lee el siguiente fragmento del libro La Vorágine de José Eustasio Rivera.</span> <br><br>
            <p>"El sol se había puesto ya; pero la claridad que aún conservaba el cielo permitía distinguir las cosas en la espesura del bosque. Los árboles se erguían como gigantes, con sus ramas entrelazadas formando una bóveda impenetrable. El silencio era profundo, sólo interrumpido por el rumor de algún arroyo oculto entre la maleza o el grito lejano de alguna fiera. De pronto, se oyó un disparo. Luego otro. Y después una ráfaga de tiros que parecía una descarga de fusilería. Era la señal convenida. Los caucheros habían encontrado la maloca de los indios y habían empezado el ataque."</p> <br>

            <label class="block text-sm font-medium text-gray-600 mb-3">6. ¿Qué tipo de narrador tiene el texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Omnisciente</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Testigo</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Protagonista</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Equisciente</span>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué significa la palabra “maloca” en el contexto del texto de <span class="text-black font-bold">La Vorágine?</span></label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Una planta medicinal.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Una choza grande.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Una canoa rápida.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Una trampa mortal.</span>
            </div>
        </div>


        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué efecto produce el uso de la conjunción “pero” en la primera oración del texto de <span class="text-black font-bold">La Vorágine?</span></label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Expresa una oposición entre dos ideas.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Introduce una consecuencia lógica.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Añade una información adicional.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Establece una relación temporal.</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué recurso literario se emplea en el fragmento de <span class="text-black font-bold">La Vorágine?</span> al comparar los árboles con gigantes?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. Metáfora</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. Hipérbole</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. Símil</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. Personificación</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué tema se aborda en el texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">A. La explotación del caucho en la Amazonía.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">B. La aventura de un poeta en la selva que viaja en busca de su amada.</span>
            </div>
            <div class="flex items-center mb-2">
                <span class="ml-2">C. La violencia contra los pueblos indígenas y la barbarie de la explotación.</span>
            </div>
            <div class="flex items-center">
                <span class="ml-2">D. La belleza y el misterio de la naturaleza.</span>
            </div>
        </div>
</div>

@endsection
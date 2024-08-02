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
                    @php
                    $respuestas = [
                        $spanishNoveno->spanishPNO1,
                        $spanishNoveno->spanishPNO2,
                        $spanishNoveno->spanishPNO3,
                        $spanishNoveno->spanishPNO4,
                        $spanishNoveno->spanishPNO5,
                        $spanishNoveno->spanishPNO6,
                        $spanishNoveno->spanishPNO7,
                        $spanishNoveno->spanishPNO8,
                        $spanishNoveno->spanishPNO9,
                        $spanishNoveno->spanishPNO10
                    ];

                    $respuestasCorrectas = [
                        'D. Solicitar',
                        'A. Breve',
                        'B. Sintagma verbal',
                        'B. Conjunción',
                        'B. De ejemplificación',
                        'A. Omnisciente',
                        'B. Una choza grande.',
                        'C. Añade una información adicional.',
                        'C. Símil',
                        'C. La violencia contra los pueblos indígenas y la barbarie de la explotación.',
                    ];
                    @endphp
                        <tr>
                            @foreach ($respuestas as $index => $respuesta)
                                @if ($respuestasCorrectas[$index] !== null)
                                    @if ($respuesta == $respuestasCorrectas[$index])
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: green"></i></td>
                                    @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-x text-sm" style="color: red"></i></td>
                                    @endif
                                @else
                                    @if ($respuesta >= 4)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: green"></i></td>
                                    @elseif ($respuesta < 4 && $respuesta >= 3)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-check text-sm" style="color: #c2bd60"></i></td>
                                    @elseif ($respuesta < 3)
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100"><i class="fas fa-x text-sm" style="color: red"></i></td>
                                    @endif
                                @endif
                            @endforeach
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
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO1 }}</span>
            </div>
        </div>


        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué palabra es un sinónimo de “efímero” en el siguiente fragmento?</label>

            <p>“La vida es efímera, como una flor que se marchita en un día. Por eso hay que aprovechar cada momento, cada oportunidad, cada sueño.”</p> <br>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO2 }}</span>
            </div>
        </div>


        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <span>Basándote en tus conocimientos previos y la siguiente definición, responde la pregunta.</span>
            <br><br>
            <p><em>Un sintagma es una palabra o un conjunto de palabras que se organizan alrededor de un núcleo y desempeñan algún tipo de función sintáctica dentro de la oración.</em></p> <br>
            <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Qué tipo de sintagma tiene un verbo como núcleo?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO3 }}</span>
            </div>
        </div>


        <!-- Pregunta 4 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">4. ¿Qué categoría gramatical es la palabra <em>“que”</em> cuando introduce una oración subordinada sustantiva?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO4 }}</span>
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
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO5 }}</span>
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
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO6 }}</span>
            </div>
        </div>

        <!-- Pregunta 7 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. ¿Qué significa la palabra “maloca” en el contexto del texto de <span class="text-black font-bold">La Vorágine?</span></label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO7 }}</span>
            </div>
        </div>


        <!-- Pregunta 8 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué efecto produce el uso de la conjunción “pero” en la primera oración del texto de <span class="text-black font-bold">La Vorágine?</span></label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO8 }}</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué recurso literario se emplea en el fragmento de <span class="text-black font-bold">La Vorágine?</span> al comparar los árboles con gigantes?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO9 }}</span>
            </div>
        </div>

        <!-- Pregunta 10 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. ¿Qué tema se aborda en el texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishNoveno->spanishPNO10 }}</span>
            </div>
        </div>
</div>

@endsection
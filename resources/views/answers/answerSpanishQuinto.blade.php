@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Respuestas')

@section('content_dashboard')
<div class="container_table_answers">
    <h1 style="margin-bottom: 1rem">Respuestas del Usuario: {{ $user->name }} {{ $user->last_name}}</h1>

    @if($spanishQuintos->isEmpty())
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
                    @foreach($spanishQuintos as $spanishQuinto)
                        <tr>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ1 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ2 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ3 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ4 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ5 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ6 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ7 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ8 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ9 }}</td>
                            <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-100">{{ $spanishQuinto->spanishPQ10 }}</td>
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
            <label class="block text-sm font-medium text-gray-600 mb-3">1. ¿Qué dato le falta a la invitación?</label>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/five/1.png') }}" alt="Imagen sin leyenda">
            </div>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ1 }}</span>
            </div>
        </div>



        <!-- Pregunta 2 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">Lee el siguiente fragmento de un cuento y responde</label>
            <p class="mb-10">Pero un buen día no les quedó ni una moneda para comprar comida, ni un poquito de harina para hacer pan. <br>
            -Nuestros hijos morirán-se lamentó el papá esa noche. <br>
            <span class="font-medium text-black"><em>-Solo hay un remedio-dijo la mamá llorando-</em> </span><br>
            Tenemos que dejarlos en el bosque, cerca del palacio del rey. <br>
            Alguna persona de la corte los recogerá y cuidará. <br>
            Hansel y Gretel, que no se habían podido dormir de hambre, oyeron esa conversación...</p>

            <label class="block text-sm font-medium text-gray-600 mb-3">2. ¿Qué signos tiene la frase resaltada?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ2 }}</span>
            </div>
        </div>

        <!-- Pregunta 3 -->
        <div class="mb-3 border-t p-2 border-gray-400">

            <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Cómo es el escenario donde se desarrolla la historia?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ3 }}</span>
            </div>
        </div>

        <!-- Pregunta 4 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">Lee lo siguiente sobre los hermanos Grimm.</label>
            <p class="mb-10">Los hermanos Grimm es el nombre usado para referirse a los escritores
                 Jacob Grimm y Wilhelm Grimm, alemanes célebres por sus cuentos para niños. Uno 
                 era bibliotecario y el otro secretario de biblioteca. Antes de llegar a los 30 años habían logrado sobresalir garcias a sus 
                 publicaciones. También fueron profesores universitarios, los cuales no
                 solo escribieron cuentos, sino además diccionarios en 33 tomos. Uno de
                 sus cuentos más famosos fue "Hansel y Gretel".</p>

            <label class="block text-sm font-medium text-gray-600 mb-3">4. ¿Dónde nacieron los hermanos Grimm?</label>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/five/4.png') }}" alt="Imagen sin leyenda">
            </div>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ4 }}</span>
            </div>
        </div>

        <!-- Pregunta 5 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">5. ¿Qué obras realizaron?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ5 }}</span>
            </div>
        </div>


        <!-- Pregunta 6 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-5">6. Escribe en los siguientes renglones, qué es lo que más te ha gustado del colegio.</label>
            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishQuinto->commentPQ6 }}</div>
        </div>


        <!-- Pregunta 7 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">7. Lee el siguiente texto y extrae de él algunos sustantivos que encuentres.</label>
            <h1 class="font-bold text-center"> Don Quijote de la Mancha </h1>
            <p class="mb-10">En un lugar de la Mancha, de cuyo nombre no quiero acordarme, vivía un hidalgo de los de lanza y astillero, escudo de cuero, rocín, flaco y galgo corredor. <br>
            Tenía en su casa una ama que pasaba de los cuarenta y una sobrina que no llegaba a los veinte, y un mozo de campo y plaza que encillaba el rocín y tenía otros oficios.  Rozaba la edad de nuestro hidalgo con los cincuenta años; era de complexión recia, seco de carnes, enjuto de rostro, gran madrugador y amigo de la caza. Quieren decir que tenía el sobrenombre de Quijada o Quesada, que en esto hay alguna diferencia en los autores que de este caso escriben..</p>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/five/7.png') }}" alt="Imagen sin leyenda">
            </div>

            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
            R/= {{ $spanishQuinto->commentPQ7 }}</div>
        </div>

        <!-- Pregunta 8 -->
        <div class="mb-5 border-t p-2 border-gray-400">
            <p class="mb-2">Los elefantes marinos pasan la mayor parte de su vida durmiendo. Estos voluminosos animales raras veces se mueven. Los machos miden casi cinco metros y pesan unas tres toneladas. De vez en cuando, el elefante usa una aleta para rascarse o tirar arena sobre su cuerpo.</p>

            <span>“Estos voluminosos animales raras veces se mueven.”</span> <br><br>

            <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué significa la palabra voluminosos en el texto?</label>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ8 }}</span>
            </div>
        </div>

        <!-- Pregunta 9 -->
        <div class="mb-3 border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué ofrece el anuncio?</label>

            <div class="flex items-center mb-2">
                <img src="{{ asset('img/spanish/five/9.png') }}" alt="Imagen sin leyenda">
            </div>

            <div class="flex items-center mb-2">
                <span class="ml-2">R/= {{ $spanishQuinto->spanishPQ9 }}</span>
            </div>
        </div>


        <!-- Pregunta 10 -->
        <div class=" border-t p-2 border-gray-400">
            <label class="block text-sm font-medium text-gray-600 mb-3">10. Termina la historia a continuación:</label>
            <p class="mb-10">Había una zorra que nunca había visto un león. La puso el destino un día delante de la real fiera. Y como era la primera vez que lo veía, sintió un miedo espantoso y...</p>

            <div class="form-textarea p-2 mt-1 block w-full rounded-md shadow-sm ">
                R/= {{ $spanishQuinto->commentPQ10 }}</div>
        </div>
</div>

@endsection
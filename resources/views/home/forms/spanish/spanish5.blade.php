@extends('home.homePage')

@section('Formulario de Español grado 5°')

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
        <h1 class="text-2xl font-semibold text-center mb-4">Formulario de admisión de Lengua Castelllana <br> para aspirantes a grado 5°</h1>

        <form class=" gap-8 max-w-4xl mx-auto bg-white p-10 rounded-md shadow-md" action="{{ route('store.spanish5') }}" method="POST">
            @csrf
            
            <!-- Pregunta 1 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">1. ¿Qué dato le falta a la invitación?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/five/1.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ1" name="spanishPQ1" value="A. La hora del evento"
                    {{old('spanishPQ1') == 'A. La hora del evento' ? 'checked' : ''}}>
                    <span class="ml-2">A. La hora del evento</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ1" name="spanishPQ1" value="B. El lugar del evento"
                    {{old('spanishPQ1') == 'B. El lugar del evento' ? 'checked' : ''}}>
                    <span class="ml-2">B. El lugar del evento</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ1" name="spanishPQ1" value="C. El nombre de la escuela"
                    {{old('spanishPQ1') == 'C. El nombre de la escuela' ? 'checked' : ''}}>
                    <span class="ml-2">C. El nombre de la escuela</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ1" name="spanishPQ1" value="D. La fecha del evento"
                    {{old('spanishPQ1') == 'D. La fecha del evento' ? 'checked' : ''}}>
                    <span class="ml-2">D. La fecha del evento</span>
                </div>
                @error('spanishPQ1')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
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
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ2" name="spanishPQ2" value="A. De interrogación"
                    {{old('spanishPQ2') == 'A. De interrogación' ? 'checked' : ''}}>
                    <span class="ml-2">A. De interrogación</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ2" name="spanishPQ2" value="B. Guión de diálogo"
                    {{old('spanishPQ2') == 'B. Guión de diálogo' ? 'checked' : ''}}>
                    <span class="ml-2">B. Guión de diálogo</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ2" name="spanishPQ2" value="C. Paréntesis"
                    {{old('spanishPQ2') == 'C. Paréntesis' ? 'checked' : ''}}>
                    <span class="ml-2">C. Paréntesis</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ2" name="spanishPQ2" value="D. Comillas"
                    {{old('spanishPQ2') == 'D. Comillas' ? 'checked' : ''}}>
                    <span class="ml-2">D. Comillas</span>
                </div>
                @error('spanishPQ2')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 3 -->
            <div class="mb-3 border-t p-2 border-gray-400">

                <label class="block text-sm font-medium text-gray-600 mb-3">3. ¿Cómo es el escenario donde se desarrolla la historia?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ3" name="spanishPQ3" value="A. Una ciudad rica y ostentosa"
                    {{old('spanishPQ3') == 'A. Una ciudad rica y ostentosa' ? 'checked' : ''}}>
                    <span class="ml-2">A. Una ciudad rica y ostentosa</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ3" name="spanishPQ3" value="B. Un parque de diversiones"
                    {{old('spanishPQ3') == 'B. Un parque de diversiones' ? 'checked' : ''}}>
                    <span class="ml-2">B. Un parque de diversiones</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ3" name="spanishPQ3" value="C. Una casa humilde en el bosque"
                    {{old('spanishPQ3') == 'C. Una casa humilde en el bosque' ? 'checked' : ''}}>
                    <span class="ml-2">C. Una casa humilde en el bosque</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ3" name="spanishPQ3" value="D. Un castillo en el bosque"
                    {{old('spanishPQ3') == 'D. Un castillo en el bosque' ? 'checked' : ''}}>
                    <span class="ml-2">D. Un castillo en el bosque</span>
                </div>
                @error('spanishPQ3')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
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
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ4" name="spanishPQ4" value="A. Estados Unidos"
                    {{old('spanishPQ4') == 'A. Estados Unidos' ? 'checked' : ''}}>
                    <span class="ml-2">A. Estados Unidos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ4" name="spanishPQ4" value="B. México"
                    {{old('spanishPQ4') == 'B. México' ? 'checked' : ''}}>
                    <span class="ml-2">B. México</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ4" name="spanishPQ4" value="C. Alemania"
                    {{old('spanishPQ4') == 'C. Alemania' ? 'checked' : ''}}>
                    <span class="ml-2">C. Alemania</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ4" name="spanishPQ4" value="D. Noruega"
                    {{old('spanishPQ4') == 'D. Noruega' ? 'checked' : ''}}>
                    <span class="ml-2">D. Noruega</span>
                </div>
                @error('spanishPQ4')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>

            <!-- Pregunta 5 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">5. ¿Qué obras realizaron?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ5" name="spanishPQ5" value="A. Poemas y prosas"
                    {{old('spanishPQ5') == 'A. Poemas y prosas' ? 'checked' : ''}}>
                    <span class="ml-2">A. Poemas y prosas</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ5" name="spanishPQ5" value="B. Cuentos y diccionarios"
                    {{old('spanishPQ5') == 'B. Cuentos y diccionarios' ? 'checked' : ''}}>
                    <span class="ml-2">B. Cuentos y diccionarios</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ5" name="spanishPQ5" value="C. Reportajes"
                    {{old('spanishPQ5') == 'C. Reportajes' ? 'checked' : ''}}>
                    <span class="ml-2">C. Reportajes</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ5" name="spanishPQ5" value="D. Obras de teatro"
                    {{old('spanishPQ5') == 'D. Obras de teatro' ? 'checked' : ''}}>
                    <span class="ml-2">D. Obras de teatro</span>
                </div>
                @error('spanishPQ5')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>


            <!-- Pregunta 6 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-5">6. Escribe en los siguientes renglones, qué es lo que más te ha gustado del colegio.</label>
                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPQ6" 
                name="commentPQ6"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPQ6') }}</textarea>
                @error('commentPQ6')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
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

                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPQ7" 
                name="commentPQ7"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPQ7') }}</textarea>
                @error('commentPQ7')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>


            <!-- Pregunta 8 -->
            <div class="mb-5 border-t p-2 border-gray-400">
                <p class="mb-2">Los elefantes marinos pasan la mayor parte de su vida durmiendo. Estos voluminosos animales raras veces se mueven. Los machos miden casi cinco metros y pesan unas tres toneladas. De vez en cuando, el elefante usa una aleta para rascarse o tirar arena sobre su cuerpo.</p>

                <span>“Estos voluminosos animales raras veces se mueven.”</span> <br><br>

                <label class="block text-sm font-medium text-gray-600 mb-3">8. ¿Qué significa la palabra voluminosos en el texto?</label>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ8" name="spanishPQ8" value="A. Enormes"
                    {{old('spanishPQ8') == 'A. Enormes' ? 'checked' : ''}}>
                    <span class="ml-2">A. Enormes</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ8" name="spanishPQ8" value="B. Hambrientos"
                    {{old('spanishPQ8') == 'B. Hambrientos' ? 'checked' : ''}}>
                    <span class="ml-2">B. Hambrientos</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ8" name="spanishPQ8" value="C. Lentos"
                    {{old('spanishPQ8') == 'C. Lentos' ? 'checked' : ''}}>
                    <span class="ml-2">C. Lentos</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ8" name="spanishPQ8" value="D. Divertidos"
                    {{old('spanishPQ8') == 'D. Divertidos' ? 'checked' : ''}}>
                    <span class="ml-2">D. Divertidos</span>
                </div>
                @error('spanishPQ8')
                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
            @enderror
            </div>

            <!-- Pregunta 9 -->
            <div class="mb-3 border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">9. ¿Qué ofrece el anuncio?</label>

                <div class="flex items-center mb-2">
                    <img src="{{ asset('img/spanish/five/9.png') }}" alt="Imagen sin leyenda">
                </div>

                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ9" name="spanishPQ9" value="A. Libros para niños."
                    {{old('spanishPQ9') == 'A. Libros para niños.' ? 'checked' : ''}}>
                    <span class="ml-2">A. Libros para niños.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ9" name="spanishPQ9" value="B. Artículos para el hogar."
                    {{old('spanishPQ9') == 'B. Artículos para el hogar.' ? 'checked' : ''}}>
                    <span class="ml-2">B. Artículos para el hogar.</span>
                </div>
                <div class="flex items-center mb-2">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ9" name="spanishPQ9" value="C. Clases de baile."
                    {{old('spanishPQ9') == 'C. Clases de baile.' ? 'checked' : ''}}>
                    <span class="ml-2">C. Clases de baile.</span>
                </div>
                <div class="flex items-center">
                    <input type="radio" class="form-radio text-indigo-600" id="spanishPQ9" name="spanishPQ9" value="D. Celebración de eventos."
                    {{old('spanishPQ9') == 'D. Celebración de eventos.' ? 'checked' : ''}}>
                    <span class="ml-2">D. Celebración de eventos.</span>
                </div>
                @error('spanishPQ9')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Campo vacio</span></p>
                @enderror
            </div>


            <!-- Pregunta 10 -->
            <div class=" border-t p-2 border-gray-400">
                <label class="block text-sm font-medium text-gray-600 mb-3">10. Termina la historia a continuación:</label>
                <p class="mb-10">Había una zorra que nunca había visto un león. La puso el destino un día delante de la real fiera. Y como era la primera vez que lo veía, sintió un miedo espantoso y...</p>

                <textarea class="form-textarea p-2 mt-1 block w-full rounded-md border border-gray-400 shadow-sm " 
                id="commentPQ10" 
                name="commentPQ10"  
                placeholder="Tu respuesta aquí: ">{{ old('commentPQ10') }}</textarea>
                @error('commentPQ10')
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
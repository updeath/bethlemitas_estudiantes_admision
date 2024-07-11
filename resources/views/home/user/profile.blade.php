@extends('home.homePage')

@section('title', 'Perfil')

@section('sub_title', 'Perfil')

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
</style>

@section('content_dashboard')

    <!-- Formulario -->
    <form class=" mx-85 bg-white py-9 px-9 rounded-lg m-1" action="{{ route('profile.update') }}" method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-2">
            <div class="relative z-0 w-full group">
                <div class="grid md:grid-cols-2 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="name" name="name" value="{{ Auth::user()->name }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombres</label>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                        @enderror
                    </div>

                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" id="last_name" name="last_name" value="{{ Auth::user()->last_name }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
                        @error('last_name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                        @enderror
                    </div>
                </div>

                <!-- ---------------------------------------------------- -->
                <!-- ---------------------------------------------------- -->
                <!-- ------------------------------------------.....----- -->

                <div class="relative z-0 w-full mb-5 group">
                    <input type="email" id="email" name="email" value="{{ Auth::user()->email }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo
                        electronico</label>
                    @error('email')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                    @enderror
                </div>

                <!-- ---------------------------------------------------- -->
                <!-- ---------------------------------------------------- -->
                <!-- ---------------------------------------------------- -->

                <div class="relative z-0 w-full mb-5 group">
                    <input type="password" id="password" name="password" value="{{ Auth::user()->password }}"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                        placeholder=" " />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        Cambiar contraseña
                    </label>
                </div>
                <!-- ---------------------------------------------------- -->
                <!-- ---------------------------------------------------- -->
                <!-- ---------------------------------------------------- -->

                <div class="grid md:grid-cols-1 md:gap-6">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="number" id="iphone" name="iphone" value="{{ Auth::user()->iphone }}"
                            class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                            placeholder=" " />
                        <label
                            class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                            Celular</label>
                    </div>

                    <!-- ---------------------------------------------------- -->
                    <!-- ---------------------------------------------------- -->
                    <!-- ---------------------------------------------------- -->


                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="   ">
                            <label class="peer-focus:font-medium text-sm text-gray-500 dark:text-gray-400">
                                Tipo de documento
                            </label>
                            <div class="">
                                <select id="typeDocumment" name="typeDocumment"
                                    class="w-full bg-[#3A8BC0] border border-gray-200 text-white text-sm py-2 px-3 pr-8 mb-3 rounded">
                                    <option>Seleccionar</option>
                                    <option value="TI" {{ Auth::user()->typeDocumment == 'TI' ? 'selected' : '' }}>Tarjeta
                                        de identidad</option>
                                    <option value="CC" {{ Auth::user()->typeDocumment == 'CC' ? 'selected' : '' }}>Cédula
                                        de ciudadanía</option>
                                    <option value="NUIP" {{ Auth::user()->typeDocumment == 'NUIP' ? 'selected' : '' }}>Registro
                                         civil</option>
                                </select>
                            </div>
                        </div>

                        <div class="relative z-0 w-full mb-3 group">
                            <input type="text" id="number_documment" name="number_documment"
                                value="{{ Auth::user()->number_documment }}"
                                class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                placeholder="" />
                            <label for="floating_company"
                                class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numero
                                de documento
                            </label>
                            @error('number_documment')
                                <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                            @enderror
                        </div>
                    </div>

                    <!-- ---------------------------------------------------- -->
                    <!-- ---------------------------------------------------- -->
                    <!-- ---------------------------------------------------- -->

                    <button type="submit"
                        class="text-white bg-[#3A8BC0] hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Actualizar
                        perfil</button>
                </div>
            
            </div>

            <!-- ----------------------------------------------- -->
            <!-- ----------------------------------------------- -->
            <!-- ----------------------------------------------- -->
            <!-- Actualizar foto de perfil -->
            <!-- ----------------------------------------------- -->
            <!-- ----------------------------------------------- -->
            <!-- ----------------------------------------------- -->

            <div class="flex flex-col items-center max-w-md mx-auto bg-white py-5 px-8">
                @if (Auth::user()->image)
                    <img name='image' id="image" src="{{ asset(Auth::user()->image) }}"
                        alt="Foto del perfil" class="w-20 h-20 rounded-full mb-4">
                @else
                    <img src="{{ asset('img/logo.png') }}" alt="Foto del perfil"
                        class="w-20 h-20 rounded-full mb-4">
                @endif
                <div class="relative z-0 w-full mb-5 group">
                    
                    <input type="file" name="image" id="image"
                        class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" />
                    <label
                        class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Foto
                        de perfil</label>
                </div>
                <div class="text-left">
                    <h2 class=" text-gray-800"><span class="font-bold">Nombre completo:</span> {{ Auth::user()->name }} {{ Auth::user()->last_name }}</h2>
                    <h2 class="text-gray-800"><span class="font-bold">Rol:</span> {{ implode(', ', Auth::user()->roles->pluck('name')->toArray()) }}</h2>
                    <h2 class=" text-gray-800"><span class="font-bold">Correo:</span> {{ Auth::user()->email }}</h2>
                    <h2 class=" text-gray-800"><span class="font-bold">No. de documento:</span> {{ Auth::user()->number_documment }}</h2>
                    <h2 class=" text-gray-800"><span class="font-bold">Tipo de documento:</span> {{ Auth::user()->typeDocumment }}</h2>
                    <h2 class=" text-gray-800"><span class="font-bold">Celular:</span> {{ Auth::user()->iphone }}</h2>
                </div>
            </div>

        </div>
    </form>











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

    @if (session('info'))
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
            icon: 'info',
            title: '{{ session('info') }}',
        });
    </script>
@endif
@endsection

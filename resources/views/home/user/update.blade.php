@extends('home.homePage')

@section('title', 'Editar Usuario')

@section('sub_title', 'Editar Usuario')

@section('content_dashboard')

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

</style>

@section('content_dashboard')
<div class="grid md:grid-cols-2 gap-6 py-5 px-8">
    <form class=" max-w-md mx-auto bg-white py-3 px-8 rounded-lg" action="{{route('user.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="name" id="name" value="{{ $user->name }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombres</label>
                @error('name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="last_name" id="last_name" value="{{ $user->last_name }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Apellidos</label>
                @error('last_name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                @enderror
            </div>
        </div>

        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="degree" id="degree" value="{{ old('degree', $user->degree) }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Grado:</label>
                @error('last_name')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                @enderror
            </div>

            <div class="   ">
                <label class="peer-focus:font-medium  text-sm text-gray-500 dark:text-gray-400" for="location">
                    Asignatura (Docente)
                </label>
                <div>
                    <select name="asignature" id="asignature" value="{{ $user->asignature }}"
                        class="w-full bg-gray-200 border border-gray-200 text-gray-600 text-xs py-2 px-3 pr-8 mb-3 rounded"
                        id="location">
                        <option disabled selected> Seleccionar </option>
                        <option value="english" {{ $user->asignature == 'english' ? 'selected' : '' }}>Inglés
                        </option>
                        <option value="math" {{ $user->asignature == 'math' ? 'selected' : '' }}>Matemáticas
                        </option>
                        <option value="spanish" {{ $user->asignature == 'spanish' ? 'selected' : '' }}>Español
                        </option>
                        
                    </select>
                </div>
            </div>
        </div>
        

        <!-- ---------------------------------------------------- -->
        <!-- ---------------------------------------------------- -->
        <!-- ------------------------------------------.....----- -->

        <div class="relative z-0 w-full mb-5 group">
            <input type="email" name="email" id="email" value="{{ $user->email }}"
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
        <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="number_documment" id="number_documment" value="{{ $user->number_documment }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_phone"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Numero
                    de documento</label>
                @error('number_documment')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                @enderror
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="number" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" name="iphone" id="iphone"
                value="{{ $user->iphone }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Celular</label>
                @error('iphone')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                @enderror
            </div>
        </div>


        <div class="grid md:grid-cols-1 md:gap-6">




            <div class="relative z-0 w-full mb-5 group">
                <input type="password" name="password" id="password" value="{{ $user->password }}"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-black dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " />
                <label for="floating_phone"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-4 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Cambiar Contraseña</label>
                @error('password')
                    <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">La contraseña debe de tener mino 6 caracteres</span></p>
                @enderror
            </div>






            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->


            <div class="grid md:grid-cols-2 md:gap-6">
                <div class="   ">
                    <label class="peer-focus:font-medium  text-sm text-gray-500 dark:text-gray-400" for="location">
                        Tipo de documento
                    </label>
                    <div>
                        <select name="typeDocumment" id="typeDocumment" value="{{ $user->typeDocumment }}"
                            class="w-full bg-gray-200 border border-gray-200 text-gray-600 text-xs py-2 px-3 pr-8 mb-3 rounded"
                            id="location">
                            <option> Seleccionar </option>
                            <option value="CC" {{ $user->typeDocumment == 'CC' ? 'selected' : '' }}>Cedula de ciudadania
                            </option>
                            <option value="TI" {{ $user->typeDocumment == 'TI' ? 'selected' : '' }}>Tarjeta de identidad
                            </option>
                            <option value="NUIP" {{ $user->typeDocumment == 'NUIP' ? 'selected' : '' }}>Registro civil
                            </option>
                        </select>
                    </div>
                    @error('typeDocumment')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                    @enderror
                </div>

                <div class="">
                    <label class="peer-focus:font-medium  text-sm text-gray-500 dark:text-gray-400" for="location">
                        Estado
                    </label>
                    <div>
                        <select name="status" id="status" value="{{ $user->status }}"
                            class="w-full bg-gray-200 border border-gray-200 text-gray-600 text-xs py-2 px-3 pr-8 mb-3 rounded"
                            id="location">
                            <option> Seleccionar </option>
                            <option value="Activo" {{ $user->status == 'Activo' ? 'selected' : '' }}>Activo</option>
                            <option value="Bloqueado" {{ $user->status == 'Bloqueado' ? 'selected' : '' }}>Bloqueado
                            </option>
                        </select>
                    </div>
                    @error('status')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                    @enderror
                </div>
                <div class="w-full">
                    <label for="roles" class="block text-sm font-medium text-gray-600 dark:text-gray-400">
                        Roles
                    </label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <select name="roles[]" id="roles" class="block w-full px-3 py-2 border border-gray-300 bg-white rounded-md focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50 sm:text-sm">
                            <!-- Lista de roles -->
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ in_array($role->id, $user->roles->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('roles')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-500"><span class="font-medium">Incorrecto</span></p>
                    @enderror
                </div>
            </div>


            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->
            <!-- ---------------------------------------------------- -->

            <button type="submit"
                class="text-white bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center ">Editar Usuario</button>

    </form>
</div>

<div class=" add rounded-lg m-4 py-5 px-5 h-[65vh] my-[1px]">
    <img src="{{ asset('img/user_edit.svg') }}" class="py-[7vh]" alt="">
</div>

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

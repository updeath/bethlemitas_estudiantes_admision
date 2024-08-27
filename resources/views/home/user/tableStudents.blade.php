@extends('home.homePage')

@section('title', 'Listado de Aspirantes')

@section('sub_title', 'Listado de Aspirantes')

@section('content_dashboard')

<div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="flex items-center mb-2 lg:mb-0">
            <div class="m-2">
                <a href="{{ route('exportar.usuarios.excel') }}" class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-lg">
                    <i class="fas fa-download mr-2"></i> Exportar excel
                </a>
            </div>
        </div>

        <div class="relative">
            <form action="{{ route('user.tableStudents') }}" method="GET" class="flex items-center">
                <input type="search" name="search" class="bg-purple-white shadow rounded-l border-0 p-2" placeholder="Buscar">
                <button type="submit" class="bg-purple-white hover:bg-purple-200 text-purple-lighter font-bold py-2 px-4 rounded-r">
                    <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52.966 52.966" style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
                        <path d="M51.704,51.273L36.845,35.82c3.79-3.801,6.138-9.041,6.138-14.82c0-11.58-9.42-21-21-21s-21,9.42-21,21s9.42,21,21,21
                                c5.083,0,9.748-1.817,13.384-4.832l14.895,15.491c0.196,0.205,0.458,0.307,0.721,0.307c0.25,0,0.499-0.093,0.693-0.279
                                C52.074,52.304,52.086,51.671,51.704,51.273z M21.983,40c-10.477,0-19-8.523-19-19s8.523-19,19-19s19,8.523,19,19
                                S32.459,40,21.983,40z" />
                    </svg>
                </button>
            </form>
        </div>
    </div>



    <div class="flex flex-col mt-8">
        <div class="py-2 -my-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
            <div class="inline-block min-w-full overflow-hidden align-middle border-b border-gray-200 shadow sm:rounded-lg">
                <table class="min-w-full">
                    <thead>
                        <tr>
                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Fecha Inicio</th>
                            
                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Fecha de prueba</th>
                        
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nombre Completo</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Número de Documento</th>
                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Tipo de Documento</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Celular</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Estado</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Grado</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Rol Asignado</th>

                            
                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50" @if (Auth::user()->hasRole(['Docente', 'CoordinadorConvivencia', 'Aspirante', 'Psicoorientador'])) style="display: none" @endif>
                                Acciones</th>
                            
                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @foreach ($users as $user)
                            <tr>
                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $user->created_at->setTimezone('America/Bogota')->format('Y-m-d H:i:s') }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    {{ $user->test_date }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-10 h-10">
                                            @if ($user->image)
                                                <img name='image' id="image" src="{{ asset($user->image) }}"
                                                    alt="Foto del perfil" class="w-10 h-10 rounded-full">
                                            @else
                                                <img src="{{ asset('img/logo.png') }}" alt="Foto del perfil"
                                                    class="w-10 h-10 rounded-full">
                                            @endif
                                        </div>

                                        <div class="ml-4">
                                            <div class="text-sm font-medium leading-5 text-gray-900">{{ $user->name }}
                                                {{ $user->last_name }}
                                            </div>
                                            <div class="text-sm leading-5 text-gray-500">{{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    {{ $user->number_documment }}
                                </td>

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $user->typeDocumment }}</div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    {{ $user->iphone }}
                                </td>

                                @if ($user->status == 'Activo')
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full">Activo</span>
                                    </td>
                                @else
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <span
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full">Bloqueado</span>
                                    </td>
                                @endif

                                <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                    <div class="text-sm leading-5 text-gray-900">{{ $user->degree }}</div>
                                </td>

                                <td
                                    class="px-6 py-4 text-sm leading-5 text-gray-500 whitespace-no-wrap border-b border-gray-200">
                                    @if (isset($userRoles[$user->id]) && is_array($userRoles[$user->id]))
                                        <span class="badge badge-primary">{{ implode(', ', $userRoles[$user->id]) }}</span>
                                    @else
                                        Sin Rol Asignado
                                    @endif
                                </td>

                                <td
                                    class="px-4 py-4 text-sm font-medium leading-5 text-right whitespace-no-wrap border-b border-gray-200"
                                    @if (Auth::user()->hasRole(['Docente', 'CoordinadorConvivencia', 'Aspirante', 'Psicoorientador'])) style="display: none" @endif>
                                    <a href="{{ route('user.edit', $user->id) }}"
                                        class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                    <label>|</label>
                                    <button class="text-red-600 hover:text-red-900 form-delete"
                                        data-id="{{$user->id}}">Eliminar</button>
                                    <form id="delete-form-{{$user->id}}" action="{{ route('user.destroy', $user->id) }}"
                                        method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="bg-white dark:bg-gray-800 px-4 py-3 border-t dark:border-gray-700 text-gray-900 dark:text-white">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

@if (session('destroy_user') == 'ok_user')
<script>
    Swal.fire(
        'Eliminado correctamente!',
        'Su Usuario ha sido eliminado.',
        'success'
    )
</script>
@endif

<script>
    $('.form-delete').click(function (e) {
        e.preventDefault();

        var id = $(this).data('id');

        Swal.fire({
            title: '¿Estás seguro de eliminar el Usuario?',
            text: '¡No podrás revertir esto!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Sí, eliminarlo',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                $('#delete-form-' + id).submit();
            }
        });
    });
</script>

@endsection

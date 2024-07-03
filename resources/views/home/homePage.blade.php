@extends('layout.materPage')

@section('title', 'Pagina principal')

@section('content')

<div>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

    <div x-data="{ sidebarOpen: false }" class="flex h-screen bg-white-200">
        <div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
            class="fixed inset-0 z-20 transition-opacity bg-black opacity-50 lg:hidden"></div>

        <div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
            class="fixed inset-y-0 left-0 z-30 w-64 overflow-y-auto transition duration-300 transform bg-white lg:translate-x-0 lg:static lg:inset-0">
            <div class="flex items-center justify-center mt-8">
                <div class="flex items-center">
                    <img class="w-20 h-20" src="{{ asset('img/logo.png') }}">

                    <span class=" text-2xl font-bold text-black text-center"><em>Bethlemitas  Pereira</em></span>
                </div>
            </div>

            <nav class="mt-10">
                <a href="{{ route('start') }}" class="flex items-center px-6 py-2 mt-4 bg-[#3A8BC0] text-gray-100 "
                    href="#">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                        </path>
                    </svg>

                    <span class="mx-2">Página Principal</span>
                </a>

                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->
                @can('create_user')
                <div x-data="{ isOpen: false }">
                    <a @click="isOpen = !isOpen"
                        class="flex items-center px-6 py-1 mt-4 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                        href="#">
                        <svg class="h-6 w-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                        <span class="mx-2">Usuarios</span>
                    </a>

                    <div x-show="isOpen" class="ml-10">
                        <a href="{{ route('create_user') }}"
                            class="flex items-center px-6 py-2 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                            href="#">
                            <!-- Icono si es necesario -->
                            <span class="mx-3">• Crear Usuario</span>
                        </a>
                        <a href="{{ route('listingUser') }}"
                            class="flex items-center px-6 py-2  text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                            href="#">
                            <!-- Icono si es necesario -->
                            <span class="mx-3">• Listar Usuarios</span>
                        </a>

                        <a href="{{ route('user.tableStudents') }}"
                            class="flex items-center px-6 py-2 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                            href="#">
                            <!-- Icono si es necesario -->
                            <span class="mx-3">• Listar Aspirantes</span>
                        </a>
                        <!-- Puedes agregar más sub-enlaces aquí si es necesario -->
                    </div>
                </div>
                @endcan


                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->

                @if(auth()->check() && auth()->user()->hasRole(['Admin', 'CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector', 'Docente']))
                    @if(auth()->user()->asignature !== 'english')

                        <div x-data="{ isOpen: false, subMenu: false, selectedOption: '' }">
                            <a @click="isOpen = !isOpen"
                                class="flex items-center px-6 py-1 mt-4 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                                href="#">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                                    </path>
                                    <span class="mx-2">Tablas (Resultados)</span>
                                </svg>
                            </a>

                            <div x-show="isOpen" class="ml-6">

                                @if(auth()->check() && (auth()->user()->hasRole(['Docente']) || auth()->user()->hasRole(['Admin', 'CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector'])) && (auth()->user()->asignature == 'math' || auth()->user()->hasRole(['Admin', 'CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector']) ))

                                    <a @click="subMenu = 'Matematicas'; selectedOption = 'Matematicas'"
                                        class="flex items-center px-6 mt-1 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                                        href="#">
                                        <span class="mx-3">• Resultados de Matemáticas</span>
                                    </a>
                                @endif
                                
                                <div x-show="subMenu" class="ml-6">
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math4') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 4°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math5') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 5°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math6') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 6°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math7') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">•
                                        Grado 7°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math8') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 8°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math9') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 9°</a>
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('table.math10') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 10°</a>
                                </div>

                                @if(auth()->check() && (auth()->user()->hasRole(['Docente']) || auth()->user()->hasRole(['Admin', 'CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector'])) && (auth()->user()->asignature == 'spanish' || auth()->user()->hasRole(['Admin', 'CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector']))) 
                                    <a @click="subMenu = 'Español'; selectedOption = 'Español'"
                                        class="flex items-center px-6 mt-1 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                                        href="#">
                                        <span class="mx-3">• Resultados de Lengua Castellana</span>
                                    </a>
                                @endif

                                <div x-show="subMenu" class="ml-6">
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish4') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 4°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish5') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 5°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish6') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 6°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish7') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 7°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish8') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 8°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish9') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 9°</a>
                                    <a x-show="selectedOption === 'Español'" href="{{ route('tables.spanish10') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 10°</a>
                                </div>

                            </div>

                        </div>

                    @endif

                 @endif


                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->
                <!-- ------------------------------------------------------------------ -->

                <div x-data="{ isOpen: false, subMenu: false, selectedOption: '' }">
                    @if(auth()->user()->hasRole(['Aspirante','Docente','Admin','CoordinadorAcademico', 'CoordinadorConvivencia','Rector']))
                        <a @click="isOpen = !isOpen"
                            class="flex items-center px-6 py-1 mt-4 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                            href="#">
                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                </path>
                            </svg>
                            <span class="mx-2">Prueba de Admisión</span>
                        </a>
                    @endif


                    <div x-show="isOpen" class="ml-6">
                        @if(auth()->check() && (auth()->user()->hasRole(['Docente']) && auth()->user()->asignature == 'math' || auth()->user()->hasRole('Aspirante') || auth()->user()->hasRole(['CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector', 'Admin'])))
                            <a @click="subMenu = 'Matematicas'; selectedOption = 'Matematicas'"
                                class="flex items-center px-6 mt-1 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                                href="#">
                                <span class="mx-3">• Matemáticas</span>
                            </a>
                        @endif
                        <div x-show="subMenu" class="ml-6">
                            

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '4') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico', 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math4') }}"
                                        class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 4°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '5') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math5') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 5°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '6') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math6') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 6°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '7') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math7') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">•
                                    Grado 7°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '8') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math8') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 8°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '9') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math9') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 9°</a>
                                @endif

                                @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '10') || 
                                (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math') ||
                                auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                    <a x-show="selectedOption === 'Matematicas'" href="{{ route('form.create.math10') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado
                                    10°</a>
                                @endif     
                            
                        </div>

                        @if(auth()->check() && (auth()->user()->hasRole(['Docente']) && auth()->user()->asignature == 'spanish' || auth()->user()->hasRole('Aspirante') || auth()->user()->hasRole(['CoordinadorAcademico' , 'CoordinadorConvivencia', 'Rector', 'Admin'])))
                            <a @click="subMenu = 'Español'; selectedOption = 'Español'"
                                class="flex items-center px-6 mt-1 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                                href="#">
                                <span class="mx-3">• Lengua Castellana</span>
                            </a>
                        @endif 
                        <div x-show="subMenu" class="ml-6">

                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '4') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish4') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 4°</a>
                            @endif 

                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '5') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish5') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 5°</a>
                            @endif 

                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '6') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish6') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 6°</a>
                            @endif 

                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '7') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish7') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 7°</a>
                            @endif 
                        
                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '8') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                                <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish8') }}"
                                    class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 8°</a>
                            @endif 

                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '9') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                            <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish9') }}"
                                class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado 9°</a>
                            @endif 
                                
                            @if((auth()->user()->hasRole('Aspirante') && auth()->user()->degree == '10') || 
                            (auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') ||
                            auth()->user()->hasRole(['Admin', 'Rector', 'CoordinadorAcademico' , 'CoordinadorConvivencia']))
                            <a x-show="selectedOption === 'Español'" href="{{ route('form.create.spanish10') }}"
                                class="px-10 block text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">• Grado
                                10°</a>
                            @endif 
                                
                        </div>

                        @if(auth()->check() && (auth()->user()->hasRole(['Docente']) && auth()->user()->asignature == 'english' || auth()->user()->hasRole('Aspirante') || auth()->user()->hasRole(['CoordinadorAcademico' , 'CoordinadorConvivencia', 'Rector', 'Admin'])))
                            <a class="flex items-center px-6 mt-1 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100"
                            href="{{ route('ventana.english') }}">
                                <span class="mx-3">• Inglés</span>
                            </a>
                        @endif
                    </div>
                </div>

            @if(auth()->check() && auth()->user()->hasRole(['Admin', 'Docente', 'CoordinadorAcademico' , 'CoordinadorConvivencia', 'Psicoorientador', 'Secretaria', 'Rector']))
                @can('mostrar_conceptos')
                <a href="{{ route('mostrar_conceptos') }}"
                    class="flex items-center px-6 py-1 mt-4 text-gray-600 hover:bg-[#3A8BC0] hover:text-gray-100">
                    <svg class="w-7 h-7" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M9 5H7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2V7a2 2 0 0 0 -2 -2h-2" />
                        <rect x="9" y="3" width="6" height="4" rx="2" />
                        <line x1="9" y1="12" x2="9.01" y2="12" />
                        <line x1="13" y1="12" x2="15" y2="12" />
                        <line x1="9" y1="16" x2="9.01" y2="16" />
                        <line x1="13" y1="16" x2="15" y2="16" />
                    </svg>


                    <span class="mx-2">Conceptos</span>
                </a>
                @endcan
            @endif

            </nav>
        </div>
        <div class="flex flex-col flex-1 overflow-hidden">
            <header class="flex items-center justify-between px-6 py-1 bg-white border-b-4 border-yellow-600">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true" class="text-gray-500 focus:outline-none lg:hidden">
                        <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M4 6H20M4 12H20M4 18H11" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg>
                    </button>
                </div>

                <div class="flex items-center">

                @php
                    $asignaturas = [
                        'english' => 'Inglés',
                        'math' => 'Matemáticas',
                        'spanish' => 'Español'
                    ];
                @endphp

                @if(auth()->user()->hasRole(['Admin', 'Docente', 'Aspirante','CoordinadorAcademico' , 'CoordinadorConvivencia' ,'Psicoorientador','Secretaria','Rector']))
                    <h1 class="mx-6">Rol: <b class="text-gray-700">{{ implode(', ', Auth::user()->roles->pluck('name')->toArray()) }}</b></h1>
                @elseif(auth()->user()->hasRole('Docente'))
                    <h1 class="mx-6">Rol: <b class="text-gray-700">{{ implode(', ', Auth::user()->roles->pluck('name')->toArray()) }}</b> - <b class="text-gray-700">{{ $asignaturas[auth()->user()->asignature] }}</b></h1>
                @endif


                    <!-- ------------------------------ -->
                    <!-- ------------------------------ -->
                    <!-- Icono del perfil -->
                    <!-- ------------------------------ -->
                    <!-- ------------------------------ -->

                    <div x-data="{ dropdownOpen: false }" class="relative">
                        <button @click="dropdownOpen = !dropdownOpen"
                            class="relative block w-12 h-12 overflow-hidden rounded-full shadow focus:outline-none">
                            @if (Auth::check() && Auth::user()->image)
                            <img name='image' id="image" src="{{ asset(Auth::user()->image) }}" alt="Foto del perfil"
                                class="h-12 w-12 text-black">
                            @else
                            <svg class="h-12 w-12 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            @endif
                        </button>

                        <div x-show="dropdownOpen" @click="dropdownOpen = false"
                            class="fixed inset-0 z-10 w-full h-full" style="display: none;"></div>

                        <div x-show="dropdownOpen"
                            class="absolute right-0 z-10 w-48 mt-2 overflow-hidden bg-white rounded-md shadow-xl"
                            style="display: none;">

                            <a href="{{ route('index_profile') }}"
                                class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-[#3A8BC0]  hover:text-gray-100">
                                <svg class="6-5 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span class="mx-3">Mi Perfil</span>
                            </a>

                            <a href="{{ route('logout') }}"
                                class="flex items-center px-6 py-2 mt-4 text-gray-600 hover:bg-[#3A8BC0]  hover:text-gray-100">
                                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                </svg>
                                <span class="mx-3">Cerrar Sesión</span>
                            </a>

                        </div>
                    </div>
                </div>
            </header>
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200">
                <div class="container px-6 py-8 mx-auto">
                    <h3 class="text-3xl font-medium text-gray-700"> @yield('sub_title') </h3>
                    @yield('content_dashboard')

                </div>
        </div>
        </main>
    </div>
</div>
</div>


@endsection
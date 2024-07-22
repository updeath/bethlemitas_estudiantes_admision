@extends('home.homePage')

@section('title', 'Resultados')

@section('sub_title', 'Conceptos y Observaciones')

@section('content_dashboard')

    <div class="flex flex-col lg:flex-row items-center justify-between m-2">
        <div class="relative">
            <form action="{{ route('mostrar_conceptos') }}" method="GET" class="flex items-center">
                <input type="search" name="search" class="bg-purple-white shadow rounded-l border-0 p-2" placeholder="Buscar">
                <button type="submit"
                    class="bg-purple-white hover:bg-purple-200 text-purple-lighter font-bold py-2 px-4 rounded-r">
                    <svg version="1.1" class="h-4 text-dark" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 52.966 52.966"
                        style="enable-background:new 0 0 52.966 52.966;" xml:space="preserve">
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
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Nombre Completo</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Grado </th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Promedio - Matematicas</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Promedio - Lengua Castellana</th>

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Docente Español</th>

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Docente Matemáticas</th>

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Docente Ingles</th>

                            <th
                                class="px-7 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Psicoorientador(a)</th> 

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Coordinador(a) Academico</th>

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Coordinador(a) Convivencia</th>

                            <th
                                class="px-12 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                Concepto Rector(a)</th>

                            <th
                                class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase border-b border-gray-200 bg-gray-50">
                                PDF</th>


                        </tr>
                    </thead>

                    <tbody class="bg-white">
                        @if (isset($promedios['admin_data']))
                            @foreach ($promedios['admin_data'] as $user)
                                <tr>
                                    <!-- Nombre -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if (isset($user['name']))
                                            {{ $user['name'] }} {{$user['last_name']}}
                                        @endif
                                    </td>

                                    <!-- Grado -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($user['degree']))
                                            {{ $user['degree'] }}
                                        @endif
                                    </td>

                                    <!-- Promedio Matematicas -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($user['mathCuarto']))
                                            {{ $user['mathCuarto'] }}
                                        @elseif (isset($user['mathQuinto']))
                                            {{ $user['mathQuinto'] }}
                                        @elseif (isset($user['mathSexto']))
                                            {{ $user['mathSexto'] }}
                                        @elseif (isset($user['mathSeptimo']))
                                            {{ $user['mathSeptimo'] }}
                                        @elseif (isset($user['mathOctavo']))
                                            {{ $user['mathOctavo'] }}
                                        @elseif (isset($user['mathNoveno']))
                                            {{ $user['mathNoveno'] }}
                                        @elseif (isset($user['mathDecimo']))
                                            {{ $user['mathDecimo'] }}
                                        @endif
                                    </td>

                                    <!-- Promedio Lengua Castellana -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($user['spanishCuarto']))
                                            {{ $user['spanishCuarto'] }}
                                        @elseif (isset($user['spanishQuinto']))
                                            {{ $user['spanishQuinto'] }}
                                        @elseif (isset($user['spanishSexto']))
                                            {{ $user['spanishSexto'] }}
                                        @elseif (isset($user['spanishSeptimo']))
                                            {{ $user['spanishSeptimo'] }}
                                        @elseif (isset($user['spanishOctavo']))
                                            {{ $user['spanishOctavo'] }}
                                        @elseif (isset($user['spanishNoveno']))
                                            {{ $user['spanishNoveno'] }}
                                        @elseif (isset($user['spanishDecimo']))
                                            {{ $user['spanishDecimo'] }}
                                        @endif
                                    </td>

                                



                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionSpanish'])
                                            @if ($user['observacionPredeterminadaPresenteSpanish'])

                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish')
                                                    @can('save.observationsDocenteSpanish')
                                                    <button
                                                        onclick="openObservationModalSpanish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif


                                            @else
                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish')
                                                    @can('save.observationsDocenteSpanish')
                                                    <button
                                                        onclick="openObservationModalSpanish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    @endcan
                                                @endif

                                                @php
                                                    // Array de observaciones
                                                    $observacionSpanish = $user['observacionSpanish'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionSpanishLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionSpanish);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasSpanish = implode('<br> <br>- ', $observacionSpanishLimpia);
                                                @endphp
                                                <!-- Aca se esta haciendo una condicion pra que en caso tal de que el rol sea Rector pueda editar las observaciones-->
                                                @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'spanish') )
                                                    <button
                                                        onclick="openObservationModalVisualizarSpanish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasSpanish }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarSpanish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasSpanish }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                                <!-- <button
                                                    onclick="openDigitalAsignature()"
                                                    class="bg-green-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                    <i class="fas fa-pen text-sm"></i>
                                                </button> -->
                                            @endif
                                        @else
                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'spanish')
                                                    @can('save.observationsDocenteSpanish')
                                                    <button
                                                        onclick="openObservationModalSpanish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif
                                        @endif
                                    </td>
                               

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionMath'])
                                            @if ($user['observacionPredeterminadaPresenteMath'])
                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math')
                                                    @can('save.observationsDocenteMath')
                                                    <button
                                                        onclick="openObservationModalMath('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif
                                            @else
                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math')
                                                    @can('save.observationsDocenteMath')
                                                    <button
                                                        onclick="openObservationModalMath('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    @endcan
                                                @endif

                                                @php
                                                    // Array de observaciones
                                                    $observacionMath = $user['observacionMath'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionMathLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionMath);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasMath = implode('<br> <br>- ', $observacionMathLimpia);
                                                @endphp

                                                @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'math'))
                                                    <button
                                                        onclick="openObservationModalVisualizarMath('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasMath }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarMath('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasMath }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else
                                            @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'math')
                                                @can('save.observationsDocenteMath')
                                                <button
                                                    onclick="openObservationModalMath('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                @endcan
                                            @endif
                                        @endif
                                    </td>
                                    
                                
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionEnglish'])
                                            @if ($user['observacionPredeterminadaPresenteEnglish'])
                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'english')
                                                    @can('save.observationsDocenteEnglish')
                                                    <button
                                                        onclick="openObservationModalEnglish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif
                                            @else

                                                @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'english')
                                                    @can('save.observationsDocenteEnglish')
                                                    <button
                                                        onclick="openObservationModalEnglish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    @endcan
                                                @endif

                                                @php
                                                    // Array de observaciones
                                                    $observacionEnglish = $user['observacionEnglish'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionEnglishLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionEnglish);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasEnglish = implode('<br> <br>- ', $observacionEnglishLimpia);
                                                @endphp

                                                @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'english'))
                                                    <button
                                                        onclick="openObservationModalVisualizarEnglish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasEnglish }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarEnglish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasEnglish }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            @if(auth()->check() && auth()->user()->hasRole('Docente') && auth()->user()->asignature == 'english')
                                                @can('save.observationsDocenteEnglish')
                                                <button
                                                    onclick="openObservationModalEnglish('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                @endcan
                                            @endif
                                        @endif
                                    </td>
                                    
                                



                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionPsicoorientador'])
                                            @if ($user['observacionPredeterminadaPresentePsicoorientador'])
                                                @if(auth()->check() && auth()->user()->hasRole('Psicoorientador'))
                                                    @can('save.observationsPsicoorientador')
                                                    <button
                                                        onclick="openObservationModalPsicoorientador('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif

                                            @else
                                                @if(auth()->check() && auth()->user()->hasRole('Psicoorientador'))
                                                    @can('save.observationsPsicoorientador')
                                                    <button
                                                        onclick="openObservationModalPsicoorientador('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    @endcan
                                                @endif

                                                @php
                                                    // Array de observaciones
                                                    $observacionPsicoorientador = $user['observacionPsicoorientador'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionPsicoorientadorLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionPsicoorientador);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasPsicoorientador = implode('<br> <br>- ', $observacionPsicoorientadorLimpia);
                                                @endphp

                                                @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('Psicoorientador'))
                                                    <button
                                                        onclick="openObservationModalVisualizarPsicoorientador('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasPsicoorientador }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarPsicoorientador('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasPsicoorientador }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            @if(auth()->check() && auth()->user()->hasRole('Psicoorientador'))
                                                @can('save.observationsPsicoorientador')
                                                <button
                                                    onclick="openObservationModalPsicoorientador('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                @endcan
                                            @endif

                                        @endif
                                    </td>



                                    
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionAcademico'])
                                            @if ($user['observacionPredeterminadaPresenteAcademico'])
                                                @if(auth()->check() && auth()->user()->hasRole('CoordinadorAcademico'))
                                                    
                                                    <button
                                                        onclick="openObservationModalAcademico('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    
                                                @endif
                                            @else

                                                @if(auth()->check() && auth()->user()->hasRole('CoordinadorAcademico'))
                                                        
                                                    <button
                                                        onclick="openObservationModalAcademico('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                        
                                                @endif
                                                @php
                                                    // Array de observaciones
                                                    $observacionAcademico = $user['observacionAcademico'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionAcademicoLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionAcademico);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasAcademico = implode('<br> <br>- ', $observacionAcademicoLimpia);
                                                @endphp

                                                @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('CoordinadorAcademico'))
                                                    <button
                                                        onclick="openObservationModalVisualizarAcademico('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasAcademico }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarAcademico('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasAcademico }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            @if(auth()->check() && auth()->user()->hasRole('CoordinadorAcademico'))
                                                
                                                <button
                                                    onclick="openObservationModalAcademico('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                
                                            @endif
                                        @endif
                                    </td>



                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionConvivencia'])
                                            @if ($user['observacionPredeterminadaPresenteConvivencia'])
                                                @if(auth()->check() && auth()->user()->hasRole('CoordinadorConvivencia'))
                                                    
                                                    <button
                                                        onclick="openObservationModalConvivencia('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    
                                                @endif
                                            @else

                                                @if(auth()->check() && auth()->user()->hasRole('CoordinadorConvivencia'))
                                                        
                                                    <button
                                                        onclick="openObservationModalConvivencia('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    
                                                @endif
                                                @php
                                                    // Array de observaciones
                                                    $observacionConvivencia = $user['observacionConvivencia'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionConvivenciaLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionConvivencia);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasConvivencia = implode('<br> <br>- ', $observacionConvivenciaLimpia);
                                                @endphp
                                                @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('CoordinadorConvivencia'))
                                                    <button
                                                        onclick="openObservationModalVisualizarConvivencia('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasConvivencia }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else 
                                                    <button
                                                        onclick="openObservationModalVisualizarConvivencia('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasConvivencia }}', false)"
                                                        class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            @if(auth()->check() && auth()->user()->hasRole('CoordinadorConvivencia'))
                                                
                                                <button
                                                    onclick="openObservationModalConvivencia('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                
                                            @endif
                                        @endif
                                    </td>

                                    


                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if ($user['observacionRector'])
                                            @if ($user['observacionPredeterminadaPresenteRector'])
                                                @if(auth()->check() && auth()->user()->hasRole('Rector'))
                                                    @can('save.observationsRector')
                                                    <button
                                                        onclick="openObservationModalRector('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                        <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                    </button>
                                                    @endcan
                                                @endif
                                            @else

                                                @if(auth()->check() && auth()->user()->hasRole('Rector'))
                                                    @can('save.observationsRector')
                                                    <button
                                                        onclick="openObservationModalRector('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-plus text-sm"></i>
                                                    </button>
                                                    @endcan
                                                @endif
                                                @php
                                                    // Array de observaciones
                                                    $observacionRector = $user['observacionRector'];

                                                    // Limpiar los saltos de línea de cada observación
                                                    $observacionRectorLimpia = array_map(function($obs) {
                                                        return preg_replace("/[\r\n]/", '<br>\n', $obs);
                                                    }, $observacionRector);

                                                    // Concatenar las observaciones con '<br> <br> - ' como separador
                                                    $observacionesConcatenadasRector = implode('<br> <br>- ', $observacionRectorLimpia);
                                                @endphp
                                                @if (Auth::user()->hasRole('Rector'))
                                                    <button
                                                        onclick="openObservationModalVisualizarRector('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasRector }}', true)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @else
                                                    <button
                                                        onclick="openObservationModalVisualizarRector('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}', '{{ $observacionesConcatenadasRector }}', false)"
                                                        class="bg-gray-500 hover:bg-green-700 text-white font-bold py-1 px-2 rounded transition duration-300 ml-2">
                                                        <i class="fas fa-eye text-sm"></i>
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            @if(auth()->check() && auth()->user()->hasRole('Rector'))
                                                @can('save.observationsRector')
                                                <button
                                                    onclick="openObservationModalRector('{{ $user['name'] }}', {{ $user['id'] }}, '{{ $user['last_name'] }}')"
                                                    class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded transition duration-300">
                                                    <i class="fas fa-plus mr-2"></i> Añadir Observación
                                                </button>
                                                @endcan
                                            @endif
                                        @endif
                                    </td>

                                    

                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        <a href="{{ route('generate.pdf.observations', ['userId' => $user['id']]) }}"
                                            class="inline-flex items-center px-4 py-2 bg-red-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-600 active:bg-red-700 focus:outline-none focus:border-red-800 focus:ring focus:ring-red-300 disabled:opacity-25 transition duration-300">
                                            <i class="fas fa-download mr-2"></i> Descargar PDF
                                        </a>
                                    </td>

                                    

                                </tr>
                            @endforeach
                        @elseif(isset($promedios['student_data']))
                            @foreach ($promedios['student_data'] as $student)
                                <tr>
                                    <!-- Nombre -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                        @if (isset($student['name']))
                                            {{ $student['name'] }}
                                        @endif
                                    </td>

                                    <!-- Grado -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($student['degree']))
                                            {{ $student['degree'] }}
                                        @endif
                                    </td>

                                    <!-- Promedio Matematicas -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($student['mathCuarto']))
                                            {{ $student['mathCuarto'] }}
                                        @elseif (isset($student['mathQuinto']))
                                            {{ $student['mathQuinto'] }}
                                        @elseif (isset($student['mathSexto']))
                                            {{ $student['mathSexto'] }}
                                        @elseif (isset($student['mathSeptimo']))
                                            {{ $student['mathSeptimo'] }}
                                        @elseif (isset($student['mathOctavo']))
                                            {{ $student['mathOctavo'] }}
                                        @elseif (isset($student['mathNoveno']))
                                            {{ $student['mathNoveno'] }}
                                        @elseif (isset($student['mathDecimo']))
                                            {{ $student['mathDecimo'] }}
                                        @endif
                                    </td>

                                    <!-- Promedio Lengua Castellana -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-center">
                                        @if (isset($student['spanishCuarto']))
                                            {{ $student['spanishCuarto'] }}
                                        @elseif (isset($student['spanishQuinto']))
                                            {{ $student['spanishQuinto'] }}
                                        @elseif (isset($student['spanishSexto']))
                                            {{ $student['spanishSexto'] }}
                                        @elseif (isset($student['spanishSeptimo']))
                                            {{ $student['spanishSeptimo'] }}
                                        @elseif (isset($student['spanishOctavo']))
                                            {{ $student['spanishOctavo'] }}
                                        @elseif (isset($student['spanishNoveno']))
                                            {{ $student['spanishNoveno'] }}
                                        @elseif (isset($student['spanishDecimo']))
                                            {{ $student['spanishDecimo'] }}
                                        @endif
                                    </td>

                                    <!-- Promedio Inglés -->
                                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 ">
                                        @if (isset($student['englishCuarto']))
                                            <span>Listening:</span> {{ $student['englishCuarto'] }} <br>
                                            <span>Reading and Writing:</span> {{ $student['englishCuartoPart2'] }}
                                        @elseif (isset($student['englishQuinto']))
                                            <span>Listening:</span> {{ $student['englishQuinto'] }} <br>
                                            <span>Reading and Writing:</span> {{ $student['englishQuintoPart2'] }}
                                        @elseif (isset($student['englishSexto']))
                                            <span>Listening:</span> {{ $student['englishSexto'] }} <br>
                                            <span>Reading and Writing:</span> {{ $student['englishSextoPart2'] }}
                                        @elseif (isset($student['englishSeptimo']))
                                            <span>Listening:</span> {{ $student['englishSeptimo'] }} <br>
                                            <span>Reading and Writing:</span> {{ $student['englishSeptimoPart2'] }}
                                        @elseif (isset($student['englishOctavo']))
                                            <span>Listening:</span> {{ $student['englishOctavo'] }} <br>
                                            <span>Reading and Writing:</span> {{ $student['englishOctavoPart2'] }}
                                        @elseif (isset($student['englishNoveno']))
                                            <span>Grammar:</span> {{ $student['englishNoveno'] }} <br>
                                            <span>Listening:</span> {{ $student['englishNoveno2'] }} <br>
                                            <span>Reading:</span> {{ $student['englishNoveno3'] }}
                                        @elseif (isset($student['englishDecimo']))
                                            <span>Grammar:</span> {{ $student['englishDecimo'] }} <br>
                                            <span>Listening:</span> {{ $student['englishDecimo2'] }} <br>
                                            <span>Reading:</span> {{ $student['englishDecimo3'] }}
                                        @elseif (isset($student['englishOnce']))
                                            <span>Grammar:</span> {{ $student['englishOnce'] }} <br>
                                            <span>Listening:</span> {{ $student['englishOnce2'] }} <br>
                                            <span>Reading:</span> {{ $student['englishOnce3'] }}
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Aca esta la seccion para agregar las observaciones de la signatura de español-->

    <div id="observationModalSpanish" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerSpanish">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormSpanish"
                            action="{{ route('save.observationsDocenteSpanish', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputSpanish" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalSpanish()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Aca esta la seccion para visualizar las observaciones de la signatura de español-->

    <div id="observationModalVisualizarSpanish" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationSpanish">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif
                    <!-- modal para abrir formulario o div de español segun el rol -->
                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'spanish'))
                            <form id="observationFormSpanishRector" action="{{ route('update.concepSpanishForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputSpanish" name="userId" value="">
                                <textarea id="observationsTextareaSpanish" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerSpanish">
                            </div>
                        @endif
                    @endif
                    <!-- ************************************************************************************  -->
                    <button onclick="closeObservationModalVisualizarSpanish()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    {{-- Comcepto de Docente de Matematicas --}}
    <div id="observationModalMath" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerMath">{{ $user['name'] }} {{ $user['last_name'] }}</span></p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormMath"
                            action="{{ route('save.observationsDocenteMath', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputMath" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalMath()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="observationModalVisualizarMath" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationMath">{{ $user['name'] }} {{ $user['last_name'] }}</span></p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif
                    <!-- modal para abrir formulario o div de matematicas segun el rol -->
                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'math'))
                            <form id="observationFormMathRector" action="{{ route('update.concepMathForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputMath" name="userId" value="">
                                <textarea id="observationsTextareaMath" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerMath">
                            </div>
                        @endif
                    @endif
                    <!-- **************************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarMath()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Concepto de Docente de Ingles --}}
    <div id="observationModalEnglish" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerEnglish">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormEnglish"
                            action="{{ route('save.observationsDocenteEnglish', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputEnglish" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalEnglish()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="observationModalVisualizarEnglish" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationEnglish">{{ $user['name'] }} {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- modal para abrir formulario o div de Ingles segun el rol -->

                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || (Auth::user()->hasRole('Docente') && auth()->user()->asignature == 'english'))
                            <form id="observationFormEnglishRector" action="{{ route('update.concepEnglishForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputEnglish" name="userId" value="">
                                <textarea id="observationsTextareaEnglish" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerEnglish">
                            </div>
                        @endif
                    @endif
                    
                    <!-- *************************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarEnglish()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>





    {{-- Concepto de Psicoorientador --}}
    <div id="observationModalPsicoorientador" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerPsicoorientador">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormPsicoorientador"
                            action="{{ route('save.observationsPsicoorientador', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputPsicoorientador" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalPsicoorientador()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div id="observationModalVisualizarPsicoorientador" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationPsicoorientador">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- modal para abrir formulario o div de Psicoorientador segun el rol -->

                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('Psicoorientador'))
                            <form id="observationFormPsicoorientadorRector" action="{{ route('update.concepPsicoorientadorForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputPsicoorientador" name="userId" value="">
                                <textarea id="observationsTextareaPsicoorientador" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerPsicoorientador">
                            </div>
                        @endif
                    @endif

                    <!-- *********************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarPsicoorientador()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- Concepto del Academico --}}
    <div id="observationModalAcademico" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerAcademico">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormAcademico"
                            action="{{ route('save.observationsAcademico', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputAcademico" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalAcademico()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="observationModalVisualizarAcademico" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationAcademico">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- modal para abrir formulario o div de Academico segun el rol -->

                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('CoordinadorAcademico'))
                            <form id="observationFormAcademicoRector" action="{{ route('update.concepAcademicoForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputAcademico" name="userId" value="">
                                <textarea id="observationsTextareaAcademico" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerAcademico">
                            </div>
                        @endif
                    @endif

                    <!-- *********************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarAcademico()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    {{-- Concepto del Convivencia --}}
    <div id="observationModalConvivencia" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerConvivencia">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormConvivencia"
                            action="{{ route('save.observationsConvivencia', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputConvivencia" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalConvivencia()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="observationModalVisualizarConvivencia" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationConvivencia">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- modal para abrir formulario o div de Convivencia segun el rol -->

                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector') || Auth::user()->hasRole('CoordinadorConvivencia'))
                            <form id="observationFormConvivenciaRector" action="{{ route('update.concepConvivenciaForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputConvivencia" name="userId" value="">
                                <textarea id="observationsTextareaConvivencia" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerConvivencia">
                            </div>
                        @endif
                    @endif

                    <!-- *********************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarConvivencia()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>



    {{-- Concepto del Rector --}}
    <div id="observationModalRector" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Añadir Observación</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="studentNameContainerRector">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- Textarea para la observación -->
                    @if (isset($user['name']))
                        <form id="observationFormRector"
                            action="{{ route('save.observationsRector', ['userId' => ':userId']) }}"
                            method="POST">
                            @csrf
                            <input type="hidden" id="userIdInputRector" name="userId" value="">
                            <div class="mb-4">
                                <label for="observationTextarea"
                                    class="block text-sm font-medium text-gray-700">Observación:</label>
                                    <textarea id="observationTextarea" name="observation" rows="3" 
                                    class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>
                            </div>
                            <button type="submit"
                                class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-white bg-blue-500 border border-transparent rounded-md hover:bg-blue-600 focus:outline-none focus:border-blue-700 focus:ring focus:ring-blue-200 active:bg-blue-700 transition duration-300">
                                Guardar Observación
                            </button>
                        </form>
                    @endif

                    <button onclick="closeObservationModalRector()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>


    <div id="observationModalVisualizarRector" class="fixed inset-0 overflow-y-auto hidden">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- Overlay semitransparente -->
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>

            <!-- Contenido del modal -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div
                class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:w-full sm:max-w-lg">
                <!-- Contenido del modal aquí -->
                <div class="bg-gray-50 px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-900 mb-4">Observaciones</h3>

                    @if (isset($user['name']))
                        <p class="text-sm text-gray-500 mb-4">Nombre del aspirante: <span
                                id="visualizarObservationRector">{{ $user['name'] }}
                                {{ $user['last_name'] }}</span>
                        </p>
                    @else
                        <p class="text-sm text-gray-500 mb-4">Usuario no encontrado</p>
                    @endif

                    <!-- modal para abrir formulario o div de Rector segun el rol -->

                    @if (isset($user['name']))
                        @if (Auth::user()->hasRole('Rector'))
                            <form id="observationFormRRector" action="{{ route('update.concepRForRector', ['userId' => ':userId']) }}"
                            method="POST">
                                @method('PUT')
                                @csrf
                                <input type="hidden" id="userIdInputRRector" name="userId" value="">
                                <textarea id="observationsTextareaRRector" name="observationRector" class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition duration-300 block w-full h-[200px]"></textarea>

                                <button class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2" type="submit">Editar observacion</button>
                            </form>
                        @else
                            <div id="observationsContainerRector">
                            </div>
                        @endif
                    @endif

                    <!-- *********************************************************************************** -->

                    <button onclick="closeObservationModalVisualizarRector()"
                        class="inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 active:bg-gray-100 transition duration-300 mr-2">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- ************Aqui va la seccion de la firma digital **************** -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
    <script>
        function openObservationModalSpanish(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputSpanish').value = userId;
            var formAction = document.getElementById('observationFormSpanish').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormSpanish').action = formAction;

            document.getElementById('studentNameContainerSpanish').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalSpanish').classList.remove('hidden');
        }

        function closeObservationModalSpanish() {
            document.getElementById('observationModalSpanish').classList.add('hidden');
        }
    </script>

    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarSpanish(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarSpanish').classList.remove('hidden');
                document.getElementById('userIdInputSpanish').value = userId;
                let formAction = document.getElementById('observationFormSpanishRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormSpanishRector').action = formAction;
                document.getElementById('visualizarObservationSpanish').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaSpanish').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarSpanish').classList.remove('hidden');
                document.getElementById('visualizarObservationSpanish').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerSpanish').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarSpanish() {
            document.getElementById('observationModalVisualizarSpanish').classList.add('hidden');
            window.location.reload();
        }
    </script>

    {{-- Conceppto de Docente Matematicas --}}

    <script>
        function openObservationModalMath(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputMath').value = userId;
            var formAction = document.getElementById('observationFormMath').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormMath').action = formAction;

            document.getElementById('studentNameContainerMath').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalMath').classList.remove('hidden');
        }

        function closeObservationModalMath() {
            document.getElementById('observationModalMath').classList.add('hidden');
        }
    </script>
    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarMath(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarMath').classList.remove('hidden');
                document.getElementById('userIdInputMath').value = userId;
                let formAction = document.getElementById('observationFormMathRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormMathRector').action = formAction;
                document.getElementById('visualizarObservationMath').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaMath').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarMath').classList.remove('hidden');
                document.getElementById('visualizarObservationMath').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerMath').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarMath() {
            document.getElementById('observationModalVisualizarMath').classList.add('hidden');
            window.location.reload();
        }
    </script>

    
    {{-- Concepto de Docente Ingles --}}
    <script>
        function openObservationModalEnglish(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputEnglish').value = userId;
            var formAction = document.getElementById('observationFormEnglish').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormEnglish').action = formAction;

            document.getElementById('studentNameContainerEnglish').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalEnglish').classList.remove('hidden');
        }

        function closeObservationModalEnglish() {
            document.getElementById('observationModalEnglish').classList.add('hidden');
        }
    </script>

    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarEnglish(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarEnglish').classList.remove('hidden');
                document.getElementById('userIdInputEnglish').value = userId;
                let formAction = document.getElementById('observationFormEnglishRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormEnglishRector').action = formAction;
                document.getElementById('visualizarObservationEnglish').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaEnglish').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarEnglish').classList.remove('hidden');
                document.getElementById('visualizarObservationEnglish').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerEnglish').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarEnglish() {
            document.getElementById('observationModalVisualizarEnglish').classList.add('hidden');
            window.location.reload();
        }
    </script>

    {{-- Concepto del Psicoorientador --}}
    <script>
        function openObservationModalPsicoorientador(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputPsicoorientador').value = userId;
            var formAction = document.getElementById('observationFormPsicoorientador').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormPsicoorientador').action = formAction;

            document.getElementById('studentNameContainerPsicoorientador').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalPsicoorientador').classList.remove('hidden');
        }

        function closeObservationModalPsicoorientador() {
            document.getElementById('observationModalPsicoorientador').classList.add('hidden');
        }
    </script>

    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarPsicoorientador(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarPsicoorientador').classList.remove('hidden');
                document.getElementById('userIdInputPsicoorientador').value = userId;
                let formAction = document.getElementById('observationFormPsicoorientadorRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormPsicoorientadorRector').action = formAction;
                document.getElementById('visualizarObservationPsicoorientador').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaPsicoorientador').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarPsicoorientador').classList.remove('hidden');
                document.getElementById('visualizarObservationPsicoorientador').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerPsicoorientador').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarPsicoorientador() {
            document.getElementById('observationModalVisualizarPsicoorientador').classList.add('hidden');
            window.location.reload();
        }
    </script>


    {{-- Concepto de Academico --}}
    <script>
        function openObservationModalAcademico(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputAcademico').value = userId;
            var formAction = document.getElementById('observationFormAcademico').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormAcademico').action = formAction;

            document.getElementById('studentNameContainerAcademico').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalAcademico').classList.remove('hidden');
        }

        function closeObservationModalAcademico() {
            document.getElementById('observationModalAcademico').classList.add('hidden');
        }
    </script>

    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarAcademico(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarAcademico').classList.remove('hidden');
                document.getElementById('userIdInputAcademico').value = userId;
                let formAction = document.getElementById('observationFormAcademicoRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormAcademicoRector').action = formAction;
                document.getElementById('visualizarObservationAcademico').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaAcademico').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarAcademico').classList.remove('hidden');
                document.getElementById('visualizarObservationAcademico').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerAcademico').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarAcademico() {
            document.getElementById('observationModalVisualizarAcademico').classList.add('hidden');
            window.location.reload();
        }
    </script>


    {{-- Concepto de Convivencia --}}
    <script>
        function openObservationModalConvivencia(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputConvivencia').value = userId;
            var formAction = document.getElementById('observationFormConvivencia').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormConvivencia').action = formAction;

            document.getElementById('studentNameContainerConvivencia').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalConvivencia').classList.remove('hidden');
        }

        function closeObservationModalConvivencia() {
            document.getElementById('observationModalConvivencia').classList.add('hidden');
        }
    </script>

    <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
    <script> 
        function openObservationModalVisualizarConvivencia(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarConvivencia').classList.remove('hidden');
                document.getElementById('userIdInputConvivencia').value = userId;
                let formAction = document.getElementById('observationFormConvivenciaRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormConvivenciaRector').action = formAction;
                document.getElementById('visualizarObservationConvivencia').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaConvivencia').value = formattedObservations;
            }else {
                document.getElementById('observationModalVisualizarConvivencia').classList.remove('hidden');
                document.getElementById('visualizarObservationConvivencia').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerConvivencia').innerHTML = observations;
            }
            
        }

        function closeObservationModalVisualizarConvivencia() {
            document.getElementById('observationModalVisualizarConvivencia').classList.add('hidden');
            window.location.reload();
        }
    </script>


    {{-- Concepto de Rector --}}
    <script>
        function openObservationModalRector(name, userId, last_name) {
            // Resto del código para abrir el modal
            document.getElementById('userIdInputRector').value = userId;
            var formAction = document.getElementById('observationFormRector').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormRector').action = formAction;

            document.getElementById('studentNameContainerRector').innerText = name + ' ' + last_name;

            // Mostrar el modal
            document.getElementById('observationModalRector').classList.remove('hidden');
        }

        function closeObservationModalRector() {
            document.getElementById('observationModalRector').classList.add('hidden');
        }
    </script>

    <!-- espacio apartado para realizar la firma digital-->
    <!-- <script>
        let section_signature = document.querySelector('.section_signature');
        
        function openDigitalAsignature(userId) {
            document.getElementById('userIdInputSpanish').value = userId;
            var formAction = document.getElementById('observationFormSpanish').action;
            formAction = formAction.replace(':userId', userId);
            document.getElementById('observationFormSpanish').action = formAction;
            section_signature.classList.remove('hidden')
        }

        function closeDigitalAsignature() {
            section_signature.classList.add('hidden');
        }

    </script> -->

 <!-- Este script me muestra y oculta las observaciones, segun el rol me mostrara la observacion en un div o en un Textarea, el docente lo vea en un div y el recto en un textarea para poder editarlo******-->
 <script> 
        function openObservationModalVisualizarRector(name, userId, last_name, observations, isRector) {

            if (isRector) {
                document.getElementById('observationModalVisualizarRector').classList.remove('hidden');
                document.getElementById('userIdInputRRector').value = userId;
                let formAction = document.getElementById('observationFormRRector').action;
                formAction = formAction.replace(':userId', userId);
                document.getElementById('observationFormRRector').action = formAction;
                document.getElementById('visualizarObservationRector').innerText = name + ' ' + last_name;
                const formattedObservations = observations.replace(/<br\s*\/?>/gi, '');
                document.getElementById('observationsTextareaRRector').value = formattedObservations;    
            }else {
                document.getElementById('observationModalVisualizarRector').classList.remove('hidden');
                document.getElementById('visualizarObservationRector').innerText = name + ' ' + last_name;
                document.getElementById('observationsContainerRector').innerHTML = observations;
            }
    }

        function closeObservationModalVisualizarRector() {
            document.getElementById('observationModalVisualizarRector').classList.add('hidden');
            window.location.reload();
        }
    </script>

@endsection


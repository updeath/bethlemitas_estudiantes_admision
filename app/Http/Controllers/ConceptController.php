<?php

namespace App\Http\Controllers;

use App\Models\English9_10_11;
use Illuminate\Http\Request;
use App\Models\EnglishCuartoQuinto;
use App\Models\EnglishCQpart2;
use App\Models\EnglishQuintoSexto;
use App\Models\EnglishQuintoSextoPart2;
use App\Models\EnglishSeptimoOctavo;
use App\Models\EnglishSeptimoOctavoParte2;
use App\Models\English9_10_11Part2;
use App\Models\English9_10_11_Part3;
use App\Models\MathDecimo;
use App\Models\MathCuarto;
use App\Models\MathQuinto;
use App\Models\MathSexto;
use App\Models\MathSeptimo;
use App\Models\MathOctavo;
use App\Models\MathNoveno;
use App\Models\SpanishCuarto;
use App\Models\SpanishQuinto;
use App\Models\SpanishSexto;
use App\Models\SpanishSeptimo;
use App\Models\SpanishOctavo;
use App\Models\SpanishNoveno;
use App\Models\SpanishDecimo;
use App\Models\User;
use App\Models\Concept;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class ConceptController extends Controller
{
    public function index_concept(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $auth_user = Auth::user();
        $promedios = [];

        //obtener los grados del usuario logueado
        $loadDegrees = $auth_user->load_degrees ? explode('-', str_replace('/', '-', $auth_user->load_degrees)) : [];

        if ($auth_user->hasRole(['Admin', 'Docente','Psicoorientador','CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector','Secretaria'])) {
            $usersQuery = User::whereHas('roles', function ($query) {
                $query->where('name', 'Aspirante');
            });

            //aplicar filtro de busqueda si existe
            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $usersQuery->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('degree', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
                });
            }

            if ($auth_user->number_documment == 1112782480) {
                $usersQuery->whereIn('degree', ['1°', '2°']);
            }
            //aplicar el filtro de grados para el usuario logueado
            elseif (!empty($loadDegrees)) {
                $usersQuery->where(function ($q) use ($loadDegrees) {
                    foreach ($loadDegrees as $degree) {
                        $q->orWhere('degree', 'LIKE', '%' . $degree . '%');
                    } 
                });
            }

            $users = $usersQuery->get();

            foreach ($users as $user) {
                $promedios['admin_data'][$user->id]['name'] = $user->name;
                $promedios['admin_data'][$user->id]['last_name'] = $user->last_name;
                $promedios['admin_data'][$user->id]['degree'] = $user->degree;
                $promedios['admin_data'][$user->id]['id'] = $user->id;
                $promedios['admin_data'][$user->id]['number_documment'] = $user->number_documment;

                // Accede al concepto a través de la relación definida en el modelo User
                $observaciones = $user->getObservations();

                $promedios['admin_data'][$user->id]['observacionSpanish'] = $observaciones['spanish'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteSpanish'] = $observaciones['spanish'] === null;

                $promedios['admin_data'][$user->id]['observacionMath'] = $observaciones['math'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteMath'] = $observaciones['math'] === null;

                $promedios['admin_data'][$user->id]['observacionEnglish'] = $observaciones['english'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteEnglish'] = $observaciones['english'] === null;

                $promedios['admin_data'][$user->id]['observacionPsicoorientador'] = $observaciones['psicoorientador'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresentePsicoorientador'] = $observaciones['psicoorientador'] === null;

                $promedios['admin_data'][$user->id]['observacionRector'] = $observaciones['rector'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteRector'] = $observaciones['rector'] === null;

                $promedios['admin_data'][$user->id]['observacionAcademico'] = $observaciones['academico'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteAcademico'] = $observaciones['academico'] === null;

                $promedios['admin_data'][$user->id]['observacionConvivencia'] = $observaciones['convivencia'];
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteConvivencia'] = $observaciones['convivencia'] === null;

                if ($user->degree == '4°') {
                    $promedios['admin_data'][$user->id]['mathCuarto'] = MathCuarto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['spanishCuarto'] = SpanishCuarto::where('user_id', $user->id)->pluck('averageSpanishPC')->first();
                    $promedios['admin_data'][$user->id]['englishCuarto'] = EnglishCuartoQuinto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishCuartoPart2'] = EnglishCQpart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '3°') {
                    $promedios['admin_data'][$user->id]['englishTercero'] = EnglishCuartoQuinto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishTerceroPart2'] = EnglishCQpart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '5°') {
                    $promedios['admin_data'][$user->id]['mathQuinto'] = MathQuinto::where('user_id', $user->id)->pluck('averagePQ')->first();
                    $promedios['admin_data'][$user->id]['spanishQuinto'] = SpanishQuinto::where('user_id', $user->id)->pluck('averageSpanishPQ')->first();
                    $promedios['admin_data'][$user->id]['englishQuinto'] = EnglishQuintoSexto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishQuintoPart2'] = EnglishQuintoSextoPart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '6°') {
                    $promedios['admin_data'][$user->id]['mathSexto'] = MathSexto::where('user_id', $user->id)->pluck('averagePSX')->first();
                    $promedios['admin_data'][$user->id]['spanishSexto'] = SpanishSexto::where('user_id', $user->id)->pluck('averageSpanishPSX')->first();
                    $promedios['admin_data'][$user->id]['englishSexto'] = EnglishQuintoSexto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishSextoPart2'] = EnglishQuintoSextoPart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '7°') {
                    $promedios['admin_data'][$user->id]['mathSeptimo'] = MathSeptimo::where('user_id', $user->id)->pluck('averagePS')->first();
                    $promedios['admin_data'][$user->id]['spanishSeptimo'] = SpanishSeptimo::where('user_id', $user->id)->pluck('averageSpanishPS')->first();
                    $promedios['admin_data'][$user->id]['englishSeptimo'] = EnglishSeptimoOctavo::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishSeptimoPart2'] = EnglishSeptimoOctavoParte2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '8°') {
                    $promedios['admin_data'][$user->id]['mathOctavo'] = MathOctavo::where('user_id', $user->id)->pluck('averagePO')->first();
                    $promedios['admin_data'][$user->id]['spanishOctavo'] = SpanishOctavo::where('user_id', $user->id)->pluck('averageSpanishPO')->first();
                    $promedios['admin_data'][$user->id]['englishOctavo'] = EnglishSeptimoOctavo::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishOctavoPart2'] = EnglishSeptimoOctavoParte2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '9°') {
                    $promedios['admin_data'][$user->id]['mathNoveno'] = MathNoveno::where('user_id', $user->id)->pluck('averagePNO')->first();
                    $promedios['admin_data'][$user->id]['spanishNoveno'] = SpanishNoveno::where('user_id', $user->id)->pluck('averageSpanishPNO')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno'] = English9_10_11::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno2'] = English9_10_11Part2::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno3'] = English9_10_11_Part3::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == '10°') {
                    $promedios['admin_data'][$user->id]['mathDecimo'] = MathDecimo::where('user_id', $user->id)->pluck('averagePD')->first();
                    $promedios['admin_data'][$user->id]['spanishDecimo'] = SpanishDecimo::where('user_id', $user->id)->pluck('averageSpanishPD')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo'] = English9_10_11::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo2'] = English9_10_11Part2::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo3'] = English9_10_11_Part3::where('user_id', $user->id)->pluck('average')->first();
                }

            }
        }

        // Log::info('valor de promedios: ' . json_encode($promedios));
        // return response()->json(['promediosss' => $promedios]);

        return view("home.concept.index", ['promedios' => $promedios, 'auth_user' => $auth_user, 'users' => $users]);
    }

    public function saveObservationDocenteSpanish(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        $request->validate([
            'observation' => 'required', //Asegura de que la observacion no este vacia
        ]);
        $ConceptDocenteSpanish = Concept::where('user_id', $userId)->first(); //busca al los datos del estudiantes en la tabla concepts

        if ($ConceptDocenteSpanish) {
            $existingObservation = $ConceptDocenteSpanish->ObservationDocenteSpanish; //encuentra la observacion exitente

            if ($existingObservation === 'Sin Observacion') { //si la observacion es 'Sin observacion' la borra y deja el campo en blanco
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) { //en esta linea de codigo me aseguro de que el campo no este vacio
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation'); //aca se crea la nueva observacion haciedo una condicional, si existe una observacion lo que hace es que concatena la observacion existente con la nueva que se añadio separadas por un '-', sino solo se añade la observacion nueva

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptDocenteSpanish->ObservationDocenteSpanish = $newObservation; //en el campo observationDocenteSpanish de la tabla concepts se esta agregando la nueva observacion
                $ConceptDocenteSpanish->save(); //se gaurda la observacion en la BD
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de español
    public function saveUpdateObservationsDocenteSpanish(Request $request, $userId)
    {
        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationSpanish = $request->input('observationRector');
        $observationSpanishLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationSpanish);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationDocenteSpanish = $observationSpanishLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }
    public function saveObservationDocenteMath(Request $request, $userId)
    {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        $request->validate([
            'observation' => 'required|string',
        ]);
        $ConceptDocenteMath = Concept::where('user_id', $userId)->first();

        if ($ConceptDocenteMath) {
            $existingObservation = $ConceptDocenteMath->ObservationDocenteMath;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptDocenteMath->ObservationDocenteMath = $newObservation;
                $ConceptDocenteMath->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de matematicas
    public function saveUpdateObservationsDocenteMath(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationMath = $request->input('observationRector');
        $observationMathLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationMath);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationDocenteMath = $observationMathLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }

    public function saveObservationDocenteEnglish(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptDocenteEngish = Concept::where('user_id', $userId)->first();

        if ($ConceptDocenteEngish) {
            $existingObservation = $ConceptDocenteEngish->ObservationDocenteEnglish;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptDocenteEngish->ObservationDocenteEnglish = $newObservation;
                $ConceptDocenteEngish->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de ingles
    public function saveUpdateObservationsDocenteEnglish(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationEnglish = $request->input('observationRector');
        $observationEnglishLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationEnglish);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationDocenteEnglish = $observationEnglishLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }

    public function saveObservationPsicoorientador(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptPsicoorientador = Concept::where('user_id', $userId)->first();

        if ($ConceptPsicoorientador) {
            $existingObservation = $ConceptPsicoorientador->ObservationPsicoorientador;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptPsicoorientador->ObservationPsicoorientador = $newObservation;
                $ConceptPsicoorientador->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de Psicoorientador
    public function saveUpdateObservationsDocentePsicoorientador(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationPsicoorientador = $request->input('observationRector');
        $observationPsicoorientadorLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationPsicoorientador);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationPsicoorientador = $observationPsicoorientadorLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }

    public function saveObservationRector(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptRector = Concept::where('user_id', $userId)->first();

        if ($ConceptRector) {
            $existingObservation = $ConceptRector->ObservationRector;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptRector->ObservationRector = $newObservation;
                $ConceptRector->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de Psicoorientador
    public function saveUpdateObservationsDocenteRector(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationRector = $request->input('observationRector');
        $observationRectorLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationRector);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationRector = $observationRectorLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }

    public function saveObservationAcademico(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptAcademico = Concept::where('user_id', $userId)->first();

        if ($ConceptAcademico) {
            $existingObservation = $ConceptAcademico->ObservationAcademico;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptAcademico->ObservationAcademico = $newObservation;
                $ConceptAcademico->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de Academico
    public function saveUpdateObservationsDocenteAcademico(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationAcademico = $request->input('observationRector');
        $observationAcademicoLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationAcademico);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationAcademico = $observationAcademicoLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }


    public function saveObservationConvivencia(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptConvivencia = Concept::where('user_id', $userId)->first();

        if ($ConceptConvivencia) {
            $existingObservation = $ConceptConvivencia->ObservationConvivencia;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . '<br><br>' . '- ' . $request->input('observation') : $request->input('observation');

                $newObservation = preg_replace("/[\r\n]+/", "\n\n", $newObservation);

                $ConceptConvivencia->ObservationConvivencia = $newObservation;
                $ConceptConvivencia->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    //Crear el controlador para editar las observaciones de Academico
    public function saveUpdateObservationsDocenteConvivencia(Request $request, $userId)
    {
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $request->validate([
            'observationRector' => 'required',
        ]);

        // Limpia los saltos de línea múltiples en la observación del rector
        $observationConvivencia = $request->input('observationRector');
        $observationConvivenciaLimpia = preg_replace("/[\r\n]+/", "\n\n", $observationConvivencia);

        // Busca el concepto del docente por id del usuario
        $conceptEdit = Concept::where('user_id', $userId)->first();

        // Si se encuentra el concepto del docente hace lo siguiente
        if ($conceptEdit) {
            // Actualiza la observación con la nueva observación del request
            $conceptEdit->ObservationConvivencia = $observationConvivenciaLimpia;
            // Guarda los cambios en la base de datos
            $conceptEdit->save();

            // Establece encabezados para borrar la caché
            return redirect()->back()
                ->with('success', 'Observación editada correctamente')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        } else {
            // Si no se encuentra el concepto del docente, retornar un error
            return redirect()->back()
                ->with('error', 'Concepto no encontrado.')
                ->withHeaders([
                    'Cache-Control' => 'no-store, no-cache, must-revalidate, max-age=0',
                    'Pragma' => 'no-cache',
                    'Expires' => 'Wed, 11 Jan 1984 05:00:00 GMT',
                ]);
        }
    }

    // ----------------------------- Controlador de la firma digital español decimo ----------------------------------
    public function saveDigitalAsignatureSpanishDecimo(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_spanish_decimo' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }
    
    // ----------------------------- Controlador de la firma digital matematicas decimo ----------------------------------
     public function saveDigitalAsignatureMathDecimo(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_math_decimo' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }

    // ----------------------------- Controlador de la firma digital ingles decimo ----------------------------------
    public function saveDigitalAsignatureEnglishDecimo(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_english_decimo' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }

    // ----------------------------- Controlador de la firma digital psicoorientador ----------------------------------
    public function saveDigitalAsignaturePsicoorientador(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_psicoorientador' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }

    // ----------------------------- Controlador de la firma digital coordinador academico ----------------------------------
    public function saveDigitalAsignatureCoordinadorAcademico(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_coordinador_academico' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }

    // ----------------------------- Controlador de la firma digital coordinador convivencia ----------------------------------
    public function saveDigitalAsignatureCoordinadorConvivencia(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_coordinador_convivencia' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }

    // ----------------------------- Controlador de la firma digital rector ----------------------------------
    public function saveDigitalAsignatureRector(Request $request) {
        $userId = $request->input('userId');
        
        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Puedes realizar más validaciones y procesamiento aquí si es necesario
        // // Retornar una respuesta JSON con el userId
        // return response()->json(['userId' => $userId]);

       $userId = intval($userId);
       if (!is_int($userId)) {
           return redirect()->back()->with('error', 'Usuario no encontador');
       }
        
       //validacion de la perticion
       $request->validate([
           'digital' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
       ]);

       //guardar la imagen en la base de datos
       if ($request->hasFile('digital')) {
           $image = $request->file('digital');
           $imageName = time(). '.' .$image->getClientOriginalExtension();

           //mover la imagen a la carpeta deseada (public/img/digital)
           $image->move(public_path('img/digital'), $imageName);

           //crear o actualizar el registro en la tabla concepts
           $concept = Concept::updateOrCreate(
               ['user_id' => $userId],
               ['signature_image_rector' => $imageName]
           );
           return redirect()->back()->with('success', 'Firma subida correctamente');
       }
       return redirect()->back()->with('error', 'Error al subir la firma');
    }
}
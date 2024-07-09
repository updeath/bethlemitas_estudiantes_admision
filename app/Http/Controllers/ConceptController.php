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

class ConceptController extends Controller
{
    public function index_concept(Request $request)
    {


        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $auth_user = Auth::user();
        $promedios = [];

        if ($auth_user->hasRole(['Admin', 'Docente','Psicoorientador','CoordinadorAcademico', 'CoordinadorConvivencia', 'Rector','Secretaria'])) {
            $usersQuery = User::whereHas('roles', function ($query) {
                $query->where('name', 'Aspirante');
            });

            if ($request->has('search')) {
                $searchTerm = $request->input('search');
                $usersQuery->where(function ($q) use ($searchTerm) {
                    $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                        ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
                });
            }

            $users = $usersQuery->get();

            foreach ($users as $user) {
                $promedios['admin_data'][$user->id]['name'] = $user->name;
                $promedios['admin_data'][$user->id]['last_name'] = $user->last_name;
                $promedios['admin_data'][$user->id]['degree'] = $user->degree;
                $promedios['admin_data'][$user->id]['id'] = $user->id;

                // Accede al concepto a través de la relación definida en el modelo User

                $ConceptObservationSpanish = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationMath = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationEnglish = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationPsicoorientador = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationRector = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationAcademico = $user->concept()->firstOrCreate(['user_id' => $user->id]);
                $ConceptObservationConvivencia = $user->concept()->firstOrCreate(['user_id' => $user->id]);


                $observacionSpanish = $ConceptObservationSpanish && $ConceptObservationSpanish->ObservationDocenteSpanish !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationSpanish->ObservationDocenteSpanish)
                    : null;

                $observacionMath = $ConceptObservationMath && $ConceptObservationMath->ObservationDocenteMath !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationMath->ObservationDocenteMath)
                    : null;

                $observacionEnglish = $ConceptObservationEnglish && $ConceptObservationEnglish->ObservationDocenteEnglish !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationEnglish->ObservationDocenteEnglish)
                    : null;

                $observacionPsicoorientador = $ConceptObservationPsicoorientador && $ConceptObservationPsicoorientador->ObservationPsicoorientador !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationPsicoorientador->ObservationPsicoorientador)
                    : null;

                $observacionRector = $ConceptObservationRector && $ConceptObservationRector->ObservationRector !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationRector->ObservationRector)
                    : null;
                    
                $observacionAcademico = $ConceptObservationAcademico && $ConceptObservationAcademico->ObservationAcademico !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationAcademico->ObservationAcademico)
                    : null;

                $observacionConvivencia = $ConceptObservationConvivencia && $ConceptObservationConvivencia->ObservationConvivencia !== 'Sin Observacion'
                    ? explode(' - ', $ConceptObservationConvivencia->ObservationConvivencia)
                    : null;

                $observacionPredeterminadaPresenteSpanish = $observacionSpanish === null;
                $observacionPredeterminadaPresenteMath = $observacionMath === null;
                $observacionPredeterminadaPresenteEnglish = $observacionEnglish === null;
                $observacionPredeterminadaPresentePsicoorientador = $observacionPsicoorientador === null;
                $observacionPredeterminadaPresenteRector = $observacionRector === null;
                $observacionPredeterminadaPresenteAcademico = $observacionAcademico === null;
                $observacionPredeterminadaPresenteConvivencia = $observacionConvivencia === null;

                $promedios['admin_data'][$user->id]['observacionSpanish'] = $observacionSpanish;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteSpanish'] = $observacionPredeterminadaPresenteSpanish;

                $promedios['admin_data'][$user->id]['observacionMath'] = $observacionMath;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteMath'] = $observacionPredeterminadaPresenteMath;

                $promedios['admin_data'][$user->id]['observacionEnglish'] = $observacionEnglish;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteEnglish'] = $observacionPredeterminadaPresenteEnglish;

                $promedios['admin_data'][$user->id]['observacionPsicoorientador'] = $observacionPsicoorientador;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresentePsicoorientador'] = $observacionPredeterminadaPresentePsicoorientador;

                $promedios['admin_data'][$user->id]['observacionRector'] = $observacionRector;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteRector'] = $observacionPredeterminadaPresenteRector;

                $promedios['admin_data'][$user->id]['observacionAcademico'] = $observacionAcademico;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteAcademico'] = $observacionPredeterminadaPresenteAcademico;

                $promedios['admin_data'][$user->id]['observacionConvivencia'] = $observacionConvivencia;
                $promedios['admin_data'][$user->id]['observacionPredeterminadaPresenteConvivencia'] = $observacionPredeterminadaPresenteConvivencia;

                if ($user->degree == 4) {
                    $promedios['admin_data'][$user->id]['mathCuarto'] = MathCuarto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['spanishCuarto'] = SpanishCuarto::where('user_id', $user->id)->pluck('averageSpanishPC')->first();
                    $promedios['admin_data'][$user->id]['englishCuarto'] = EnglishCuartoQuinto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishCuartoPart2'] = EnglishCQpart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 3) {
                    $promedios['admin_data'][$user->id]['englishTercero'] = EnglishCuartoQuinto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishTerceroPart2'] = EnglishCQpart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 5) {
                    $promedios['admin_data'][$user->id]['mathQuinto'] = MathQuinto::where('user_id', $user->id)->pluck('averagePQ')->first();
                    $promedios['admin_data'][$user->id]['spanishQuinto'] = SpanishQuinto::where('user_id', $user->id)->pluck('averageSpanishPQ')->first();
                    $promedios['admin_data'][$user->id]['englishQuinto'] = EnglishQuintoSexto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishQuintoPart2'] = EnglishQuintoSextoPart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 6) {
                    $promedios['admin_data'][$user->id]['mathSexto'] = MathSexto::where('user_id', $user->id)->pluck('averagePSX')->first();
                    $promedios['admin_data'][$user->id]['spanishSexto'] = SpanishSexto::where('user_id', $user->id)->pluck('averageSpanishPSX')->first();
                    $promedios['admin_data'][$user->id]['englishSexto'] = EnglishQuintoSexto::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishSextoPart2'] = EnglishQuintoSextoPart2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 7) {
                    $promedios['admin_data'][$user->id]['mathSeptimo'] = MathSeptimo::where('user_id', $user->id)->pluck('averagePS')->first();
                    $promedios['admin_data'][$user->id]['spanishSeptimo'] = SpanishSeptimo::where('user_id', $user->id)->pluck('averageSpanishPS')->first();
                    $promedios['admin_data'][$user->id]['englishSeptimo'] = EnglishSeptimoOctavo::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishSeptimoPart2'] = EnglishSeptimoOctavoParte2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 8) {
                    $promedios['admin_data'][$user->id]['mathOctavo'] = MathOctavo::where('user_id', $user->id)->pluck('averagePO')->first();
                    $promedios['admin_data'][$user->id]['spanishOctavo'] = SpanishOctavo::where('user_id', $user->id)->pluck('averageSpanishPO')->first();
                    $promedios['admin_data'][$user->id]['englishOctavo'] = EnglishSeptimoOctavo::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishOctavoPart2'] = EnglishSeptimoOctavoParte2::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 9) {
                    $promedios['admin_data'][$user->id]['mathNoveno'] = MathNoveno::where('user_id', $user->id)->pluck('averagePNO')->first();
                    $promedios['admin_data'][$user->id]['spanishNoveno'] = SpanishNoveno::where('user_id', $user->id)->pluck('averageSpanishPNO')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno'] = English9_10_11::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno2'] = English9_10_11Part2::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishNoveno3'] = English9_10_11_Part3::where('user_id', $user->id)->pluck('average')->first();
                } elseif ($user->degree == 10) {
                    $promedios['admin_data'][$user->id]['mathDecimo'] = MathDecimo::where('user_id', $user->id)->pluck('averagePD')->first();
                    $promedios['admin_data'][$user->id]['spanishDecimo'] = SpanishDecimo::where('user_id', $user->id)->pluck('averageSpanishPD')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo'] = English9_10_11::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo2'] = English9_10_11Part2::where('user_id', $user->id)->pluck('average')->first();
                    $promedios['admin_data'][$user->id]['englishDecimo3'] = English9_10_11_Part3::where('user_id', $user->id)->pluck('average')->first();
                }

            }
        }

        return view("home.concept.index", ['promedios' => $promedios, 'auth_user' => $auth_user, 'users' => $users]);
    }

    public function saveObservationDocenteSpanish(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptDocenteSpanish = Concept::where('user_id', $userId)->first();

        if ($ConceptDocenteSpanish) {
            $existingObservation = $ConceptDocenteSpanish->ObservationDocenteSpanish;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptDocenteSpanish->ObservationDocenteSpanish = $newObservation;
                $ConceptDocenteSpanish->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationDocenteMath(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $ConceptDocenteMath = Concept::where('user_id', $userId)->first();

        if ($ConceptDocenteMath) {
            $existingObservation = $ConceptDocenteMath->ObservationDocenteMath;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptDocenteMath->ObservationDocenteMath = $newObservation;
                $ConceptDocenteMath->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
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
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptDocenteEngish->ObservationDocenteEnglish = $newObservation;
                $ConceptDocenteEngish->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
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
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptPsicoorientador->ObservationPsicoorientador = $newObservation;
                $ConceptPsicoorientador->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
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
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptRector->ObservationRector = $newObservation;
                $ConceptRector->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
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
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptAcademico->ObservationAcademico = $newObservation;
                $ConceptAcademico->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
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
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $ConceptConvivencia->ObservationConvivencia = $newObservation;
                $ConceptConvivencia->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveDigitalAsignature(Request $request, $userId) {
        $userId = intval($userId);
        if (!is_int($userId)) {
            return view('home.concept.user.profile');
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
                ['signature_image' => $imageName]
            );
            return redirect()->back()->with('success', 'Firma subida correctamente');
        }
        return redirect()->back()->with('error', 'Error al subir la firma');
    }

}
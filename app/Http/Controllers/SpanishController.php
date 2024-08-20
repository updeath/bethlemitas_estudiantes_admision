<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpanishCuarto;
use App\Models\SpanishQuinto;
use App\Models\SpanishSexto;
use App\Models\SpanishSeptimo;
use App\Models\SpanishOctavo;
use App\Models\SpanishNoveno;
use App\Models\SpanishDecimo;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Spanish\Spanish4Export;
use App\Exports\Spanish\spanish5Export;
use App\Exports\Spanish\spanish6Export;
use App\Exports\Spanish\spanish7Export;
use App\Exports\Spanish\spanish8Export;
use App\Exports\Spanish\spanish9Export;
use App\Exports\Spanish\spanish10Export;
use Illuminate\Support\Facades\Log;

class SpanishController extends Controller
{
    public function index_spanish4()
    {
        $user = Auth::user();
        $hasRecord = SpanishCuarto::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish4", compact('hasRecord'));
    }


    public function index_spanish5()
    {
        $user = Auth::user();
        $hasRecord = SpanishQuinto::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish5", compact('hasRecord'));
    }

    public function index_spanish6()
    {
        $user = Auth::user();
        $hasRecord = SpanishSexto::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish6", compact('hasRecord'));
    }

    public function index_spanish7()
    {
        $user = Auth::user();
        $hasRecord = SpanishSeptimo::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish7", compact('hasRecord'));
    }

    public function index_spanish8()
    {
        $user = Auth::user();
        $hasRecord = SpanishOctavo::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish8", compact('hasRecord'));
    }

    public function index_spanish9()
    {
        $user = Auth::user();
        $hasRecord = SpanishNoveno::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish9", compact('hasRecord'));
    }

    public function index_spanish10()
    {
        $user = Auth::user();
        $hasRecord = SpanishDecimo::where('user_id', $user->id)->exists();
        return view("home.forms.spanish.spanish10", compact('hasRecord'));
    }
    public function index_spanishFragment($userId)
    {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);

        $user = User::find($userId);
        $promedioData = [];
        
            // Check if a record exists for the user
            $userSpanishCuarto = SpanishDecimo::where('user_id', $user->id)->first();

            if ($userSpanishCuarto) {
                $sumaPuntos = SpanishDecimo::where('user_id', $user->id)
                    ->sum('fragment_numberPD1')
                    + SpanishDecimo::where('user_id', $user->id)
                        ->sum('fragment_numberPD2')
                    + SpanishDecimo::where('user_id', $user->id)
                        ->sum('fragment_numberPD3')
                    + SpanishDecimo::where('user_id', $user->id)
                        ->sum('fragment_numberPD4');

                // Update the 'spanishPD4' field in the 'spanish_cuarto' table
                $userSpanishCuarto->spanishPD4 = $sumaPuntos;
                $userSpanishCuarto->save();

                $comment4_1 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_1');
                $comment4_2 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_2');
                $comment4_3 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_3');
                $comment4_4 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_4');

                $promedioData[] = [
                    'user' => $user,
                    'comment4_1' => $comment4_1,
                    'comment4_2' => $comment4_2,
                    'comment4_3' => $comment4_3,
                    'comment4_4' => $comment4_4,
                ];
            } else {
                // Handle the case where no record is found for the user
                // You may choose to skip the user or perform some other action
            }
        
        return view("home.table.spanish.fragment4", compact('promedioData'));
    }

    /*************************************************** Tabla Math 4 *********************************************** */
    public function table_spanish4(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishCuarto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $SpanishCuarto = SpanishCuarto::where('user_id', $user->id)->first();
            if ($SpanishCuarto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $SpanishCuarto->spanishPC1,
                    $SpanishCuarto->spanishPC2,
                    $SpanishCuarto->spanishPC3,
                    $SpanishCuarto->spanishPC4,
                    $SpanishCuarto->spanishPC5,
                    $SpanishCuarto->spanishPC6,
                    $SpanishCuarto->spanishPC7,
                    $SpanishCuarto->spanishPC8,
                    $SpanishCuarto->spanishPC9,
                    $SpanishCuarto->spanishPC10,
                ];
    
                $respuestasCorrectas = [
                    'D. Infinitivo',
                    'C. El pastel no saldría bien porque la mantequilla no se batió.',
                    'B. Sazonador',
                    'C. Yerbabuena, agua y un poco de azúcar',
                    'B. Verbos',
                    'Opción 3', 
                    'B. El libro ´Vida sana de las mascotas´, porque trata diversos aspectos sobre la crianza y cuidado de las mascotas',  // 
                    null,  // respuesta 8 no es una comparación de string
                    'B. Un cuento, porque narra una historia sobre un árbol',
                    'C. Pedir el favor y agradecer nos ayuda a conseguir lo que queremos.',
                ];
    
                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }
    
                $cantidadDeVeces = SpanishCuarto::where('user_id', $user->id)->count();
    
                $SpanishCuarto->update([
                    'averageSpanishPC' => $sumaPromedio,
                    'attemptsSpanishPC' => $cantidadDeVeces,
                    'correctSpanishPC' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPC' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPC' => $cantidadRespuestasRegulares,
                ]);
    
                $comment8 = SpanishCuarto::where('user_id', $user->id)->value('commentPC8');
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment8' => $comment8,
                ];
            }
        }
        return view("home.table.spanish.spanish4", compact('promedioData', 'users'));
    }

    // public function table_spanish4Table2(Request $request)
    // {
    //     $estudianteRole = Role::where('name', 'Aspirante')->first();
    //     $query = $estudianteRole->users()
    //         ->whereHas('spanishCuarto');

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
    //         });
    //     }

    //     // Paginar los resultados con un máximo de 3 elementos por página
    //     $users = $query->paginate(10);

    //     $promedioData = [];
    //     foreach ($users as $user) {
    //         $spanishCuarto = SpanishCuarto::where('user_id', $user->id)->first();

    //         // Verificar si la observación es "Sin Observación"
    //         $observacion = $spanishCuarto && $spanishCuarto->ObservationspanishPC !== 'Sin Observacion'
    //             ? explode(' - ', $spanishCuarto->ObservationspanishPC)
    //             : null;

    //         $observacion2 = $spanishCuarto && $spanishCuarto->ObservationspanishPC2 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishCuarto->ObservationspanishPC2)
    //             : null;

    //         $observacion3 = $spanishCuarto && $spanishCuarto->ObservationspanishPC3 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishCuarto->ObservationspanishPC3)
    //             : null;

    //         $observacion4 = $spanishCuarto && $spanishCuarto->ObservationspanishPC4 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishCuarto->ObservationspanishPC4)
    //             : null;

    //         $observacionPredeterminadaPresente = $observacion === null;
    //         $observacionPredeterminadaPresente2 = $observacion2 === null;
    //         $observacionPredeterminadaPresente3 = $observacion3 === null;
    //         $observacionPredeterminadaPresente4 = $observacion4 === null;

    //         $promedioData[] = [
    //             'id' => $user->id, // Agregar el ID del usuario al array
    //             'user' => $user,
    //             'observacion' => $observacion,
    //             'observacion2' => $observacion2,
    //             'observacion3' => $observacion3,
    //             'observacion4' => $observacion4,
    //             'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
    //             'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
    //             'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
    //             'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
    //         ];

    //     }
    //     return view("home.table.spanish.table2.spanish4", compact('promedioData', 'users'));
    // }
    /*********************************** TABLA MATH5 ********************************************************** */
    public function table_spanish5(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishQuinto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $SpanishQuinto = SpanishQuinto::where('user_id', $user->id)->first();
            if ($SpanishQuinto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $SpanishQuinto->spanishPQ1,
                    $SpanishQuinto->spanishPQ2,
                    $SpanishQuinto->spanishPQ3,
                    $SpanishQuinto->spanishPQ4,
                    $SpanishQuinto->spanishPQ5,
                    $SpanishQuinto->spanishPQ6,
                    $SpanishQuinto->spanishPQ7,
                    $SpanishQuinto->spanishPQ8,
                    $SpanishQuinto->spanishPQ9,
                    $SpanishQuinto->spanishPQ10,
                ];
    
                $respuestasCorrectas = [
                    'C. El nombre de la escuela',
                    'B. Guión de diálogo',
                    'C. Una casa humilde en el bosque',
                    'A. Estados Unidos',
                    'B. Cuentos y diccionarios',
                    null,  // respuesta 6 no es una comparación de string
                    null,  // respuesta 7 no es una comparación de string
                    'A. Enormes',
                    'D. Celebración de eventos.',
                    null,  // respuesta 10 no es una comparación de string
                ];
    
                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }
    
                $cantidadDeVeces = SpanishQuinto::where('user_id', $user->id)->count();
    
                $SpanishQuinto->update([
                    'averageSpanishPQ' => $sumaPromedio,
                    'attemptsSpanishPQ' => $cantidadDeVeces,
                    'correctSpanishPQ' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPQ' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPQ' => $cantidadRespuestasRegulares,
                ]);
    
                $comment6 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ6');
                $comment7 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ7');
                $comment10 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ10');
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment6' => $comment6,
                    'comment7' => $comment7,
                    'comment10' => $comment10,
                ];
            }

        }
        return view("home.table.spanish.spanish5", compact('promedioData', 'users'));
    }

    // public function table_spanish5Table2(Request $request)
    // {
    //     $estudianteRole = Role::where('name', 'Aspirante')->first();
    //     $query = $estudianteRole->users()
    //         ->whereHas('spanishQuinto');

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
    //         });
    //     }

    //     // Paginar los resultados con un máximo de 3 elementos por página
    //     $users = $query->paginate(10);

    //     $promedioData = [];
    //     foreach ($users as $user) {

    //         $spanishQuinto = SpanishQuinto::where('user_id', $user->id)->first();

    //         // Verificar si la observación es "Sin Observación"
    //         $observacion = $spanishQuinto && $spanishQuinto->ObservationspanishPQ !== 'Sin Observacion'
    //             ? explode(' - ', $spanishQuinto->ObservationspanishPQ)
    //             : null;

    //         $observacion2 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ2 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishQuinto->ObservationspanishPQ2)
    //             : null;

    //         $observacion3 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ3 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishQuinto->ObservationspanishPQ3)
    //             : null;

    //         $observacion4 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ4 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishQuinto->ObservationspanishPQ4)
    //             : null;

    //         $observacionPredeterminadaPresente = $observacion === null;
    //         $observacionPredeterminadaPresente2 = $observacion2 === null;
    //         $observacionPredeterminadaPresente3 = $observacion3 === null;
    //         $observacionPredeterminadaPresente4 = $observacion4 === null;

    //         $promedioData[] = [
    //             'id' => $user->id, // Agregar el ID del usuario al array
    //             'user' => $user,
    //             'observacion' => $observacion,
    //             'observacion2' => $observacion2,
    //             'observacion3' => $observacion3,
    //             'observacion4' => $observacion4,
    //             'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
    //             'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
    //             'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
    //             'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
    //         ];

    //     }
    //     return view("home.table.spanish.table2.spanish5", compact('promedioData', 'users'));
    // }

    /******************************************** TABLA 6 *************************************************** */

    public function table_spanish6(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishSexto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $SpanishSexto = SpanishSexto::where('user_id', $user->id)->first();
            if ($SpanishSexto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $SpanishSexto->spanishPSX1,
                    $SpanishSexto->spanishPSX2,
                    $SpanishSexto->spanishPSX3,
                    $SpanishSexto->spanishPSX4,
                    $SpanishSexto->spanishPSX5,
                    $SpanishSexto->spanishPSX6,
                    $SpanishSexto->spanishPSX7,
                    $SpanishSexto->spanishPSX8,
                    $SpanishSexto->spanishPSX9,
                    $SpanishSexto->spanishPSX10,
                ];
    
                $respuestasCorrectas = [
                    null,  // respuesta 1 no es una comparación de string
                    null,  // respuesta 2 no es una comparación de string
                    null,  // respuesta 3 no es una comparación de string
                    null,  // respuesta 4 no es una comparación de string
                    null,  // respuesta 5 no es una comparación de string
                    null,  // respuesta 6 no es una comparación de string
                    'A. Información interpretativa de hechos o acontecimientos.',
                    'B. El género periodístico.',
                    'C. Narra hechos ocurridos en forma cronológica.',
                    'B. Se dejan a un lado los aspectos emocionales de las partes y el eje gira en torno a los sucesos que se desea mencionar.',
                ];
    
                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }
    
                $cantidadDeVeces = SpanishSexto::where('user_id', $user->id)->count();
    
                $SpanishSexto->update([
                    'averageSpanishPSX' => $sumaPromedio,
                    'attemptsSpanishPSX' => $cantidadDeVeces,
                    'correctSpanishPSX' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPSX' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPSX' => $cantidadRespuestasRegulares,
                ]);
    
                $comment1 = SpanishSexto::where('user_id', $user->id)->value('commentPSX1');
                $comment2 = SpanishSexto::where('user_id', $user->id)->value('commentPSX2');
                $comment3 = SpanishSexto::where('user_id', $user->id)->value('commentPSX3');
                $comment4 = SpanishSexto::where('user_id', $user->id)->value('commentPSX4');
                $comment5 = SpanishSexto::where('user_id', $user->id)->value('commentPSX5');
                $comment6 = SpanishSexto::where('user_id', $user->id)->value('commentPSX6');
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment1' => $comment1,
                    'comment2' => $comment2,
                    'comment3' => $comment3,
                    'comment4' => $comment4,
                    'comment5' => $comment5,
                    'comment6' => $comment6,
                ];
            }
        }
        return view("home.table.spanish.spanish6", compact('promedioData', 'users'));
    }

    // public function table_spanish6Table2(Request $request)
    // {
    //     $estudianteRole = Role::where('name', 'Aspirante')->first();
    //     $query = $estudianteRole->users()
    //         ->whereHas('spanishSexto');

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
    //         });
    //     }

    //     // Paginar los resultados con un máximo de 3 elementos por página
    //     $users = $query->paginate(10);

    //     $promedioData = [];
    //     foreach ($users as $user) {

    //         $spanishSexto = SpanishSexto::where('user_id', $user->id)->first();

    //         // Verificar si la observación es "Sin Observación"
    //         $observacion = $spanishSexto && $spanishSexto->ObservationspanishPSX !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSexto->ObservationspanishPSX)
    //             : null;

    //         $observacion2 = $spanishSexto && $spanishSexto->ObservationspanishPSX2 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSexto->ObservationspanishPSX2)
    //             : null;

    //         $observacion3 = $spanishSexto && $spanishSexto->ObservationspanishPSX3 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSexto->ObservationspanishPSX3)
    //             : null;

    //         $observacion4 = $spanishSexto && $spanishSexto->ObservationspanishPSX4 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSexto->ObservationspanishPSX4)
    //             : null;

    //         $observacionPredeterminadaPresente = $observacion === null;
    //         $observacionPredeterminadaPresente2 = $observacion2 === null;
    //         $observacionPredeterminadaPresente3 = $observacion3 === null;
    //         $observacionPredeterminadaPresente4 = $observacion4 === null;

    //         $promedioData[] = [
    //             'id' => $user->id, // Agregar el ID del usuario al array
    //             'user' => $user,
    //             'observacion' => $observacion,
    //             'observacion2' => $observacion2,
    //             'observacion3' => $observacion3,
    //             'observacion4' => $observacion4,
    //             'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
    //             'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
    //             'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
    //             'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
    //         ];

    //     }
    //     return view("home.table.spanish.table2.spanish6", compact('promedioData', 'users'));
    // }
    /*************************************** tabla 7 ************************************************************* */
    public function table_spanish7(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishSeptimo');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $SpanishSeptimo = SpanishSeptimo::where('user_id', $user->id)->first();
            if ($SpanishSeptimo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $SpanishSeptimo->spanishPS1,
                    $SpanishSeptimo->spanishPS2,
                    $SpanishSeptimo->spanishPS3,
                    $SpanishSeptimo->spanishPS4,
                    $SpanishSeptimo->spanishPS5,
                    $SpanishSeptimo->spanishPS6,
                    $SpanishSeptimo->spanishPS7,
                    $SpanishSeptimo->spanishPS8,
                    $SpanishSeptimo->spanishPS9,
                    $SpanishSeptimo->spanishPS10,
                ];
    
                $respuestasCorrectas = [
                    null,  // respuesta 1 no es una comparación de string
                    null,  // respuesta 2 no es una comparación de string
                    null,  // respuesta 3 no es una comparación de string
                    null,  // respuesta 4 no es una comparación de string
                    null,  // respuesta 5 no es una comparación de string
                    null,  // respuesta 6 no es una comparación de string
                    null,  // respuesta 7 no es una comparación de string
                    'C. Interjección',
                    'A. El proceso de intercambio de información entre un emisor y un receptor mediante un código y un canal.',
                    'A. El sistema de signos y reglas que comparten el emisor y el receptor para entenderse.',
                ];
    
                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }
    
                $cantidadDeVeces = SpanishSeptimo::where('user_id', $user->id)->count();
    
                $SpanishSeptimo->update([
                    'averageSpanishPS' => $sumaPromedio,
                    'attemptsSpanishPS' => $cantidadDeVeces,
                    'correctSpanishPS' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPS' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPS' => $cantidadRespuestasRegulares,
                ]);
    
                $comment1 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS1');
                $comment2 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS2');
                $comment3 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS3');
                $comment4 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS4');
                $comment5 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS5');
                $comment6 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS6');
                $comment7 = SpanishSeptimo::where('user_id', $user->id)->value('commentPS7');
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment1' => $comment1,
                    'comment2' => $comment2,
                    'comment3' => $comment3,
                    'comment4' => $comment4,
                    'comment5' => $comment5,
                    'comment6' => $comment6,
                    'comment7' => $comment7,
                ];
            }
        }

        // Log::info('valor de promedios: ' . json_encode($promedioData));
        // return response()->json(['promediosss' => $promedioData]);

        return view("home.table.spanish.spanish7", compact('promedioData', 'users'));
    }

    // public function table_spanish7Table2(Request $request)
    // {
    //     $estudianteRole = Role::where('name', 'Aspirante')->first();
    //     $query = $estudianteRole->users()
    //         ->whereHas('SpanishSeptimo');

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
    //         });
    //     }

    //     // Paginar los resultados con un máximo de 3 elementos por página
    //     $users = $query->paginate(10);

    //     $promedioData = [];
    //     foreach ($users as $user) {

    //         $spanishSeptimo = SpanishSeptimo::where('user_id', $user->id)->first();

    //         // Verificar si la observación es "Sin Observación"
    //         $observacion = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSeptimo->ObservationspanishPS)
    //             : null;

    //         $observacion2 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS2 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSeptimo->ObservationspanishPS2)
    //             : null;

    //         $observacion3 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS3 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSeptimo->ObservationspanishPS3)
    //             : null;

    //         $observacion4 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS4 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishSeptimo->ObservationspanishPS4)
    //             : null;

    //         $observacionPredeterminadaPresente = $observacion === null;
    //         $observacionPredeterminadaPresente2 = $observacion2 === null;
    //         $observacionPredeterminadaPresente3 = $observacion3 === null;
    //         $observacionPredeterminadaPresente4 = $observacion4 === null;

    //         $promedioData[] = [
    //             'id' => $user->id, // Agregar el ID del usuario al array
    //             'user' => $user,
    //             'observacion' => $observacion,
    //             'observacion2' => $observacion2,
    //             'observacion3' => $observacion3,
    //             'observacion4' => $observacion4,
    //             'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
    //             'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
    //             'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
    //             'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
    //         ];

    //     }
    //     return view("home.table.spanish.table2.spanish7", compact('promedioData', 'users'));
    // }

    /***************************************************** TABLA 8 ************************************* */
    public function table_spanish8(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishOctavo');
        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $SpanishOctavo = SpanishOctavo::where('user_id', $user->id)->first();
            if ($SpanishOctavo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $SpanishOctavo->spanishPO1,
                    $SpanishOctavo->spanishPO2,
                    $SpanishOctavo->spanishPO3,
                    $SpanishOctavo->spanishPO4,
                    $SpanishOctavo->spanishPO5,
                    $SpanishOctavo->spanishPO6,
                    $SpanishOctavo->spanishPO7,
                    $SpanishOctavo->spanishPO8,
                    $SpanishOctavo->spanishPO9,
                    $SpanishOctavo->spanishPO10,
                ];
    
                $respuestasCorrectas = [
                    null,  // respuesta 1 no es una comparación de string
                    null,  // respuesta 2 no es una comparación de string
                    null,  // respuesta 3 no es una comparación de string
                    null,  // respuesta 4 no es una comparación de string
                    null,  // respuesta 5 no es una comparación de string
                    'A. Una unidad de comunicación con sentido completo, coherencia interna y adecuación a un contexto.',
                    'A. La relación lógica y ordenada entre las ideas que se presentan en el texto.',
                    null,
                    'C. El Romanticismo',
                    'B. Johann Wolfgang von Goethe',
                ];
    
                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }
    
                $cantidadDeVeces = SpanishOctavo::where('user_id', $user->id)->count();
    
                $SpanishOctavo->update([
                    'averageSpanishPO' => $sumaPromedio,
                    'attemptsSpanishPO' => $cantidadDeVeces,
                    'correctSpanishPO' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPO' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPO' => $cantidadRespuestasRegulares,
                ]);
    
                $comment1 = SpanishOctavo::where('user_id', $user->id)->value('commentPO1');
                $comment2 = SpanishOctavo::where('user_id', $user->id)->value('commentPO2');
                $comment3 = SpanishOctavo::where('user_id', $user->id)->value('commentPO3');
                $comment4 = SpanishOctavo::where('user_id', $user->id)->value('commentPO4');
                $comment5 = SpanishOctavo::where('user_id', $user->id)->value('commentPO5');
                $comment8 = SpanishOctavo::where('user_id', $user->id)->value('commentPO8');
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment1' => $comment1,
                    'comment2' => $comment2,
                    'comment3' => $comment3,
                    'comment4' => $comment4,
                    'comment5' => $comment5,
                    'comment8' => $comment8,
                ];
            }
            }
            return view("home.table.spanish.spanish8", compact('promedioData', 'users'));
    }


    // public function table_spanish8Table2(Request $request)
    // {
    //     $estudianteRole = Role::where('name', 'Aspirante')->first();
    //     $query = $estudianteRole->users()
    //         ->whereHas('SpanishOctavo');

    //     if ($request->has('search')) {
    //         $searchTerm = $request->input('search');
    //         $query->where(function ($q) use ($searchTerm) {
    //             $q->where('name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
    //                 ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
    //         });
    //     }

    //     // Paginar los resultados con un máximo de 3 elementos por página
    //     $users = $query->paginate(10);

    //     $promedioData = [];
    //     foreach ($users as $user) {

    //         $spanishOctavo = SpanishOctavo::where('user_id', $user->id)->first();

    //         // Verificar si la observación es "Sin Observación"
    //         $observacion = $spanishOctavo && $spanishOctavo->ObservationspanishPO !== 'Sin Observacion'
    //             ? explode(' - ', $spanishOctavo->ObservationspanishPO)
    //             : null;

    //         $observacion2 = $spanishOctavo && $spanishOctavo->ObservationspanishPO2 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishOctavo->ObservationspanishPO2)
    //             : null;

    //         $observacion3 = $spanishOctavo && $spanishOctavo->ObservationspanishPO3 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishOctavo->ObservationspanishPO3)
    //             : null;

    //         $observacion4 = $spanishOctavo && $spanishOctavo->ObservationspanishPO4 !== 'Sin Observacion'
    //             ? explode(' - ', $spanishOctavo->ObservationspanishPO4)
    //             : null;

    //         $observacionPredeterminadaPresente = $observacion === null;
    //         $observacionPredeterminadaPresente2 = $observacion2 === null;
    //         $observacionPredeterminadaPresente3 = $observacion3 === null;
    //         $observacionPredeterminadaPresente4 = $observacion4 === null;

    //         $promedioData[] = [
    //             'id' => $user->id, // Agregar el ID del usuario al array
    //             'user' => $user,
    //             'observacion' => $observacion,
    //             'observacion2' => $observacion2,
    //             'observacion3' => $observacion3,
    //             'observacion4' => $observacion4,
    //             'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
    //             'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
    //             'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
    //             'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
    //         ];

    //     }
    //     return view("home.table.spanish.table2.spanish8", compact('promedioData', 'users'));
    // }

    public function table_spanish9(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishNoveno');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $SpanishNoveno = SpanishNoveno::where('user_id', $user->id)->first();

            if ($SpanishNoveno !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;

                $respuestas = [
                    $SpanishNoveno->spanishPNO1,
                    $SpanishNoveno->spanishPNO2,
                    $SpanishNoveno->spanishPNO3,
                    $SpanishNoveno->spanishPNO4,
                    $SpanishNoveno->spanishPNO5,
                    $SpanishNoveno->spanishPNO6,
                    $SpanishNoveno->spanishPNO7,
                    $SpanishNoveno->spanishPNO8,
                    $SpanishNoveno->spanishPNO9,
                    $SpanishNoveno->spanishPNO10,
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

                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } 
                }

                $cantidadDeVeces = SpanishNoveno::where('user_id', $user->id)->count();

                $SpanishNoveno->update([
                    'averageSpanishPNO' => $sumaPromedio,
                    'attemptsSpanishPNO' => $cantidadDeVeces,
                    'correctSpanishPNO' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPNO' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPNO' => $cantidadRespuestasRegulares,
                ]);

                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                ];
            }
        }
        return view("home.table.spanish.spanish9", compact('promedioData', 'users'));
    }

    public function table_spanish10(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishDecimo');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $spanishDecimo = SpanishDecimo::where('user_id', $user->id)->first();
            if ($spanishDecimo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasRegulares = 0;
                $cantidadRespuestasIncorrectas = 0;

                $respuestas = [
                    $spanishDecimo->spanishPD1,
                    $spanishDecimo->spanishPD2,
                    $spanishDecimo->spanishPD3,
                    $spanishDecimo->spanishPD4,
                    $spanishDecimo->spanishPD5,
                    $spanishDecimo->spanishPD6,
                    $spanishDecimo->spanishPD7,
                    $spanishDecimo->spanishPD8,
                    $spanishDecimo->spanishPD9,
                    $spanishDecimo->spanishPD10,
                ];

                $respuestasCorrectas = [
                    'D. supone que una menor TE en el país se traduce en un sistema penal más eficiente.',
                    'B. refutar la validez de un juicio previo.',
                    'A. Evidencia/antítesis.',
                    null,  // respuesta 4 no es una comparación de string
                    null,  // respuesta 5 no es una comparación de string
                    null,  // respuesta 6 no es una comparación de string
                    null,  // respuesta 7 no es una comparación de string
                    'A. La habilidad de comprender, analizar, evaluar y reflexionar sobre los textos escritos desde una perspectiva crítica.',
                    'D. Un fragmento de una novela',
                    'B. Le provoca miedo y repulsión',
                ];

                foreach ($respuestas as $index => $respuesta) {
                    if ($respuestasCorrectas[$index] !== null) {
                        if ($respuesta == $respuestasCorrectas[$index]) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += 0.5;
                        } else {
                            $cantidadRespuestasIncorrectas++;
                        }
                    } else {
                        if ($respuesta >= 4) {
                            $cantidadRespuestasCorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 4 && $respuesta >= 3) {
                            $cantidadRespuestasRegulares++;
                            $sumaPromedio += $respuesta / 10;
                        } elseif ($respuesta < 3 && $respuesta >= 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta / 10;
                        }elseif ($respuesta < 1) {
                            $cantidadRespuestasIncorrectas++;
                            $sumaPromedio += $respuesta;
                        }
                    }
                }

                $cantidadDeVeces = SpanishDecimo::where('user_id', $user->id)->count();

                $spanishDecimo->update([
                    'averageSpanishPD' => $sumaPromedio,
                    'attemptsSpanishPD' => $cantidadDeVeces,
                    'correctSpanishPD' => $cantidadRespuestasCorrectas,
                    'incorrectSpanishPD' => $cantidadRespuestasIncorrectas,
                    'regularSpanishPD' => $cantidadRespuestasRegulares,
                ]);

                $comment4_1 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_1');
                $comment4_2 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_2');
                $comment4_3 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_3');
                $comment4_4 = SpanishDecimo::where('user_id', $user->id)->value('comment_fragmentPD4_4');

                $comment5 = SpanishDecimo::where('user_id', $user->id)->value('commentPD5');
                $comment6 = SpanishDecimo::where('user_id', $user->id)->value('commentPD6');
                $comment7 = SpanishDecimo::where('user_id', $user->id)->value('commentPD7');

                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment4_1' => $comment4_1,
                    'comment4_2' => $comment4_2,
                    'comment4_3' => $comment4_3,
                    'comment4_4' => $comment4_4,
                    'comment5' => $comment5,
                    'comment6' => $comment6,
                    'comment7' => $comment7,
                ];
            }
        }

        return view("home.table.spanish.spanish10", compact('promedioData', 'users'));
    }

    public function store_spanish4(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPC1' => 'required|string',
            'spanishPC2' => 'required|string',
            'spanishPC3' => 'required|string',
            'spanishPC4' => 'required|string',
            'spanishPC5' => 'required|string',
            'spanishPC6' => 'required|string',
            'spanishPC7' => 'required|string',
            'commentPC8' => 'required|string',
            'spanishPC9' => 'required|string',
            'spanishPC10' => 'required|string',
        ]);

        $user_id = Auth::id(); //extraigo el id del usuario logueado
        $existingRecord = SpanishCuarto::where('user_id', $user_id)->first(); //hago una consulta en la tabla para guardar el registro en la variable

        if ($existingRecord) { //hago la condicion, si existe un registro me sale el error y no me deja enviar nuevamente un formulario
            return redirect()->back()->with('error', 'El custionario ya ha sido resuelto');
        }else { //sino existe registro las respuestas del formulario se guardan
            $spanishCuarto = new SpanishCuarto();
            $spanishCuarto->user_id = $user_id;
            $spanishCuarto->spanishPC1 = $request->input('spanishPC1');
            $spanishCuarto->spanishPC2 = $request->input('spanishPC2');
            $spanishCuarto->spanishPC3 = $request->input('spanishPC3');
            $spanishCuarto->spanishPC4 = $request->input('spanishPC4');
            $spanishCuarto->spanishPC5 = $request->input('spanishPC5');
            $spanishCuarto->spanishPC6 = $request->input('spanishPC6');
            $spanishCuarto->spanishPC7 = $request->input('spanishPC7');
            $spanishCuarto->commentPC8 = $request->input('commentPC8');
            $spanishCuarto->spanishPC9 = $request->input('spanishPC9');
            $spanishCuarto->spanishPC10 = $request->input('spanishPC10');

            $spanishCuarto->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_spanish5(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPQ1' => 'required|string',
            'spanishPQ2' => 'required|string',
            'spanishPQ3' => 'required|string',
            'spanishPQ4' => 'required|string',
            'spanishPQ5' => 'required|string',
            'commentPQ6' => 'required|string',
            'commentPQ7' => 'required|string',
            'spanishPQ8' => 'required|string',
            'spanishPQ9' => 'required|string',
            'commentPQ10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishQuinto::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El custionario ya ha sido resuelto');
        }else {
            $spanishQuinto = new SpanishQuinto();
            $spanishQuinto->user_id = $user_id;
            $spanishQuinto->spanishPQ1 = $request->input('spanishPQ1');
            $spanishQuinto->spanishPQ2 = $request->input('spanishPQ2');
            $spanishQuinto->spanishPQ3 = $request->input('spanishPQ3');
            $spanishQuinto->spanishPQ4 = $request->input('spanishPQ4');
            $spanishQuinto->spanishPQ5 = $request->input('spanishPQ5');
            $spanishQuinto->commentPQ6 = $request->input('commentPQ6');
            $spanishQuinto->commentPQ7 = $request->input('commentPQ7');
            $spanishQuinto->spanishPQ8 = $request->input('spanishPQ8');
            $spanishQuinto->spanishPQ9 = $request->input('spanishPQ9');
            $spanishQuinto->commentPQ10 = $request->input('commentPQ10');

            $spanishQuinto->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }
    public function store_spanish6(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'commentPSX1' => 'required|string',
            'commentPSX2' => 'required|string',
            'commentPSX3' => 'required|string',
            'commentPSX4' => 'required|string',
            'commentPSX5' => 'required|string',
            'commentPSX6' => 'required|string',
            'spanishPSX7' => 'required|string',
            'spanishPSX8' => 'required|string',
            'spanishPSX9' => 'required|string',
            'spanishPSX10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishSexto::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El custionario ya ha sido resuelto');
        }else {

            $spanishSexto = new SpanishSexto();
            $spanishSexto->user_id = $user_id;
            $spanishSexto->commentPSX1 = $request->input('commentPSX1');
            $spanishSexto->commentPSX2 = $request->input('commentPSX2');
            $spanishSexto->commentPSX3 = $request->input('commentPSX3');
            $spanishSexto->commentPSX4 = $request->input('commentPSX4');
            $spanishSexto->commentPSX5 = $request->input('commentPSX5');
            $spanishSexto->commentPSX6 = $request->input('commentPSX6');
            $spanishSexto->spanishPSX7 = $request->input('spanishPSX7');
            $spanishSexto->spanishPSX8 = $request->input('spanishPSX8');
            $spanishSexto->spanishPSX9 = $request->input('spanishPSX9');
            $spanishSexto->spanishPSX10 = $request->input('spanishPSX10');

            $spanishSexto->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_spanish7(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'commentPS1' => 'required|string',
            'commentPS2' => 'required|string',
            'commentPS3' => 'required|string',
            'commentPS4' => 'required|string',
            'commentPS5' => 'required|string',
            'commentPS6' => 'required|string',
            'commentPS7' => 'required|string',
            'spanishPS8' => 'required|string',
            'spanishPS9' => 'required|string',
            'spanishPS10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishSeptimo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El custionario ya ha sido resuelto');
        }else {

            $spanishSexto = new SpanishSeptimo();
            $spanishSexto->user_id = $user_id;
            $spanishSexto->commentPS1 = $request->input('commentPS1');
            $spanishSexto->commentPS2 = $request->input('commentPS2');
            $spanishSexto->commentPS3 = $request->input('commentPS3');
            $spanishSexto->commentPS4 = $request->input('commentPS4');
            $spanishSexto->commentPS5 = $request->input('commentPS5');
            $spanishSexto->commentPS6 = $request->input('commentPS6');
            $spanishSexto->commentPS7 = $request->input('commentPS7');
            $spanishSexto->spanishPS8 = $request->input('spanishPS8');
            $spanishSexto->spanishPS9 = $request->input('spanishPS9');
            $spanishSexto->spanishPS10 = $request->input('spanishPS10');

            $spanishSexto->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_spanish8(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'commentPO1' => 'required|string',
            'commentPO2' => 'required|string',
            'commentPO3' => 'required|string',
            'commentPO4' => 'required|string',
            'commentPO5' => 'required|string',
            'spanishPO6' => 'required|string',
            'spanishPO7' => 'required|string',
            'commentPO8' => 'required|string',
            'spanishPO9' => 'required|string',
            'spanishPO10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishOctavo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El custionario ya ha sido resuelto');
        }else {

            $spanishOctavo = new SpanishOctavo();
            $spanishOctavo->user_id = $user_id;
            $spanishOctavo->commentPO1 = $request->input('commentPO1');
            $spanishOctavo->commentPO2 = $request->input('commentPO2');
            $spanishOctavo->commentPO3 = $request->input('commentPO3');
            $spanishOctavo->commentPO4 = $request->input('commentPO4');
            $spanishOctavo->commentPO5 = $request->input('commentPO5');
            $spanishOctavo->spanishPO6 = $request->input('spanishPO6');
            $spanishOctavo->spanishPO7 = $request->input('spanishPO7');
            $spanishOctavo->commentPO8 = $request->input('commentPO8');
            $spanishOctavo->spanishPO9 = $request->input('spanishPO9');
            $spanishOctavo->spanishPO10 = $request->input('spanishPO10');

            $spanishOctavo->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }
    public function store_spanish9(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPNO1' => 'required|string',
            'spanishPNO2' => 'required|string',
            'spanishPNO3' => 'required|string',
            'spanishPNO4' => 'required|string',
            'spanishPNO5' => 'required|string',
            'spanishPNO6' => 'required|string',
            'spanishPNO7' => 'required|string',
            'spanishPNO8' => 'required|string',
            'spanishPNO9' => 'required|string',
            'spanishPNO10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishNoveno::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

            $spanishNoveno = new SpanishNoveno();
            $spanishNoveno->user_id = $user_id;
            $spanishNoveno->spanishPNO1 = $request->input('spanishPNO1');
            $spanishNoveno->spanishPNO2 = $request->input('spanishPNO2');
            $spanishNoveno->spanishPNO3 = $request->input('spanishPNO3');
            $spanishNoveno->spanishPNO4 = $request->input('spanishPNO4');
            $spanishNoveno->spanishPNO5 = $request->input('spanishPNO5');
            $spanishNoveno->spanishPNO6 = $request->input('spanishPNO6');
            $spanishNoveno->spanishPNO7 = $request->input('spanishPNO7');
            $spanishNoveno->spanishPNO8 = $request->input('spanishPNO8');
            $spanishNoveno->spanishPNO9 = $request->input('spanishPNO9');
            $spanishNoveno->spanishPNO10 = $request->input('spanishPNO10');

            $spanishNoveno->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_spanish10(Request $request)
    {   
        // Validar los datos del formulario
        $request->validate([
            'spanishPD1' => 'required|string',
            'spanishPD2' => 'required|string',
            'spanishPD3' => 'required|string',
            'comment_fragmentPD4_1' => 'required|string',
            'comment_fragmentPD4_2' => 'required|string',
            'comment_fragmentPD4_3' => 'required|string',
            'comment_fragmentPD4_4' => 'required|string',
            'commentPD5' => 'required|string',
            'commentPD6' => 'required|string',
            'commentPD7' => 'required|string',
            'spanishPD8' => 'required|string',
            'spanishPD9' => 'required|string',
            'spanishPD10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = SpanishDecimo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            //Usuario ya tiene un registro
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

            $spanishDecimo = new SpanishDecimo();
            $spanishDecimo->user_id = $user_id;
            $spanishDecimo->spanishPD1 = $request->input('spanishPD1');
            $spanishDecimo->spanishPD2 = $request->input('spanishPD2');
            $spanishDecimo->spanishPD3 = $request->input('spanishPD3');
            $spanishDecimo->comment_fragmentPD4_1 = $request->input('comment_fragmentPD4_1');
            $spanishDecimo->comment_fragmentPD4_2 = $request->input('comment_fragmentPD4_2');
            $spanishDecimo->comment_fragmentPD4_3 = $request->input('comment_fragmentPD4_3');
            $spanishDecimo->comment_fragmentPD4_4 = $request->input('comment_fragmentPD4_4');
            $spanishDecimo->commentPD5 = $request->input('commentPD5');
            $spanishDecimo->commentPD6 = $request->input('commentPD6');
            $spanishDecimo->commentPD7 = $request->input('commentPD7');
            $spanishDecimo->spanishPD8 = $request->input('spanishPD8');
            $spanishDecimo->spanishPD9 = $request->input('spanishPD9');
            $spanishDecimo->spanishPD10 = $request->input('spanishPD10');

            $spanishDecimo->save();

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }
    public function resetearPuntosSpanish4()
    {
        SpanishCuarto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    public function resetearPuntosSpanish5()
    {
        SpanishQuinto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosSpanish6()
    {
        SpanishSexto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosSpanish7()
    {
        SpanishSeptimo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    public function resetearPuntosSpanish8()
    {
        SpanishOctavo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosSpanish9()
    {
        SpanishNoveno::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosSpanish10()
    {
        SpanishDecimo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    ///------------------------------------- Calificaciones de grado 4 -------------------------------------------

    public function calificarspanishPC8(Request $request, $userId)
    {
        $pregunta = SpanishCuarto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPC8;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPC8 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 8 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    ///------------------------------------- Calificaciones de grado 5 -------------------------------------------

    // Grado 5 pregunta 6
    public function calificarspanishPQ6(Request $request, $userId)
    {
        $pregunta = SpanishQuinto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPQ6;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPQ6 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 6 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    //pregunta 7 grado 5

    public function calificarspanishPQ7(Request $request, $userId)
    {
        $pregunta = SpanishQuinto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPQ7;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPQ7 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 7 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 10 grado 5

    public function calificarspanishPQ10(Request $request, $userId)
    {
        $pregunta = SpanishQuinto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPQ10;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPQ10 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 10 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    //------------------------------------------- Calificaciones de grado 6 ------------------------------------//

    // pregunta 1 grado 6
    public function calificarspanishPSX1(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX1;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX1 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 1 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 2 grado 6

    public function calificarspanishPSX2(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX2;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX2 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 2 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    //pregunta 3 grado 6
    public function calificarspanishPSX3(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX3;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX3 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 3 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 4 grado 6

    public function calificarspanishPSX4(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX4;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX4 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 5 grado 6

    public function calificarspanishPSX5(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX5;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX5 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 5 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 6 grado 6

    public function calificarspanishPSX6(Request $request, $userId)
    {
        $pregunta = SpanishSexto::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPSX6;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPSX6 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 6 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    //------------------------------------ Calificaciones de grado 7 ------------------------------------------//
    public function calificarspanishPS1(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS1;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS1 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 1 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 2 grado 7

    public function calificarspanishPS2(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS2;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS2 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 2 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 3 grado 7

    public function calificarspanishPS3(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS3;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS3 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 3 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 4 grado 7

    public function calificarspanishPS4(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS4;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS4 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 5 grado 7

    public function calificarspanishPS5(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS5;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS5 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 5 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // pregunta 6 grado 7

    public function calificarspanishPS6(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS6;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS6 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 6 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 7 grado 7

    public function calificarspanishPS7(Request $request, $userId)
    {
        $pregunta = SpanishSeptimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPS7;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPS7 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 7 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    //----------------------------------------- Grado 8 -------------------------------------------

    // pregunta 1 grado 8

    public function calificarspanishPO1(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO1;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO1 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 1 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 2 grado 8
    public function calificarspanishPO2(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO2;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO2 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 2 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 3 grado 8
    public function calificarspanishPO3(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO3;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO3 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 3 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 4 grado 8
    public function calificarspanishPO4(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO4;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO4 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 5 grado 8
    public function calificarspanishPO5(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO5;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO5 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 5 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }
    // pregunta 8 grado 8

    public function calificarspanishPO8(Request $request, $userId)
    {
        $pregunta = SpanishOctavo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPO8;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPO8 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 8 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    // ------------------------- GRADO DECIMO ----------------------------------------//

    public function calificarspanishPD5(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPD5;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPD5 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 5 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD6(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPD6;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPD6 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 6 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD7(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->spanishPD7;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:5',
                ]);

                $pregunta->spanishPD7 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 7 calificada correctamente.');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD4_1(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->fragment_numberPD1;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 0.1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:1.2',
                ]);

                $pregunta->fragment_numberPD1 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 fragmento 1 calificado correctamente')->with('calificacionExitosa', true);
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD4_2(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->fragment_numberPD2;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 0.1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:1.2',
                ]);

                $pregunta->fragment_numberPD2 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 fragmento 2 calificado correctamente');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD4_3(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->fragment_numberPD3;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 0.1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:1.2',
                ]);

                $pregunta->fragment_numberPD3 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 fragmento 3 calificado correctamente');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    public function calificarspanishPD4_4(Request $request, $userId)
    {
        $pregunta = SpanishDecimo::where('user_id', $userId)->first();

        if ($pregunta) {
            $estadoPregunta = $pregunta->fragment_numberPD4;

            // Verificar si la pregunta NO ha sido calificada antes (considerando el valor por defecto 0.1)
            if ($estadoPregunta == 0) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0|max:1.2',
                ]);

                $pregunta->fragment_numberPD4 = $request->input('cantidad');
                $pregunta->save();

                return redirect()->back()->with('success', 'Pregunta 4 fragmento 4 calificado correctamente');
            } else {
                // La pregunta ya fue calificada, mostrar un mensaje informativo
                return redirect()->back()->with('info', 'Ya has calificado esta pregunta anteriormente.');
            }
        } else {
            return redirect()->back()->with('error', 'No se encontró la pregunta para el usuario.');
        }
    }

    //******************************** Observaciones Grados ********************************** */
    public function saveObservationSpanishPC(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = SpanishCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationspanishPC;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationspanishPC = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPC2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = SpanishCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationspanishPC2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationspanishPC2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPC3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = SpanishCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationspanishPC3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationspanishPC3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPC4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = SpanishCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationspanishPC4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationspanishPC4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }


    // GRADOS 5
    public function saveObservationSpanishPQ(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishQuinto = SpanishQuinto::where('user_id', $userId)->first();

        if ($SpanishQuinto) {
            $existingObservation = $SpanishQuinto->ObservationspanishPQ;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishQuinto->ObservationspanishPQ = $newObservation;
                $SpanishQuinto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPQ2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishQuinto = SpanishQuinto::where('user_id', $userId)->first();

        if ($SpanishQuinto) {
            $existingObservation = $SpanishQuinto->ObservationspanishPQ2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishQuinto->ObservationspanishPQ2 = $newObservation;
                $SpanishQuinto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPQ3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishQuinto = SpanishQuinto::where('user_id', $userId)->first();

        if ($SpanishQuinto) {
            $existingObservation = $SpanishQuinto->ObservationspanishPQ3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishQuinto->ObservationspanishPQ3 = $newObservation;
                $SpanishQuinto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPQ4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishQuinto = SpanishQuinto::where('user_id', $userId)->first();

        if ($SpanishQuinto) {
            $existingObservation = $SpanishQuinto->ObservationspanishPQ4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishQuinto->ObservationspanishPQ4 = $newObservation;
                $SpanishQuinto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPSX(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSexto = SpanishSexto::where('user_id', $userId)->first();

        if ($SpanishSexto) {
            $existingObservation = $SpanishSexto->ObservationspanishPSX;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSexto->ObservationspanishPSX = $newObservation;
                $SpanishSexto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPSX2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSexto = SpanishSexto::where('user_id', $userId)->first();

        if ($SpanishSexto) {
            $existingObservation = $SpanishSexto->ObservationspanishPSX2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSexto->ObservationspanishPSX2 = $newObservation;
                $SpanishSexto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPSX3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSexto = SpanishSexto::where('user_id', $userId)->first();

        if ($SpanishSexto) {
            $existingObservation = $SpanishSexto->ObservationspanishPSX3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSexto->ObservationspanishPSX3 = $newObservation;
                $SpanishSexto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPSX4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSexto = SpanishSexto::where('user_id', $userId)->first();

        if ($SpanishSexto) {
            $existingObservation = $SpanishSexto->ObservationspanishPSX4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSexto->ObservationspanishPSX4 = $newObservation;
                $SpanishSexto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPS(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishSeptimo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPS;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPS = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPS2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishSeptimo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPS2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPS2 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPS3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishSeptimo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPS3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPS3 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPS4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishSeptimo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPS4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPS4 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPO(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishOctavo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPO;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPO = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPO2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishOctavo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPO2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPO2 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPO3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishOctavo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPO3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPO3 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPO4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishSeptimo = SpanishOctavo::where('user_id', $userId)->first();

        if ($SpanishSeptimo) {
            $existingObservation = $SpanishSeptimo->ObservationspanishPO4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishSeptimo->ObservationspanishPO4 = $newObservation;
                $SpanishSeptimo->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPNO(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishNoveno = SpanishNoveno::where('user_id', $userId)->first();

        if ($SpanishNoveno) {
            $existingObservation = $SpanishNoveno->ObservationspanishPNO;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishNoveno->ObservationspanishPNO = $newObservation;
                $SpanishNoveno->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPNO2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishNoveno = SpanishNoveno::where('user_id', $userId)->first();

        if ($SpanishNoveno) {
            $existingObservation = $SpanishNoveno->ObservationspanishPNO2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishNoveno->ObservationspanishPNO2 = $newObservation;
                $SpanishNoveno->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationSpanishPNO3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishNoveno = SpanishNoveno::where('user_id', $userId)->first();

        if ($SpanishNoveno) {
            $existingObservation = $SpanishNoveno->ObservationspanishPNO3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishNoveno->ObservationspanishPNO3 = $newObservation;
                $SpanishNoveno->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationSpanishPNO4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $SpanishNoveno = SpanishNoveno::where('user_id', $userId)->first();

        if ($SpanishNoveno) {
            $existingObservation = $SpanishNoveno->ObservationspanishPNO4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $SpanishNoveno->ObservationspanishPNO4 = $newObservation;
                $SpanishNoveno->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    // **************************************** EXPORTACIONES DE ESPAÑOL ******************************************* //
    public function exportExcelSpanish4()
    {
        $fileName = 'LenguaCastellanaGrado4.xlsx';
        Excel::store(new Spanish4Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelSpanish5()
    {
        $fileName = 'LenguaCastellanaGrado5.xlsx';
        Excel::store(new spanish5Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelSpanish6()
    {
        $fileName = 'LenguaCastellanaGrado6.xlsx';
        Excel::store(new spanish6Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelSpanish7()
    {
        $fileName = 'LenguaCastellanaGrado7.xlsx';
        Excel::store(new spanish7Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelSpanish8()
    {
        $fileName = 'LenguaCastellanaGrado8.xlsx';
        Excel::store(new spanish8Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelSpanish9()
    {
        $fileName = 'LenguaCastellanaGrado9.xlsx';
        Excel::store(new spanish9Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelSpanish10()
    {
        $fileName = 'LenguaCastellanaGrado10.xlsx';
        Excel::store(new Spanish10Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
}

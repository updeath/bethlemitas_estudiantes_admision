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

class SpanishController extends Controller
{
    public function index_spanish4()
    {
        return view("home.forms.spanish.spanish4");
    }


    public function index_spanish5()
    {
        return view("home.forms.spanish.spanish5");
    }

    public function index_spanish6()
    {
        return view("home.forms.spanish.spanish6");
    }

    public function index_spanish7()
    {
        return view("home.forms.spanish.spanish7");
    }

    public function index_spanish8()
    {
        return view("home.forms.spanish.spanish8");
    }

    public function index_spanish9()
    {
        return view("home.forms.spanish.spanish9");
    }

    public function index_spanish10()
    {
        return view("home.forms.spanish.spanish10");
    }
    public function index_spanishFragment()
    {
        $users = User::all();
        $promedioData = [];

        foreach ($users as $user) {
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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $spanishCuarto = SpanishCuarto::where('user_id', $user->id)->first();
            if ($spanishCuarto !== null) {
                $respuestas = collect($spanishCuarto->toArray())->only([
                    'spanishPC1',
                    'spanishPC2',
                    'spanishPC3',
                    'spanishPC4',
                    'spanishPC5',
                    'spanishPC6',
                    'spanishPC7',
                    'spanishPC8',
                    'spanishPC9',
                    'spanishPC10',
                ])->values();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 4;
                })->count();
                $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 3;
                })->count();

                $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 2;
                })->count();


                $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();
                $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                $puntuacionPorRespuestaCorrecta = 5 / 10;
                $puntuacionPorRespuestaCon4 = 0.4;
                $puntuacionPorRespuestaRegular = 3 / 10;
                $puntuacionPorRespuestaCon2 = 0.2;
                $puntuacionPorRespuestaIncorrecta = 0;

                $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                    ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                    ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                    ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                    ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                $cantidadDeVeces = SpanishCuarto::where('user_id', $user->id)->count();

                $spanishCuarto->update([
                    'averageSpanishPC' => $promedio,
                    'attemptsSpanishPC' => $cantidadDeVeces,
                    'correctSpanishPC' => $sumarCantidadCorrectas,
                    'incorrectSpanishPC' => $sumarCantidadIncorrectas,
                    'regularSpanishPC' => $cantidadRespuestasRegulares
                ]);

                $comment8 = SpanishCuarto::where('user_id', $user->id)->value('commentPC8');
                $promedioData[] = [
                    'id' => $user->id, // Agregar el ID del usuario al array
                    'user' => $user,
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadRespuestasRegulares' => $cantidadRespuestasRegulares,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'comment8' => $comment8
                ];
            }
        }
        return view("home.table.spanish.spanish4", compact('promedioData', 'users'));
    }

    public function table_spanish4Table2(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishCuarto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $spanishCuarto = SpanishCuarto::where('user_id', $user->id)->first();

            // Verificar si la observación es "Sin Observación"
            $observacion = $spanishCuarto && $spanishCuarto->ObservationspanishPC !== 'Sin Observacion'
                ? explode(' - ', $spanishCuarto->ObservationspanishPC)
                : null;

            $observacion2 = $spanishCuarto && $spanishCuarto->ObservationspanishPC2 !== 'Sin Observacion'
                ? explode(' - ', $spanishCuarto->ObservationspanishPC2)
                : null;

            $observacion3 = $spanishCuarto && $spanishCuarto->ObservationspanishPC3 !== 'Sin Observacion'
                ? explode(' - ', $spanishCuarto->ObservationspanishPC3)
                : null;

            $observacion4 = $spanishCuarto && $spanishCuarto->ObservationspanishPC4 !== 'Sin Observacion'
                ? explode(' - ', $spanishCuarto->ObservationspanishPC4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $promedioData[] = [
                'id' => $user->id, // Agregar el ID del usuario al array
                'user' => $user,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
            ];

        }
        return view("home.table.spanish.table2.spanish4", compact('promedioData', 'users'));
    }
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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishQuinto = SpanishQuinto::where('user_id', $user->id)->first();
            if ($spanishQuinto !== null) {
                $respuestas = collect($spanishQuinto->toArray())->only([
                    'spanishPQ1',
                    'spanishPQ2',
                    'spanishPQ3',
                    'spanishPQ4',
                    'spanishPQ5',
                    'spanishPQ6',
                    'spanishPQ7',
                    'spanishPQ8',
                    'spanishPQ9',
                    'spanishPQ10',
                ])->values();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 4;
                })->count();
                $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 3;
                })->count();

                $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 2;
                })->count();


                $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();
                $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                $puntuacionPorRespuestaCorrecta = 5 / 10;
                $puntuacionPorRespuestaCon4 = 0.4;
                $puntuacionPorRespuestaRegular = 3 / 10;
                $puntuacionPorRespuestaCon2 = 0.2;
                $puntuacionPorRespuestaIncorrecta = 0;

                $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                    ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                    ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                    ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                    ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                $cantidadDeVeces = SpanishQuinto::where('user_id', $user->id)->count();

                $spanishQuinto->update([
                    'averageSpanishPQ' => $promedio,
                    'attemptsSpanishPQ' => $cantidadDeVeces,
                    'correctSpanishPQ' => $sumarCantidadCorrectas,
                    'incorrectSpanishPQ' => $sumarCantidadIncorrectas,
                    'regularSpanishPQ' => $cantidadRespuestasRegulares
                ]);

                $comment6 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ6');
                $comment7 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ7');
                $comment10 = SpanishQuinto::where('user_id', $user->id)->value('commentPQ10');

                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $sumarCantidadCorrectas,
                    'cantidadRespuestasMalas' => $sumarCantidadIncorrectas,
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

    public function table_spanish5Table2(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishQuinto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishQuinto = SpanishQuinto::where('user_id', $user->id)->first();

            // Verificar si la observación es "Sin Observación"
            $observacion = $spanishQuinto && $spanishQuinto->ObservationspanishPQ !== 'Sin Observacion'
                ? explode(' - ', $spanishQuinto->ObservationspanishPQ)
                : null;

            $observacion2 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ2 !== 'Sin Observacion'
                ? explode(' - ', $spanishQuinto->ObservationspanishPQ2)
                : null;

            $observacion3 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ3 !== 'Sin Observacion'
                ? explode(' - ', $spanishQuinto->ObservationspanishPQ3)
                : null;

            $observacion4 = $spanishQuinto && $spanishQuinto->ObservationspanishPQ4 !== 'Sin Observacion'
                ? explode(' - ', $spanishQuinto->ObservationspanishPQ4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $promedioData[] = [
                'id' => $user->id, // Agregar el ID del usuario al array
                'user' => $user,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
            ];

        }
        return view("home.table.spanish.table2.spanish5", compact('promedioData', 'users'));
    }

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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishSexto = SpanishSexto::where('user_id', $user->id)->first();
            if ($spanishSexto !== null) {
                $respuestas = collect($spanishSexto->toArray())->only([
                    'spanishPSX1',
                    'spanishPSX2',
                    'spanishPSX3',
                    'spanishPSX4',
                    'spanishPSX5',
                    'spanishPSX6',
                    'spanishPSX7',
                    'spanishPSX8',
                    'spanishPSX9',
                    'spanishPSX10',
                ])->values();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 4;
                })->count();
                $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 3;
                })->count();

                $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 2;
                })->count();


                $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();
                $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                $puntuacionPorRespuestaCorrecta = 5 / 10;
                $puntuacionPorRespuestaCon4 = 0.4;
                $puntuacionPorRespuestaRegular = 3 / 10;
                $puntuacionPorRespuestaCon2 = 0.2;
                $puntuacionPorRespuestaIncorrecta = 0;

                $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                    ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                    ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                    ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                    ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                $cantidadDeVeces = SpanishSexto::where('user_id', $user->id)->count();

                $spanishSexto->update([
                    'averageSpanishPSX' => $promedio,
                    'attemptsSpanishPSX' => $cantidadDeVeces,
                    'correctSpanishPSX' => $sumarCantidadCorrectas,
                    'incorrectSpanishPSX' => $sumarCantidadIncorrectas,
                    'regularSpanishPSX' => $cantidadRespuestasRegulares
                ]);

                $comment1 = $user->spanishSexto->value('commentPSX1');
                $comment2 = $user->spanishSexto->value('commentPSX2');
                $comment3 = $user->spanishSexto->value('commentPSX3');
                $comment4 = $user->spanishSexto->value('commentPSX4');
                $comment5 = $user->spanishSexto->value('commentPSX5');
                $comment6 = $user->spanishSexto->value('commentPSX6');

                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $sumarCantidadCorrectas,
                    'cantidadRespuestasMalas' => $sumarCantidadIncorrectas,
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

    public function table_spanish6Table2(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('spanishSexto');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishSexto = SpanishSexto::where('user_id', $user->id)->first();

            // Verificar si la observación es "Sin Observación"
            $observacion = $spanishSexto && $spanishSexto->ObservationspanishPSX !== 'Sin Observacion'
                ? explode(' - ', $spanishSexto->ObservationspanishPSX)
                : null;

            $observacion2 = $spanishSexto && $spanishSexto->ObservationspanishPSX2 !== 'Sin Observacion'
                ? explode(' - ', $spanishSexto->ObservationspanishPSX2)
                : null;

            $observacion3 = $spanishSexto && $spanishSexto->ObservationspanishPSX3 !== 'Sin Observacion'
                ? explode(' - ', $spanishSexto->ObservationspanishPSX3)
                : null;

            $observacion4 = $spanishSexto && $spanishSexto->ObservationspanishPSX4 !== 'Sin Observacion'
                ? explode(' - ', $spanishSexto->ObservationspanishPSX4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $promedioData[] = [
                'id' => $user->id, // Agregar el ID del usuario al array
                'user' => $user,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
            ];

        }
        return view("home.table.spanish.table2.spanish6", compact('promedioData', 'users'));
    }
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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishSptimo = SpanishSeptimo::where('user_id', $user->id)->first();
            if ($spanishSptimo !== null) {
                $respuestas = collect($spanishSptimo->toArray())->only([
                    'spanishPS1',
                    'spanishPS2',
                    'spanishPS3',
                    'spanishPS4',
                    'spanishPS5',
                    'spanishPS6',
                    'spanishPS7',
                    'spanishPS8',
                    'spanishPS9',
                    'spanishPS10',
                ])->values();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 4;
                })->count();
                $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 3;
                })->count();

                $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 2;
                })->count();


                $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();
                $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                $puntuacionPorRespuestaCorrecta = 5 / 10;
                $puntuacionPorRespuestaCon4 = 0.4;
                $puntuacionPorRespuestaRegular = 3 / 10;
                $puntuacionPorRespuestaCon2 = 0.2;
                $puntuacionPorRespuestaIncorrecta = 0;

                $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                    ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                    ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                    ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                    ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                $cantidadDeVeces = SpanishSeptimo::where('user_id', $user->id)->count();

                $spanishSptimo->update([
                    'averageSpanishPS' => $promedio,
                    'attemptsSpanishPS' => $cantidadDeVeces,
                    'correctSpanishPS' => $sumarCantidadCorrectas,
                    'incorrectSpanishPS' => $sumarCantidadIncorrectas,
                    'regularSpanishPS' => $cantidadRespuestasRegulares
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
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $sumarCantidadCorrectas,
                    'cantidadRespuestasMalas' => $sumarCantidadIncorrectas,
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
        return view("home.table.spanish.spanish7", compact('promedioData', 'users'));
    }

    public function table_spanish7Table2(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishSeptimo');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishSeptimo = SpanishSeptimo::where('user_id', $user->id)->first();

            // Verificar si la observación es "Sin Observación"
            $observacion = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS !== 'Sin Observacion'
                ? explode(' - ', $spanishSeptimo->ObservationspanishPS)
                : null;

            $observacion2 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS2 !== 'Sin Observacion'
                ? explode(' - ', $spanishSeptimo->ObservationspanishPS2)
                : null;

            $observacion3 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS3 !== 'Sin Observacion'
                ? explode(' - ', $spanishSeptimo->ObservationspanishPS3)
                : null;

            $observacion4 = $spanishSeptimo && $spanishSeptimo->ObservationspanishPS4 !== 'Sin Observacion'
                ? explode(' - ', $spanishSeptimo->ObservationspanishPS4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $promedioData[] = [
                'id' => $user->id, // Agregar el ID del usuario al array
                'user' => $user,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
            ];

        }
        return view("home.table.spanish.table2.spanish7", compact('promedioData', 'users'));
    }

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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

                $spanishSptimo = SpanishOctavo::where('user_id', $user->id)->first();
                if ($spanishSptimo !== null) {
                    $respuestas = collect($spanishSptimo->toArray())->only([
                        'spanishPO1',
                        'spanishPO2',
                        'spanishPO3',
                        'spanishPO4',
                        'spanishPO5',
                        'spanishPO6',
                        'spanishPO7',
                        'spanishPO8',
                        'spanishPO9',
                        'spanishPO10',
                    ])->values();

                    $respuestasCollection = collect($respuestas);

                    $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                        return $respuesta == 5;
                    })->count();

                    $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                        return $respuesta == 4;
                    })->count();
                    $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                    $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                        return $respuesta == 3;
                    })->count();

                    $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                        return $respuesta == 2;
                    })->count();


                    $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                        return $respuesta == 1;
                    })->count();
                    $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                    $puntuacionPorRespuestaCorrecta = 5 / 10;
                    $puntuacionPorRespuestaCon4 = 0.4;
                    $puntuacionPorRespuestaRegular = 3 / 10;
                    $puntuacionPorRespuestaCon2 = 0.2;
                    $puntuacionPorRespuestaIncorrecta = 0;

                    $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                        ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                        ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                        ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                        ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                    $cantidadDeVeces = SpanishOctavo::where('user_id', $user->id)->count();

                    $spanishSptimo->update([
                        'averageSpanishPO' => $promedio,
                        'attemptsSpanishPO' => $cantidadDeVeces,
                        'correctSpanishPO' => $sumarCantidadCorrectas,
                        'incorrectSpanishPO' => $sumarCantidadIncorrectas,
                        'regularSpanishPO' => $cantidadRespuestasRegulares
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
                        'promedio' => $promedio,
                        'cantidadRespuestasBuenas' => $sumarCantidadCorrectas,
                        'cantidadRespuestasMalas' => $sumarCantidadIncorrectas,
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


    public function table_spanish8Table2(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('SpanishOctavo');

        if ($request->has('search')) {
            $searchTerm = $request->input('search');
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 3 elementos por página
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {

            $spanishOctavo = SpanishOctavo::where('user_id', $user->id)->first();

            // Verificar si la observación es "Sin Observación"
            $observacion = $spanishOctavo && $spanishOctavo->ObservationspanishPO !== 'Sin Observacion'
                ? explode(' - ', $spanishOctavo->ObservationspanishPO)
                : null;

            $observacion2 = $spanishOctavo && $spanishOctavo->ObservationspanishPO2 !== 'Sin Observacion'
                ? explode(' - ', $spanishOctavo->ObservationspanishPO2)
                : null;

            $observacion3 = $spanishOctavo && $spanishOctavo->ObservationspanishPO3 !== 'Sin Observacion'
                ? explode(' - ', $spanishOctavo->ObservationspanishPO3)
                : null;

            $observacion4 = $spanishOctavo && $spanishOctavo->ObservationspanishPO4 !== 'Sin Observacion'
                ? explode(' - ', $spanishOctavo->ObservationspanishPO4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $promedioData[] = [
                'id' => $user->id, // Agregar el ID del usuario al array
                'user' => $user,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
            ];

        }
        return view("home.table.spanish.table2.spanish8", compact('promedioData', 'users'));
    }

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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $SpanishNoveno = SpanishNoveno::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($SpanishNoveno !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($SpanishNoveno->toArray())->only([
                    'spanishPNO1',
                    'spanishPNO2',
                    'spanishPNO3',
                    'spanishPNO4',
                    'spanishPNO5',
                    'spanishPNO6',
                    'spanishPNO7',
                    'spanishPNO8',
                    'spanishPNO9',
                    'spanishPNO10',
                ])->values();
                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasBuenas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasMalas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();

                $puntuacionPorPregunta = 5 / 10;
                $promedio = $puntuacionPorPregunta * $cantidadRespuestasBuenas;

                $cantidadDeVeces = SpanishNoveno::where('user_id', $user->id)->count();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasBuenas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasMalas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();

                $puntuacionPorPregunta = 5 / 10;
                $promedio = $puntuacionPorPregunta * $cantidadRespuestasBuenas;

                // Verificar si la observación es "Sin Observación"
                $observacion = $SpanishNoveno && $SpanishNoveno->ObservationspanishPNO !== 'Sin Observacion'
                    ? explode(' - ', $SpanishNoveno->ObservationspanishPNO)
                    : null;

                $observacion2 = $SpanishNoveno && $SpanishNoveno->ObservationspanishPNO2 !== 'Sin Observacion'
                    ? explode(' - ', $SpanishNoveno->ObservationspanishPNO2)
                    : null;

                $observacion3 = $SpanishNoveno && $SpanishNoveno->ObservationspanishPNO3 !== 'Sin Observacion'
                    ? explode(' - ', $SpanishNoveno->ObservationspanishPNO3)
                    : null;

                $observacion4 = $SpanishNoveno && $SpanishNoveno->ObservationspanishPNO4 !== 'Sin Observacion'
                    ? explode(' - ', $SpanishNoveno->ObservationspanishPNO4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $SpanishNoveno->update([
                    'averageSpanishPNO' => $promedio,
                    'attemptsSpanishPNO' => $cantidadDeVeces,
                    'correctSpanishPNO' => $cantidadRespuestasBuenas,
                    'incorrectSpanishPNO' => $cantidadRespuestasMalas,
                ]);

                $promedioData[] = [
                    'user' => $user,
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasBuenas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasMalas,
                    'cantidadDeVeces' => $cantidadDeVeces,
                    'observacion' => $observacion,
                    'observacion2' => $observacion2,
                    'observacion3' => $observacion3,
                    'observacion4' => $observacion4,
                    'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                    'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                    'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                    'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
                ];
            } else {
                $respuestas = [
                    'spanishPNO1' => null,
                    'spanishPNO2' => null,
                    'spanishPNO3' => null,
                    'spanishPNO4' => null,
                    'spanishPNO5' => null,
                    'spanishPNO6' => null,
                    'spanishPNO7' => null,
                    'spanishPNO8' => null,
                    'spanishPNO9' => null,
                    'spanishPNO10' => null,
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
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->paginate(10);

        $promedioData = [];
        foreach ($users as $user) {
            $spanishDecimo = SpanishDecimo::where('user_id', $user->id)->first();
            if ($spanishDecimo !== null) {
                $respuestas = collect($spanishDecimo->toArray())->only([
                    'spanishPD1',
                    'spanishPD2',
                    'spanishPD3',
                    'spanishPD4',
                    'spanishPD5',
                    'spanishPD6',
                    'spanishPD7',
                    'spanishPD8',
                    'spanishPD9',
                    'spanishPD10',
                ])->values();

                $respuestasCollection = collect($respuestas);

                $cantidadRespuestasCorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 5;
                })->count();

                $cantidadRespuestasCon4 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 4;
                })->count();
                $sumarCantidadCorrectas = $cantidadRespuestasCorrectas + $cantidadRespuestasCon4;

                $cantidadRespuestasRegulares = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 3;
                })->count();

                $cantidadRespuestasCon2 = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 2;
                })->count();


                $cantidadRespuestasIncorrectas = $respuestasCollection->filter(function ($respuesta) {
                    return $respuesta == 1;
                })->count();
                $sumarCantidadIncorrectas = $cantidadRespuestasCon2 + $cantidadRespuestasIncorrectas;

                $puntuacionPorRespuestaCorrecta = 5 / 10;
                $puntuacionPorRespuestaCon4 = 0.4;
                $puntuacionPorRespuestaRegular = 3 / 10;
                $puntuacionPorRespuestaCon2 = 0.2;
                $puntuacionPorRespuestaIncorrecta = 0;

                $promedio = ($puntuacionPorRespuestaCorrecta * $cantidadRespuestasCorrectas) +
                    ($puntuacionPorRespuestaCon4 * $cantidadRespuestasCon4) +
                    ($puntuacionPorRespuestaRegular * $cantidadRespuestasRegulares) +
                    ($puntuacionPorRespuestaCon2 * $cantidadRespuestasCon2) +
                    ($puntuacionPorRespuestaIncorrecta * $cantidadRespuestasIncorrectas);

                $cantidadDeVeces = SpanishDecimo::where('user_id', $user->id)->count();

                $spanishDecimo->update([
                    'averageSpanishPD' => $promedio,
                    'attemptsSpanishPD' => $cantidadDeVeces,
                    'correctSpanishPD' => $sumarCantidadCorrectas,
                    'incorrectSpanishPD' => $sumarCantidadIncorrectas,
                    'regularSpanishPD' => $cantidadRespuestasRegulares
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
                    'promedio' => $promedio,
                    'cantidadRespuestasBuenas' => $sumarCantidadCorrectas,
                    'cantidadRespuestasMalas' => $sumarCantidadIncorrectas,
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
            'spanishPC1' => 'required|integer|in:1,5',
            'spanishPC2' => 'required|integer|in:1,5',
            'spanishPC3' => 'required|integer|in:1,5',
            'spanishPC4' => 'required|integer|in:1,5',
            'spanishPC5' => 'required|integer|in:1,5',
            'spanishPC6' => 'required|integer|in:1,5',
            'spanishPC7' => 'required|integer|in:1,5',
            'commentPC8' => 'required|string',
            'spanishPC9' => 'required|integer|in:1,5',
            'spanishPC10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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

    public function store_spanish5(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPQ1' => 'required|integer|in:1,5',
            'spanishPQ2' => 'required|integer|in:1,5',
            'spanishPQ3' => 'required|integer|in:1,5',
            'spanishPQ4' => 'required|integer|in:1,5',
            'spanishPQ5' => 'required|integer|in:1,5',
            'commentPQ6' => 'required|string',
            'commentPQ7' => 'required|string',
            'spanishPQ8' => 'required|integer|in:1,5',
            'spanishPQ9' => 'required|integer|in:1,5',
            'commentPQ10' => 'required|string',
        ]);

        $user_id = Auth::id();

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
            'spanishPSX7' => 'required|integer|in:1,5',
            'spanishPSX8' => 'required|integer|in:1,5',
            'spanishPSX9' => 'required|integer|in:1,5',
            'spanishPSX10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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
            'spanishPS8' => 'required|integer|in:1,5',
            'spanishPS9' => 'required|integer|in:1,5',
            'spanishPS10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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

    public function store_spanish8(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'commentPO1' => 'required|string',
            'commentPO2' => 'required|string',
            'commentPO3' => 'required|string',
            'commentPO4' => 'required|string',
            'commentPO5' => 'required|string',
            'spanishPO6' => 'required|integer|in:1,5',
            'spanishPO7' => 'required|integer|in:1,5',
            'commentPO8' => 'required|string',
            'spanishPO9' => 'required|integer|in:1,5',
            'spanishPO10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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
    public function store_spanish9(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPNO1' => 'required|integer|in:1,5',
            'spanishPNO2' => 'required|integer|in:1,5',
            'spanishPNO3' => 'required|integer|in:1,5',
            'spanishPNO4' => 'required|integer|in:1,5',
            'spanishPNO5' => 'required|integer|in:1,5',
            'spanishPNO6' => 'required|integer|in:1,5',
            'spanishPNO7' => 'required|integer|in:1,5',
            'spanishPNO8' => 'required|integer|in:1,5',
            'spanishPNO9' => 'required|integer|in:1,5',
            'spanishPNO10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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

    public function store_spanish10(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'spanishPD1' => 'required|integer|in:1,5',
            'spanishPD2' => 'required|integer|in:1,5',
            'spanishPD3' => 'required|integer|in:1,5',
            'comment_fragmentPD4_1' => 'required|string',
            'comment_fragmentPD4_2' => 'required|string',
            'comment_fragmentPD4_3' => 'required|string',
            'comment_fragmentPD4_4' => 'required|string',
            'commentPD5' => 'required|string',
            'commentPD6' => 'required|string',
            'commentPD7' => 'required|string',
            'spanishPD8' => 'required|integer|in:1,5',
            'spanishPD9' => 'required|integer|in:1,5',
            'spanishPD10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 1) {
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
            if ($estadoPregunta == 0.1) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0.2|max:1.2',
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
            if ($estadoPregunta == 0.1) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0.2|max:1.2',
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
            if ($estadoPregunta == 0.1) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0.2|max:1.2',
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
            if ($estadoPregunta == 0.1) {
                // La pregunta no ha sido calificada, procesar la calificación
                $request->validate([
                    'cantidad' => 'required|numeric|min:0.2|max:1.2',
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

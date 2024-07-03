<?php

namespace App\Http\Controllers;

use App\Models\MathDecimo;
use Illuminate\Http\Request;
use App\Models\MathCuarto;
use App\Models\MathQuinto;
use App\Models\MathSexto;
use App\Models\MathSeptimo;
use App\Models\MathOctavo;
use App\Models\MathNoveno;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Exports\Math4Export;
use App\Exports\Math\Math5Export;
use App\Exports\Math\math6Export;
use App\Exports\Math\Math7Export;
use App\Exports\Math\Math8Export;
use App\Exports\Math\Math9Export;
use App\Exports\Math\Math10Export;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\Permission\Models\Role;

class MathController extends Controller
{
    public function index_math4()
    {
        return view("home.forms.math.math4");
    }

    public function index_math5()
    {
        return view("home.forms.math.math5");
    }

    public function index_math6()
    {
        return view("home.forms.math.math6");
    }

    public function index_math7()
    {
        return view("home.forms.math.math7");
    }

    public function index_math8()
    {
        return view("home.forms.math.math8");
    }

    public function index_math9()
    {
        return view("home.forms.math.math9");
    }


    public function index_math10()
    {
        return view("home.forms.math.math10");
    }



    public function table_math4(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathCuarto');

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

            $mathCuarto = MathCuarto::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathCuarto !== null) {
                // Si $MathCuarto no es null, obtenemos las respuestas
                $respuestas = collect($mathCuarto->toArray())->only([
                    'mathPC1',
                    'mathPC2',
                    'mathPC3',
                    'mathPC4',
                    'mathPC5',
                    'mathPC6',
                    'mathPC7',
                    'mathPC8',
                    'mathPC9',
                    'mathPC10',
                ])->values();
            } else {
                $respuestas = [
                    'mathPC1' => null,
                    'mathPC2' => null,
                    'mathPC3' => null,
                    'mathPC4' => null,
                    'mathPC5' => null,
                    'mathPC6' => null,
                    'mathPC7' => null,
                    'mathPC8' => null,
                    'mathPC9' => null,
                    'mathPC10' => null,
                ];
            }

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
            $observacion = $mathCuarto && $mathCuarto->ObservationmathPC !== 'Sin Observacion'
                ? explode(' - ', $mathCuarto->ObservationmathPC)
                : null;

            $observacion2 = $mathCuarto && $mathCuarto->ObservationmathPC2 !== 'Sin Observacion'
                ? explode(' - ', $mathCuarto->ObservationmathPC2)
                : null;

            $observacion3 = $mathCuarto && $mathCuarto->ObservationmathPC3 !== 'Sin Observacion'
                ? explode(' - ', $mathCuarto->ObservationmathPC3)
                : null;

            $observacion4 = $mathCuarto && $mathCuarto->ObservationmathPC4 !== 'Sin Observacion'
                ? explode(' - ', $mathCuarto->ObservationmathPC4)
                : null;

            $observacionPredeterminadaPresente = $observacion === null;
            $observacionPredeterminadaPresente2 = $observacion2 === null;
            $observacionPredeterminadaPresente3 = $observacion3 === null;
            $observacionPredeterminadaPresente4 = $observacion4 === null;

            $cantidadDeVeces = MathCuarto::where('user_id', $user->id)->count();

            $mathCuarto->update([
                'average' => $promedio,
                'attempts' => $cantidadDeVeces,
                'correct' => $cantidadRespuestasBuenas,
                'incorrect' => $cantidadRespuestasMalas,
            ]);

            $promedioData[] = [
                'user' => $user,
                'promedio' => $promedio,
                'observacion' => $observacion,
                'observacion2' => $observacion2,
                'observacion3' => $observacion3,
                'observacion4' => $observacion4,
                'observacionPredeterminadaPresente' => $observacionPredeterminadaPresente,
                'observacionPredeterminadaPresente2' => $observacionPredeterminadaPresente2,
                'observacionPredeterminadaPresente3' => $observacionPredeterminadaPresente3,
                'observacionPredeterminadaPresente4' => $observacionPredeterminadaPresente4,
                'cantidadDeVeces' => $cantidadDeVeces,
                'cantidadRespuestasBuenas' => $cantidadRespuestasBuenas,
                'cantidadRespuestasMalas' => $cantidadRespuestasMalas,
            ];


        }

        return view("home.table.math.math4", compact('promedioData', 'users'));
    }
    public function table_math5(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathQuinto');

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

            $MathQuinto = MathQuinto::where('user_id', $user->id)->first();

            if ($MathQuinto !== null) {
                // Resto del código para obtener respuestas y calcular el promedio

                $respuestas = collect($MathQuinto->toArray())->only([
                    'mathPQ1',
                    'mathPQ2',
                    'mathPQ3',
                    'mathPQ4',
                    'mathPQ5',
                    'mathPQ6',
                    'mathPQ7',
                    'mathPQ8',
                    'mathPQ9',
                    'mathPQ10',
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

                $cantidadDeVeces = MathQuinto::where('user_id', $user->id)->count();

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
                $observacion = $MathQuinto && $MathQuinto->ObservationmathPQ !== 'Sin Observacion'
                    ? explode(' - ', $MathQuinto->ObservationmathPQ)
                    : null;

                $observacion2 = $MathQuinto && $MathQuinto->ObservationmathPQ2 !== 'Sin Observacion'
                    ? explode(' - ', $MathQuinto->ObservationmathPQ2)
                    : null;

                $observacion3 = $MathQuinto && $MathQuinto->ObservationmathPQ3 !== 'Sin Observacion'
                    ? explode(' - ', $MathQuinto->ObservationmathPQ3)
                    : null;

                $observacion4 = $MathQuinto && $MathQuinto->ObservationmathPQ4 !== 'Sin Observacion'
                    ? explode(' - ', $MathQuinto->ObservationmathPQ4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $MathQuinto->update([
                    'averagePQ' => $promedio,
                    'attemptsPQ' => $cantidadDeVeces,
                    'correctPQ' => $cantidadRespuestasBuenas,
                    'incorrectPQ' => $cantidadRespuestasMalas,
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
                    'mathPQ1' => null,
                    'mathPQ2' => null,
                    'mathPQ3' => null,
                    'mathPQ4' => null,
                    'mathPQ5' => null,
                    'mathPQ6' => null,
                    'mathPQ7' => null,
                    'mathPQ8' => null,
                    'mathPQ9' => null,
                    'mathPQ10' => null,
                ];

                // Resto del código para manejar el caso cuando $MathQuinto es null...
            }
        }

        return view("home.table.math.math5", compact('promedioData', 'users'));
    }
    public function table_math6(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathSexto');

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

            $MathSexto = MathSexto::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($MathSexto !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($MathSexto->toArray())->only([
                    'mathPSX1',
                    'mathPSX2',
                    'mathPSX3',
                    'mathPSX4',
                    'mathPSX5',
                    'mathPSX6',
                    'mathPSX7',
                    'mathPSX8',
                    'mathPSX9',
                    'mathPSX10',
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

                $cantidadDeVeces = MathSexto::where('user_id', $user->id)->count();

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
                $observacion = $MathSexto && $MathSexto->ObservationmathPSX !== 'Sin Observacion'
                    ? explode(' - ', $MathSexto->ObservationmathPSX)
                    : null;

                $observacion2 = $MathSexto && $MathSexto->ObservationmathPSX2 !== 'Sin Observacion'
                    ? explode(' - ', $MathSexto->ObservationmathPSX2)
                    : null;

                $observacion3 = $MathSexto && $MathSexto->ObservationmathPSX3 !== 'Sin Observacion'
                    ? explode(' - ', $MathSexto->ObservationmathPSX3)
                    : null;

                $observacion4 = $MathSexto && $MathSexto->ObservationmathPSX4 !== 'Sin Observacion'
                    ? explode(' - ', $MathSexto->ObservationmathPSX4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $MathSexto->update([
                    'averagePSX' => $promedio,
                    'attemptsPSX' => $cantidadDeVeces,
                    'correctPSX' => $cantidadRespuestasBuenas,
                    'incorrectPSX' => $cantidadRespuestasMalas,
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
                    'mathPSX1' => null,
                    'mathPSX2' => null,
                    'mathPSX3' => null,
                    'mathPSX4' => null,
                    'mathPSX5' => null,
                    'mathPSX6' => null,
                    'mathPSX7' => null,
                    'mathPSX8' => null,
                    'mathPSX9' => null,
                    'mathPSX10' => null,
                ];
            }
        }

        return view("home.table.math.math6", compact('promedioData', 'users'));
    }

    public function table_math7(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathSeptimo');

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

            $mathSeptimo = mathSeptimo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathSeptimo !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($mathSeptimo->toArray())->only([
                    'mathPS1',
                    'mathPS2',
                    'mathPS3',
                    'mathPS4',
                    'mathPS5',
                    'mathPS6',
                    'mathPS7',
                    'mathPS8',
                    'mathPS9',
                    'mathPS10',
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

                $cantidadDeVeces = MathSeptimo::where('user_id', $user->id)->count();

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
                $observacion = $mathSeptimo && $mathSeptimo->ObservationmathPS !== 'Sin Observacion'
                    ? explode(' - ', $mathSeptimo->ObservationmathPS)
                    : null;

                $observacion2 = $mathSeptimo && $mathSeptimo->ObservationmathPS2 !== 'Sin Observacion'
                    ? explode(' - ', $mathSeptimo->ObservationmathPS2)
                    : null;

                $observacion3 = $mathSeptimo && $mathSeptimo->ObservationmathPS3 !== 'Sin Observacion'
                    ? explode(' - ', $mathSeptimo->ObservationmathPS3)
                    : null;

                $observacion4 = $mathSeptimo && $mathSeptimo->ObservationmathPS4 !== 'Sin Observacion'
                    ? explode(' - ', $mathSeptimo->ObservationmathPS4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $mathSeptimo->update([
                    'averagePS' => $promedio,
                    'attemptsPS' => $cantidadDeVeces,
                    'correctPS' => $cantidadRespuestasBuenas,
                    'incorrectPS' => $cantidadRespuestasMalas,
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
                    'mathPS1' => null,
                    'mathPS2' => null,
                    'mathPS3' => null,
                    'mathPS4' => null,
                    'mathPS5' => null,
                    'mathPS6' => null,
                    'mathPS7' => null,
                    'mathPS8' => null,
                    'mathPS9' => null,
                    'mathPS10' => null,
                ];
            }



        }

        return view("home.table.math.math7", compact('promedioData', 'users'));
    }

    public function table_math8(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathOctavo');

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

            $MathOctavo = MathOctavo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($MathOctavo !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($MathOctavo->toArray())->only([
                    'mathPO1',
                    'mathPO2',
                    'mathPO3',
                    'mathPO4',
                    'mathPO5',
                    'mathPO6',
                    'mathPO7',
                    'mathPO8',
                    'mathPO9',
                    'mathPO10',
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

                $cantidadDeVeces = MathOctavo::where('user_id', $user->id)->count();

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
                $observacion = $MathOctavo && $MathOctavo->ObservationmathPO !== 'Sin Observacion'
                    ? explode(' - ', $MathOctavo->ObservationmathPO)
                    : null;

                $observacion2 = $MathOctavo && $MathOctavo->ObservationmathPO2 !== 'Sin Observacion'
                    ? explode(' - ', $MathOctavo->ObservationmathPO2)
                    : null;

                $observacion3 = $MathOctavo && $MathOctavo->ObservationmathPO3 !== 'Sin Observacion'
                    ? explode(' - ', $MathOctavo->ObservationmathPO3)
                    : null;

                $observacion4 = $MathOctavo && $MathOctavo->ObservationmathPO4 !== 'Sin Observacion'
                    ? explode(' - ', $MathOctavo->ObservationmathPO4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $MathOctavo->update([
                    'averagePO' => $promedio,
                    'attemptsPO' => $cantidadDeVeces,
                    'correctPO' => $cantidadRespuestasBuenas,
                    'incorrectPO' => $cantidadRespuestasMalas,
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
                    'mathP01' => null,
                    'mathP02' => null,
                    'mathP03' => null,
                    'mathP04' => null,
                    'mathP05' => null,
                    'mathP06' => null,
                    'mathP07' => null,
                    'mathP08' => null,
                    'mathP09' => null,
                    'mathP010' => null,
                ];
            }

        }

        return view("home.table.math.math8", compact('promedioData', 'users'));
    }

    public function table_math9(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathNoveno');

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
            $MathNoveno = MathNoveno::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($MathNoveno !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($MathNoveno->toArray())->only([
                    'mathPNO1',
                    'mathPNO2',
                    'mathPNO3',
                    'mathPNO4',
                    'mathPNO5',
                    'mathPNO6',
                    'mathPNO7',
                    'mathPNO8',
                    'mathPNO9',
                    'mathPNO10',
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

                $cantidadDeVeces = MathNoveno::where('user_id', $user->id)->count();

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
                $observacion = $MathNoveno && $MathNoveno->ObservationmathPNO !== 'Sin Observacion'
                    ? explode(' - ', $MathNoveno->ObservationmathPNO)
                    : null;

                $observacion2 = $MathNoveno && $MathNoveno->ObservationmathPNO2 !== 'Sin Observacion'
                    ? explode(' - ', $MathNoveno->ObservationmathPNO2)
                    : null;

                $observacion3 = $MathNoveno && $MathNoveno->ObservationmathPNO3 !== 'Sin Observacion'
                    ? explode(' - ', $MathNoveno->ObservationmathPNO3)
                    : null;

                $observacion4 = $MathNoveno && $MathNoveno->ObservationmathPNO4 !== 'Sin Observacion'
                    ? explode(' - ', $MathNoveno->ObservationmathPNO4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $MathNoveno->update([
                    'averagePNO' => $promedio,
                    'attemptsPNO' => $cantidadDeVeces,
                    'correctPNO' => $cantidadRespuestasBuenas,
                    'incorrectPNO' => $cantidadRespuestasMalas,
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
                    'mathPNO1' => null,
                    'mathPNO2' => null,
                    'mathPNO3' => null,
                    'mathPNO4' => null,
                    'mathPNO5' => null,
                    'mathPNO6' => null,
                    'mathPNO7' => null,
                    'mathPNO8' => null,
                    'mathPNO9' => null,
                    'mathPNO10' => null,
                ];
            }

        }

        return view("home.table.math.math9", compact('promedioData', 'users'));
    }

    public function table_math10(Request $request)
    {
        $estudianteRole = Role::where('name', 'Aspirante')->first();
        $query = $estudianteRole->users()
            ->whereHas('mathDecimo');

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

            $MathDecimo = MathDecimo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($MathDecimo !== null) {
                // Si $mathQuinto no es null, obtenemos las respuestas
                $respuestas = collect($MathDecimo->toArray())->only([
                    'mathPD1',
                    'mathPD2',
                    'mathPD3',
                    'mathPD4',
                    'mathPD5',
                    'mathPD6',
                    'mathPD7',
                    'mathPD8',
                    'mathPD9',
                    'mathPD10',
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

                $cantidadDeVeces = MathDecimo::where('user_id', $user->id)->count();

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
                $observacion = $MathDecimo && $MathDecimo->ObservationmathPD !== 'Sin Observacion'
                    ? explode(' - ', $MathDecimo->ObservationmathPD)
                    : null;

                $observacion2 = $MathDecimo && $MathDecimo->ObservationmathPD2 !== 'Sin Observacion'
                    ? explode(' - ', $MathDecimo->ObservationmathPD2)
                    : null;

                $observacion3 = $MathDecimo && $MathDecimo->ObservationmathPD3 !== 'Sin Observacion'
                    ? explode(' - ', $MathDecimo->ObservationmathPD3)
                    : null;

                $observacion4 = $MathDecimo && $MathDecimo->ObservationmathPD4 !== 'Sin Observacion'
                    ? explode(' - ', $MathDecimo->ObservationmathPD4)
                    : null;

                $observacionPredeterminadaPresente = $observacion === null;
                $observacionPredeterminadaPresente2 = $observacion2 === null;
                $observacionPredeterminadaPresente3 = $observacion3 === null;
                $observacionPredeterminadaPresente4 = $observacion4 === null;

                $MathDecimo->update([
                    'averagePD' => $promedio,
                    'attemptsPD' => $cantidadDeVeces,
                    'correctPD' => $cantidadRespuestasBuenas,
                    'incorrectPD' => $cantidadRespuestasMalas,
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
                    'mathPD1' => null,
                    'mathPD2' => null,
                    'mathPD3' => null,
                    'mathPD4' => null,
                    'mathPD5' => null,
                    'mathPD6' => null,
                    'mathPD7' => null,
                    'mathPD8' => null,
                    'mathPD9' => null,
                    'mathPD10' => null,
                ];
            }
        }

        return view("home.table.math.math10", compact('promedioData', 'users'));
    }

    public function store_mathCuarto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPC1' => 'required|integer|in:1,5',
            'mathPC2' => 'required|integer|in:1,5',
            'mathPC3' => 'required|integer|in:1,5',
            'mathPC4' => 'required|integer|in:1,5',
            'mathPC5' => 'required|integer|in:1,5',
            'mathPC6' => 'required|integer|in:1,5',
            'mathPC7' => 'required|integer|in:1,5',
            'mathPC8' => 'required|integer|in:1,5',
            'mathPC9' => 'required|integer|in:1,5',
            'mathPC10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        $mathCuarto = new MathCuarto();
        $mathCuarto->user_id = $user_id;
        $mathCuarto->mathPC1 = $request->input('mathPC1');
        $mathCuarto->mathPC2 = $request->input('mathPC2');
        $mathCuarto->mathPC3 = $request->input('mathPC3');
        $mathCuarto->mathPC4 = $request->input('mathPC4');
        $mathCuarto->mathPC5 = $request->input('mathPC5');
        $mathCuarto->mathPC6 = $request->input('mathPC6');
        $mathCuarto->mathPC7 = $request->input('mathPC7');
        $mathCuarto->mathPC8 = $request->input('mathPC8');
        $mathCuarto->mathPC9 = $request->input('mathPC9');
        $mathCuarto->mathPC10 = $request->input('mathPC10');

        $mathCuarto->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math5(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPQ1' => 'required|integer|in:1,5',
            'mathPQ2' => 'required|integer|in:1,5',
            'mathPQ3' => 'required|integer|in:1,5',
            'mathPQ4' => 'required|integer|in:1,5',
            'mathPQ5' => 'required|integer|in:1,5',
            'mathPQ6' => 'required|integer|in:1,5',
            'mathPQ7' => 'required|integer|in:1,5',
            'mathPQ8' => 'required|integer|in:1,5',
            'mathPQ9' => 'required|integer|in:1,5',
            'mathPQ10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        $mathQuinto = new MathQuinto();
        $mathQuinto->user_id = $user_id;
        $mathQuinto->mathPQ1 = $request->input('mathPQ1');
        $mathQuinto->mathPQ2 = $request->input('mathPQ2');
        $mathQuinto->mathPQ3 = $request->input('mathPQ3');
        $mathQuinto->mathPQ4 = $request->input('mathPQ4');
        $mathQuinto->mathPQ5 = $request->input('mathPQ5');
        $mathQuinto->mathPQ6 = $request->input('mathPQ6');
        $mathQuinto->mathPQ7 = $request->input('mathPQ7');
        $mathQuinto->mathPQ8 = $request->input('mathPQ8');
        $mathQuinto->mathPQ9 = $request->input('mathPQ9');
        $mathQuinto->mathPQ10 = $request->input('mathPQ10');

        $mathQuinto->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math6(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPSX1' => 'required|integer|in:1,5',
            'mathPSX2' => 'required|integer|in:1,5',
            'mathPSX3' => 'required|integer|in:1,5',
            'mathPSX4' => 'required|integer|in:1,5',
            'mathPSX5' => 'required|integer|in:1,5',
            'mathPSX6' => 'required|integer|in:1,5',
            'mathPSX7' => 'required|integer|in:1,5',
            'mathPSX8' => 'required|integer|in:1,5',
            'mathPSX9' => 'required|integer|in:1,5',
            'mathPSX10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        // Cambiar el modelo a MathSexto
        $mathSexto = new MathSexto();
        $mathSexto->user_id = $user_id;
        $mathSexto->mathPSX1 = $request->input('mathPSX1');
        $mathSexto->mathPSX2 = $request->input('mathPSX2');
        $mathSexto->mathPSX3 = $request->input('mathPSX3');
        $mathSexto->mathPSX4 = $request->input('mathPSX4');
        $mathSexto->mathPSX5 = $request->input('mathPSX5');
        $mathSexto->mathPSX6 = $request->input('mathPSX6');
        $mathSexto->mathPSX7 = $request->input('mathPSX7');
        $mathSexto->mathPSX8 = $request->input('mathPSX8');
        $mathSexto->mathPSX9 = $request->input('mathPSX9');
        $mathSexto->mathPSX10 = $request->input('mathPSX10');

        $mathSexto->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math7(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPS1' => 'required|integer|in:1,5',
            'mathPS2' => 'required|integer|in:1,5',
            'mathPS3' => 'required|integer|in:1,5',
            'mathPS4' => 'required|integer|in:1,5',
            'mathPS5' => 'required|integer|in:1,5',
            'mathPS6' => 'required|integer|in:1,5',
            'mathPS7' => 'required|integer|in:1,5',
            'mathPS8' => 'required|integer|in:1,5',
            'mathPS9' => 'required|integer|in:1,5',
            'mathPS10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        // Cambiar el modelo a MathSexto
        $mathSeptimo = new MathSeptimo();
        $mathSeptimo->user_id = $user_id;
        $mathSeptimo->mathPS1 = $request->input('mathPS1');
        $mathSeptimo->mathPS2 = $request->input('mathPS2');
        $mathSeptimo->mathPS3 = $request->input('mathPS3');
        $mathSeptimo->mathPS4 = $request->input('mathPS4');
        $mathSeptimo->mathPS5 = $request->input('mathPS5');
        $mathSeptimo->mathPS6 = $request->input('mathPS6');
        $mathSeptimo->mathPS7 = $request->input('mathPS7');
        $mathSeptimo->mathPS8 = $request->input('mathPS8');
        $mathSeptimo->mathPS9 = $request->input('mathPS9');
        $mathSeptimo->mathPS10 = $request->input('mathPS10');

        $mathSeptimo->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math8(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPO1' => 'required|integer|in:1,5',
            'mathPO2' => 'required|integer|in:1,5',
            'mathPO3' => 'required|integer|in:1,5',
            'mathPO4' => 'required|integer|in:1,5',
            'mathPO5' => 'required|integer|in:1,5',
            'mathPO6' => 'required|integer|in:1,5',
            'mathPO7' => 'required|integer|in:1,5',
            'mathPO8' => 'required|integer|in:1,5',
            'mathPO9' => 'required|integer|in:1,5',
            'mathPO10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        // Cambiar el modelo a MathSexto
        $mathOctavo = new MathOctavo();
        $mathOctavo->user_id = $user_id;
        $mathOctavo->mathPO1 = $request->input('mathPO1');
        $mathOctavo->mathPO2 = $request->input('mathPO2');
        $mathOctavo->mathPO3 = $request->input('mathPO3');
        $mathOctavo->mathPO4 = $request->input('mathPO4');
        $mathOctavo->mathPO5 = $request->input('mathPO5');
        $mathOctavo->mathPO6 = $request->input('mathPO6');
        $mathOctavo->mathPO7 = $request->input('mathPO7');
        $mathOctavo->mathPO8 = $request->input('mathPO8');
        $mathOctavo->mathPO9 = $request->input('mathPO9');
        $mathOctavo->mathPO10 = $request->input('mathPO10');

        $mathOctavo->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math9(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPNO1' => 'required|integer|in:1,5',
            'mathPNO2' => 'required|integer|in:1,5',
            'mathPNO3' => 'required|integer|in:1,5',
            'mathPNO4' => 'required|integer|in:1,5',
            'mathPNO5' => 'required|integer|in:1,5',
            'mathPNO6' => 'required|integer|in:1,5',
            'mathPNO7' => 'required|integer|in:1,5',
            'mathPNO8' => 'required|integer|in:1,5',
            'mathPNO9' => 'required|integer|in:1,5',
            'mathPNO10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        // Cambiar el modelo a MathSexto
        $mathNoveno = new MathNoveno();
        $mathNoveno->user_id = $user_id;
        $mathNoveno->mathPNO1 = $request->input('mathPNO1');
        $mathNoveno->mathPNO2 = $request->input('mathPNO2');
        $mathNoveno->mathPNO3 = $request->input('mathPNO3');
        $mathNoveno->mathPNO4 = $request->input('mathPNO4');
        $mathNoveno->mathPNO5 = $request->input('mathPNO5');
        $mathNoveno->mathPNO6 = $request->input('mathPNO6');
        $mathNoveno->mathPNO7 = $request->input('mathPNO7');
        $mathNoveno->mathPNO8 = $request->input('mathPNO8');
        $mathNoveno->mathPNO9 = $request->input('mathPNO9');
        $mathNoveno->mathPNO10 = $request->input('mathPNO10');

        $mathNoveno->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function store_math10(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPD1' => 'required|integer|in:1,5',
            'mathPD2' => 'required|integer|in:1,5',
            'mathPD3' => 'required|integer|in:1,5',
            'mathPD4' => 'required|integer|in:1,5',
            'mathPD5' => 'required|integer|in:1,5',
            'mathPD6' => 'required|integer|in:1,5',
            'mathPD7' => 'required|integer|in:1,5',
            'mathPD8' => 'required|integer|in:1,5',
            'mathPD9' => 'required|integer|in:1,5',
            'mathPD10' => 'required|integer|in:1,5',
        ]);

        $user_id = Auth::id();

        // Cambiar el modelo a MathSexto
        $mathDecimo = new MathDecimo();
        $mathDecimo->user_id = $user_id;
        $mathDecimo->mathPD1 = $request->input('mathPD1');
        $mathDecimo->mathPD2 = $request->input('mathPD2');
        $mathDecimo->mathPD3 = $request->input('mathPD3');
        $mathDecimo->mathPD4 = $request->input('mathPD4');
        $mathDecimo->mathPD5 = $request->input('mathPD5');
        $mathDecimo->mathPD6 = $request->input('mathPD6');
        $mathDecimo->mathPD7 = $request->input('mathPD7');
        $mathDecimo->mathPD8 = $request->input('mathPD8');
        $mathDecimo->mathPD9 = $request->input('mathPD9');
        $mathDecimo->mathPD10 = $request->input('mathPD10');

        $mathDecimo->save();

        return redirect()->back()->with('success', 'Datos almacenados correctamente.');
    }

    public function resetearPuntosMath4()
    {
        MathCuarto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosMath5()
    {
        MathQuinto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosMath6()
    {
        MathSexto::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }

    public function resetearPuntosMath7()
    {
        MathSeptimo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    public function resetearPuntosMath8()
    {
        MathOctavo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    public function resetearPuntosMath9()
    {
        MathNoveno::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    public function resetearPuntosMath10()
    {
        MathDecimo::query()->delete();

        return redirect()->back()->with('success', 'Reseteado la tabla exitosamente');
    }
    //Observaciones de las tablas de cada usuario
    public function saveObservation(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPC;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPC = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        // Puedes agregar lógica adicional aquí, si es necesario

        // Redirige o responde de acuerdo a tus necesidades
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservation2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);

        $mathCuarto = MathCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPC2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPC2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservation3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);

        $mathCuarto = MathCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPC3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPC3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservation4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);

        $mathCuarto = MathCuarto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPC4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPC4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    // math quinto

    public function saveObservationPQ(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathQuinto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPQ;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPQ = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        // Puedes agregar lógica adicional aquí, si es necesario

        // Redirige o responde de acuerdo a tus necesidades
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPQ2(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        $mathCuarto = MathQuinto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPQ2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPQ2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }


    public function saveObservationPQ3(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathQuinto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPQ3;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPQ3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        // Puedes agregar lógica adicional aquí, si es necesario

        // Redirige o responde de acuerdo a tus necesidades
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPQ4(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        $mathCuarto = MathQuinto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPQ4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPQ4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPSX(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathSexto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPSX;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPSX = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        // Puedes agregar lógica adicional aquí, si es necesario

        // Redirige o responde de acuerdo a tus necesidades
        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPSX2(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathSexto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPSX2;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPSX2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPSX3(Request $request, $userId)
    {
        // Validación del formulario si es necesario
        $request->validate([
            'observation' => 'required',
        ]);

        // Obtén el modelo MathCuarto del usuario
        $mathCuarto = MathSexto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            // Obtiene la observación existente
            $existingObservation = $mathCuarto->ObservationmathPSX3;

            // Si la observación existente es igual a "Sin Observaciones", reemplázala
            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            // Verifica si la observación no está vacía antes de agregar
            if (!empty($request->input('observation'))) {
                // Añade la nueva observación separada por guiones
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                // Actualiza el campo ObservationmathPC
                $mathCuarto->ObservationmathPSX3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPSX4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathSexto::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPSX4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPSX4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPS(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathSeptimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPS;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPS = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPS2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathSeptimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPS2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPS2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPS3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathSeptimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPS3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPS3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPS4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathSeptimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPS4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPS4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
//Grado Oactavo
    public function saveObservationPO(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathOctavo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPO;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPO = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPO2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathOctavo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPO2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPO2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPO3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathOctavo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPO3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPO3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPO4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathOctavo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPO4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPO4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPNO(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathNoveno::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPNO;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPNO = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPNO2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathNoveno::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPNO2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPNO2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPNO3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathNoveno::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPNO3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPNO3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPNO4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathNoveno::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPNO4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPNO4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPD(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathDecimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPD;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPD = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPD2(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathDecimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPD2;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPD2 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }
    public function saveObservationPD3(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathDecimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPD3;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPD3 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    public function saveObservationPD4(Request $request, $userId)
    {
        $request->validate([
            'observation' => 'required',
        ]);
        $mathCuarto = MathDecimo::where('user_id', $userId)->first();

        if ($mathCuarto) {
            $existingObservation = $mathCuarto->ObservationmathPD4;

            if ($existingObservation === 'Sin Observacion') {
                $existingObservation = '';
            }

            if (!empty($request->input('observation'))) {
                $newObservation = $existingObservation ? $existingObservation . ' - ' . $request->input('observation') : $request->input('observation');

                $mathCuarto->ObservationmathPD4 = $newObservation;
                $mathCuarto->save();
            } else {
                return redirect()->back()->with('info', 'La observación no puede estar vacía.');
            }
        }

        return redirect()->back()->with('success', 'Observación guardada correctamente.');
    }

    // **************************************** Exportaciones *****************************************************//
    public function exportExcelMath4()
    {
        $fileName = 'MatematicasGrado4.xlsx';
        Excel::store(new Math4Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelMath5()
    {
        $fileName = 'MatematicasGrado5.xlsx';
        Excel::store(new Math5Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelMath6()
    {
        $fileName = 'MatematicasGrado6.xlsx';
        Excel::store(new math6Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelMath7()
    {
        $fileName = 'MatematicasGrado7.xlsx';
        Excel::store(new Math7Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
    public function exportExcelMath8()
    {
        $fileName = 'MatematicasGrado8.xlsx';
        Excel::store(new Math8Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelMath9()
    {
        $fileName = 'MatematicasGrado9.xlsx';
        Excel::store(new Math9Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }

    public function exportExcelMath10()
    {
        $fileName = 'MatematicasGrado10.xlsx';
        Excel::store(new Math10Export, $fileName);

        return response()->download(storage_path('app/' . $fileName));
    }
}

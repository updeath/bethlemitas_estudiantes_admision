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
use Illuminate\Support\Facades\Mail;
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
use Illuminate\Support\Facades\Log;

class MathController extends Controller
{
    public function index_math4()
    {
        $user = Auth::user();
        $hasRecord = MathCuarto::where('user_id', $user->id)->exists();
        return view("home.forms.math.math4", compact('hasRecord'));
    }

    public function index_math5()
    {
        $user = Auth::user();
        $hasRecord = MathQuinto::where('user_id', $user->id)->exists();
        return view("home.forms.math.math5", compact('hasRecord'));
    }

    public function index_math6()
    {
        $user = Auth::user();
        $hasRecord = MathSexto::where('user_id', $user->id)->exists();
        return view("home.forms.math.math6", compact('hasRecord'));
    }

    public function index_math7()
    {
        $user = Auth::user();
        $hasRecord = MathSeptimo::where('user_id', $user->id)->exists();
        return view("home.forms.math.math7", compact('hasRecord'));
    }

    public function index_math8()
    {
        $user = Auth::user();
        $hasRecord = MathOctavo::where('user_id', $user->id)->exists();
        return view("home.forms.math.math8", compact('hasRecord'));
    }

    public function index_math9()
    {
        $user = Auth::user();
        $hasRecord = MathNoveno::where('user_id', $user->id)->exists();
        return view("home.forms.math.math9", compact('hasRecord'));
    }


    public function index_math10()
    {
        $user = Auth::user();
        $hasRecord = MathDecimo::where('user_id', $user->id)->exists();
        return view("home.forms.math.math10", compact('hasRecord'));
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
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }

        // Paginar los resultados con un máximo de 10 elementos por página
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];

        foreach ($users as $user) {

            $mathCuarto = MathCuarto::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathCuarto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathCuarto->mathPC1,
                    $mathCuarto->mathPC2,
                    $mathCuarto->mathPC3,
                    $mathCuarto->mathPC4,
                    $mathCuarto->mathPC5,
                    $mathCuarto->mathPC6,
                    $mathCuarto->mathPC7,
                    $mathCuarto->mathPC8,
                    $mathCuarto->mathPC9,
                    $mathCuarto->mathPC10,
                ];
    
                $respuestasCorrectas = [
                    'D. 90 minutos', //1
                    'C. 100', //2
                    'D', //3
                    'A. 7, 9, 12', //4
                    'D. 110 cm', // 5
                    'C', // 6
                    'C. 11',  // 7
                    'D. 18',  //8
                    'D. 100 metros', // 9
                    'C', // 10
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
    
                $cantidadDeVeces = MathCuarto::where('user_id', $user->id)->count();
    
                $mathCuarto->update([
                    'average' => $sumaPromedio,
                    'attempts' => $cantidadDeVeces,
                    'correct' => $cantidadRespuestasCorrectas,
                    'incorrect' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
                ];
            }
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

            $mathQuinto = MathQuinto::where('user_id', $user->id)->first();

            if ($mathQuinto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathQuinto->mathPQ1,
                    $mathQuinto->mathPQ2,
                    $mathQuinto->mathPQ3,
                    $mathQuinto->mathPQ4,
                    $mathQuinto->mathPQ5,
                    $mathQuinto->mathPQ6,
                    $mathQuinto->mathPQ7,
                    $mathQuinto->mathPQ8,
                    $mathQuinto->mathPQ9,
                    $mathQuinto->mathPQ10,
                ];
    
                $respuestasCorrectas = [
                    'D. 90.324', //1
                    'C. Cuatrocientos cincuenta y siete mil ciento cuarenta y cinco', //2
                    'D. 723.824.317', //3
                    'A. 17550', //4
                    'B. 5/8', // 5
                    'B. 120 minutos', // 6
                    'A. Es la suma de la longitud de todos los lados.',  // 7
                    'B. 5',  //8
                    'C. 20, 24, 28', // 9
                    'A. 96 frascos', // 10
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
    
                $cantidadDeVeces = MathQuinto::where('user_id', $user->id)->count();
    
                $mathQuinto->update([
                    'averagePQ' => $sumaPromedio,
                    'attemptsPQ' => $cantidadDeVeces,
                    'correctPQ' => $cantidadRespuestasCorrectas,
                    'incorrectPQ' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
                ];
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

            $mathSexto = MathSexto::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathSexto !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathSexto->mathPSX1,
                    $mathSexto->mathPSX2,
                    $mathSexto->mathPSX3,
                    $mathSexto->mathPSX4,
                    $mathSexto->mathPSX5,
                    $mathSexto->mathPSX6,
                    $mathSexto->mathPSX7,
                    $mathSexto->mathPSX8,
                    $mathSexto->mathPSX9,
                    $mathSexto->mathPSX10,
                ];
    
                $respuestasCorrectas = [
                    'D. Hay 65 paquetes.', //1
                    'B. 6X', //2
                    'A. La variable', //3
                    'C. El numero de pastelillos por caja', //4
                    'C. 504 Litros', // 5
                    'D. 334', // 6
                    'A. 7',  // 7
                    'Opción 3',  //8
                    'D. 3', // 9
                    'D. 10/6', // 10
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
    
                $cantidadDeVeces = MathSexto::where('user_id', $user->id)->count();
    
                $mathSexto->update([
                    'averagePSX' => $sumaPromedio,
                    'attemptsPSX' => $cantidadDeVeces,
                    'correctPSX' => $cantidadRespuestasCorrectas,
                    'incorrectPSX' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
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
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];

        foreach ($users as $user) {

            $mathSeptimo = mathSeptimo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathSeptimo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathSeptimo->mathPS1,
                    $mathSeptimo->mathPS2,
                    $mathSeptimo->mathPS3,
                    $mathSeptimo->mathPS4,
                    $mathSeptimo->mathPS5,
                    $mathSeptimo->mathPS6,
                    $mathSeptimo->mathPS7,
                    $mathSeptimo->mathPS8,
                    $mathSeptimo->mathPS9,
                    $mathSeptimo->mathPS10,
                ];
    
                $respuestasCorrectas = [
                    'B. 286.312', //1
                    'A. 47', //2
                    'C. 76', //3
                    'D. 0,1256 km', //4
                    'B. 20 cm', // 5
                    'C. 3 cm', // 6
                    'B. 16',  // 7
                    'C. 22 estudiantes',  //8
                    'D. 1/3', // 9
                    'Opción 2', // 10
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
    
                $cantidadDeVeces = MathSeptimo::where('user_id', $user->id)->count();
    
                $mathSeptimo->update([
                    'averagePS' => $sumaPromedio,
                    'attemptsPS' => $cantidadDeVeces,
                    'correctPS' => $cantidadRespuestasCorrectas,
                    'incorrectPS' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
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
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];

        foreach ($users as $user) {

            $mathOctavo = MathOctavo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathOctavo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathOctavo->mathPO1,
                    $mathOctavo->mathPO2,
                    $mathOctavo->mathPO3,
                    $mathOctavo->mathPO4,
                    $mathOctavo->mathPO5,
                    $mathOctavo->mathPO6,
                    $mathOctavo->mathPO7,
                    $mathOctavo->mathPO8,
                    $mathOctavo->mathPO9,
                    $mathOctavo->mathPO10,
                ];
    
                $respuestasCorrectas = [
                    'C. 5/3', //1
                    'B. 125/8', //2
                    'C. Cualitativa', //3
                    'C. 1296', //4
                    'D. 12', // 5
                    'C. La longitud', // 6
                    'B. 6 metros cuadrados',  // 7
                    'A. Chocolate',  //8
                    'A. 5x + 8x = 650.000', // 9
                    'A. $50.000', // 10
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
    
                $cantidadDeVeces = MathOctavo::where('user_id', $user->id)->count();
    
                $mathOctavo->update([
                    'averagePO' => $sumaPromedio,
                    'attemptsPO' => $cantidadDeVeces,
                    'correctPO' => $cantidadRespuestasCorrectas,
                    'incorrectPO' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
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
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];

        foreach ($users as $user) {
            $mathNoveno = MathNoveno::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathNoveno !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathNoveno->mathPNO1,
                    $mathNoveno->mathPNO2,
                    $mathNoveno->mathPNO3,
                    $mathNoveno->mathPNO4,
                    $mathNoveno->mathPNO5,
                    $mathNoveno->mathPNO6,
                    $mathNoveno->mathPNO7,
                    $mathNoveno->mathPNO8,
                    $mathNoveno->mathPNO9,
                    $mathNoveno->mathPNO10,
                ];
    
                $respuestasCorrectas = [
                    'D. 32', //1
                    'A. x = 3', //2
                    'Opción 3', //3
                    'Opción 2', //4
                    'C. Daniel reprobó matemáticas, pues la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3,2.', // 5
                    'Opción 4', // 6
                    'Opción 2',  // 7
                    'Opción 4',  //8
                    'Opción 4', // 9
                    'B. 5 años', // 10
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
    
                $cantidadDeVeces = MathNoveno::where('user_id', $user->id)->count();
    
                $mathNoveno->update([
                    'averagePNO' => $sumaPromedio,
                    'attemptsPNO' => $cantidadDeVeces,
                    'correctPNO' => $cantidadRespuestasCorrectas,
                    'incorrectPNO' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
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
                    ->orWhere('number_documment', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhereRaw("CONCAT(name, ' ', last_name) LIKE ?", ['%' . $searchTerm . '%']);
            });
        }
        $users = $query->orderBy('name', 'asc')
                       ->orderBy('last_name', 'asc')
                       ->paginate(10);

        $promedioData = [];

        foreach ($users as $user) {

            $mathDecimo = MathDecimo::where('user_id', $user->id)->first();
            // Obtener todas las respuestas de las columnas mathPC1, mathPC2, ..., mathPC10

            if ($mathDecimo !== null) {

                $sumaPromedio = 0;
                $cantidadRespuestasCorrectas = 0;
                $cantidadRespuestasIncorrectas = 0;
    
                $respuestas = [
                    $mathDecimo->mathPD1,
                    $mathDecimo->mathPD2,
                    $mathDecimo->mathPD3,
                    $mathDecimo->mathPD4,
                    $mathDecimo->mathPD5,
                    $mathDecimo->mathPD6,
                    $mathDecimo->mathPD7,
                    $mathDecimo->mathPD8,
                    $mathDecimo->mathPD9,
                    $mathDecimo->mathPD10,
                ];
    
                $respuestasCorrectas = [
                    'D. 32', //1
                    'B. 125/8', //2
                    'C. Cualitativa', //3
                    'B. 5,66', //4
                    'C. La longitud', // 5
                    'C. Daniel reprobó matemáticas porque la suma de sus calificaciones da como resultado 16 y si dividimos entre 5 da como resultado 3.2.', // 6
                    'B. 6 metros cuadrados',  // 7
                    'A. Chocolate',  //8
                    'D. 5x + 8x = 650.000', // 9
                    'A. $50.000', // 10
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
    
                $cantidadDeVeces = MathDecimo::where('user_id', $user->id)->count();
    
                $mathDecimo->update([
                    'averagePD' => $sumaPromedio,
                    'attemptsPD' => $cantidadDeVeces,
                    'correctPD' => $cantidadRespuestasCorrectas,
                    'incorrectPD' => $cantidadRespuestasIncorrectas,
                ]);
    
                $promedioData[] = [
                    'id' => $user->id,
                    'user' => $user,
                    'promedio' => $sumaPromedio,
                    'cantidadRespuestasBuenas' => $cantidadRespuestasCorrectas,
                    'cantidadRespuestasMalas' => $cantidadRespuestasIncorrectas,
                    'cantidadDeVeces' => $cantidadDeVeces,
                ];
            }
        }

        return view("home.table.math.math10", compact('promedioData', 'users'));
    }

    public function store_mathCuarto(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPC1' => 'required|string',
            'mathPC2' => 'required|string',
            'mathPC3' => 'required|string',
            'mathPC4' => 'required|string',
            'mathPC5' => 'required|string',
            'mathPC6' => 'required|string',
            'mathPC7' => 'required|string',
            'mathPC8' => 'required|string',
            'mathPC9' => 'required|string',
            'mathPC10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathCuarto::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%4°%')
                            ->where('asignature', 'math')
                            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
                $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();
            
            foreach ($emails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            foreach ($otherEmails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math5(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPQ1' => 'required|string',
            'mathPQ2' => 'required|string',
            'mathPQ3' => 'required|string',
            'mathPQ4' => 'required|string',
            'mathPQ5' => 'required|string',
            'mathPQ6' => 'required|string',
            'mathPQ7' => 'required|string',
            'mathPQ8' => 'required|string',
            'mathPQ9' => 'required|string',
            'mathPQ10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathQuinto::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%5°%')
                            ->where('asignature', 'math')
                            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
                $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();
            
            foreach ($emails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            foreach ($otherEmails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            // // Registrar el valor de $userId para depuración
            // Log::info('Valor de $userId: ' . $userId);
            // // Puedes realizar más validaciones y procesamiento aquí si es necesario
            // // Retornar una respuesta JSON con el userId
            // return response()->json(['userId' => $userId]);

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math6(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPSX1' => 'required|string',
            'mathPSX2' => 'required|string',
            'mathPSX3' => 'required|string',
            'mathPSX4' => 'required|string',
            'mathPSX5' => 'required|string',
            'mathPSX6' => 'required|string',
            'mathPSX7' => 'required|string',
            'mathPSX8' => 'required|string',
            'mathPSX9' => 'required|string',
            'mathPSX10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathSexto::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%6°%')
                            ->where('asignature', 'math')
                            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
                $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();
            
            foreach ($emails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            foreach ($otherEmails as $user) {
                Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                    $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                        ->to($user->email)
                        ->subject('Nuevo concepto asignado');
                });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math7(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPS1' => 'required|string',
            'mathPS2' => 'required|string',
            'mathPS3' => 'required|string',
            'mathPS4' => 'required|string',
            'mathPS5' => 'required|string',
            'mathPS6' => 'required|string',
            'mathPS7' => 'required|string',
            'mathPS8' => 'required|string',
            'mathPS9' => 'required|string',
            'mathPS10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathSeptimo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%7°%')
            ->where('asignature', 'math')
            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
            $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();

            foreach ($emails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            foreach ($otherEmails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math8(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPO1' => 'required|string',
            'mathPO2' => 'required|string',
            'mathPO3' => 'required|string',
            'mathPO4' => 'required|string',
            'mathPO5' => 'required|string',
            'mathPO6' => 'required|string',
            'mathPO7' => 'required|string',
            'mathPO8' => 'required|string',
            'mathPO9' => 'required|string',
            'mathPO10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathOctavo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%8°%')
            ->where('asignature', 'math')
            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
            $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();

            foreach ($emails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            foreach ($otherEmails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math9(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPNO1' => 'required|string',
            'mathPNO2' => 'required|string',
            'mathPNO3' => 'required|string',
            'mathPNO4' => 'required|string',
            'mathPNO5' => 'required|string',
            'mathPNO6' => 'required|string',
            'mathPNO7' => 'required|string',
            'mathPNO8' => 'required|string',
            'mathPNO9' => 'required|string',
            'mathPNO10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathNoveno::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%9°%')
            ->where('asignature', 'math')
            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
            $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();

            foreach ($emails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            foreach ($otherEmails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
    }

    public function store_math10(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'mathPD1' => 'required|string',
            'mathPD2' => 'required|string',
            'mathPD3' => 'required|string',
            'mathPD4' => 'required|string',
            'mathPD5' => 'required|string',
            'mathPD6' => 'required|string',
            'mathPD7' => 'required|string',
            'mathPD8' => 'required|string',
            'mathPD9' => 'required|string',
            'mathPD10' => 'required|string',
        ]);

        $user_id = Auth::id();
        $existingRecord = MathDecimo::where('user_id', $user_id)->first();

        if ($existingRecord) {
            return redirect()->back()->with('error', 'El cuestionario ya ha sido resuelto');
        }else {

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

            $emails = User::where('load_degrees', 'LIKE', '%10°%')
            ->where('asignature', 'math')
            ->get();

            $otherEmails = User::whereHas('roles', function ($query) {
            $query->where('roles.name', ['CoordinadorAcademico']);
            })
            ->get();

            foreach ($emails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            foreach ($otherEmails as $user) {
            Mail::send('auth.notificationEmails', [], function ($message) use ($user) {
                $message->from('soporte.tecnico@bethlemitaspereira.edu.co', 'Bethlemitas')
                    ->to($user->email)
                    ->subject('Nuevo concepto asignado');
            });
            }

            return redirect()->back()->with('success', 'Datos almacenados correctamente.');
        }
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

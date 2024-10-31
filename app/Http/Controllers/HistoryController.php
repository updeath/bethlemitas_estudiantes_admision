<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MathCuarto;
use App\Models\MathQuinto;
use App\Models\SpanishCuarto;
use App\Models\User;

class HistoryController extends Controller
{
    // *************** Funciones del historial de matematicas ********************** //
    // 4°
    // Mostrar historial de las pruebas de grado 4 segun el aspirante seleccionado.
    public function historyMathCuarto(string $id) {
        $pruebas = MathCuarto::where('user_id', $id)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $user = User::find($id);

        return view('history.math.history4', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathCuarto($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathCuartos = MathCuarto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathCuarto", compact('mathCuartos'));
    }

    //5°
    // Mostrar historial de las pruebas de grado 5 segun el aspirante seleccionado.
    public function historyMathQuinto(string $id) {
        $pruebas = MathQuinto::where('user_id', $id)
                                ->orderBy('created_at', 'desc')
                                ->get();
        $user = User::find($id);

        return view('history.math.history5', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathQuinto($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathQuintos = MathQuinto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathQuinto", compact('mathQuintos'));
    }


    // ************************** Funciones del historial de español ************************ //
    // Mostrar historial de las pruebas de grado 4 segun el aspirante seleccionado.
    public function historySpanishCuarto(string $id) {
        $pruebas = SpanishCuarto::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish4', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishCuarto($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishCuartos = SpanishCuarto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishCuarto", compact('spanishCuartos'));
    }
}

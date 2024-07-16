<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MathSexto;
use App\Models\MathDecimo;
use App\Models\MathCuarto;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class AnswerController extends Controller
{

    public function answerMathCuarto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathCuartos = MathCuarto::where('user_id', $userId)->get();
        $user = User::find($userId);

        //pasamos los datos a la vista
        return view("answers.answerMathCuarto", compact('mathCuartos', 'user'));
    }

    public function answerMathSexto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathSextos = MathSexto::where('user_id', $userId)->get();
        $user = User::find($userId);

        //pasamos los datos a la vista
        return view("answers.answerMathSexto", compact('mathSextos', 'user'));
    }
    public function answerMathDecimo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathDecimos = MathDecimo::where('user_id', $userId)->get();
        $user = User::find($userId);

        //pasamos los datos a la vista
        return view("answers.answerMathDecimo", compact('mathDecimos', 'user'));
    }
}

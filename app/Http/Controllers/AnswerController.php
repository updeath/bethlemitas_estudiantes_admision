<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MathSexto;
use App\Models\MathCuarto;
use App\Models\MathQuinto;
use App\Models\MathSeptimo;
use App\Models\MathOctavo;
use App\Models\MathNoveno;
use App\Models\MathDecimo;
use App\Models\SpanishCuarto;
use App\Models\SpanishQuinto;
use App\Models\SpanishSexto;
use App\Models\SpanishSeptimo;
use App\Models\SpanishOctavo;
use App\Models\SpanishNoveno;
use App\Models\SpanishDecimo;
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
        $mathCuartos = MathCuarto::where('user_id', $userId)
                                 ->where('state', 'activo')->get();

        //pasamos los datos a la vista
        return view("answers.answerMathCuarto", compact('mathCuartos'));
    }

    public function answerMathQuinto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathQuintos = MathQuinto::where('user_id', $userId)
                                 ->where('state', 'activo')
                                 ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathQuinto", compact('mathQuintos'));
    }

    public function answerMathSexto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathSextos = MathSexto::where('user_id', $userId)
                                ->where('state', 'activo')
                                ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathSexto", compact('mathSextos'));
    }

    public function answerMathSeptimo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathSeptimos = MathSeptimo::where('user_id', $userId)
                                    ->where('state', 'activo')
                                    ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathSeptimo", compact('mathSeptimos'));
    }

    public function answerMathOctavo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathOctavos = MathOctavo::where('user_id', $userId)
                                 ->where('state', 'activo')
                                 ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathOctavo", compact('mathOctavos'));
    }

    public function answerMathNoveno($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathNovenos = MathNoveno::where('user_id', $userId)
                                 ->where('state', 'activo')
                                 ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathNoveno", compact('mathNovenos'));
    }

    public function answerMathDecimo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathDecimos = MathDecimo::where('user_id', $userId)
                                 ->where('state', 'activo')
                                 ->get();

        //pasamos los datos a la vista
        return view("answers.answerMathDecimo", compact('mathDecimos'));
    }

    // Controller respuesta español
    public function answerSpanishCuarto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishCuartos = SpanishCuarto::where('user_id', $userId)
                                        ->where('state', 'activo')
                                        ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishCuarto", compact('spanishCuartos'));
    }

    public function answerSpanishQuinto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishQuintos = SpanishQuinto::where('user_id', $userId)
                                        ->where('state', 'activo')
                                        ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishQuinto", compact('spanishQuintos'));
    }

    public function answerSpanishSexto($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishSextos = SpanishSexto::where('user_id', $userId)
                                     ->where('state', 'activo')
                                     ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishSexto", compact('spanishSextos'));
    }

    public function answerSpanishSeptimo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishSeptimos = SpanishSeptimo::where('user_id', $userId)
                                         ->where('state', 'activo')
                                         ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishSeptimo", compact('spanishSeptimos'));
    }

    public function answerSpanishOctavo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishOctavos = SpanishOctavo::where('user_id', $userId)
                                        ->where('state', 'activo')
                                        ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishOctavo", compact('spanishOctavos'));
    }

    public function answerSpanishNoveno($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishNovenos = SpanishNoveno::where('user_id', $userId)
                                        ->where('state', 'activo')
                                        ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishNoveno", compact('spanishNovenos'));
    }

    public function answerSpanishDecimo($userId) {

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $spanishDecimos = SpanishDecimo::where('user_id', $userId)
                                        ->where('state', 'activo')
                                        ->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishDecimo", compact('spanishDecimos'));
    }
}

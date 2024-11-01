<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MathCuarto;
use App\Models\MathQuinto;
use App\Models\MathSexto;
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

    //6°
    // Mostrar historial de las pruebas de grado 6 segun el aspirante seleccionado.
    public function historyMathSexto(string $id) {
        $pruebas = MathSexto::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $user = User::find($id);

        return view('history.math.history6', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathSexto($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathSextos = MathSexto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathSexto", compact('mathSextos'));
    }

    //7°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historyMathSeptimo(string $id) {
        $pruebas = MathSeptimo::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $user = User::find($id);

        return view('history.math.history7', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathSeptimo($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathSeptimos = MathSeptimo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathSeptimo", compact('mathSeptimos'));
    }

    //8°
    // Mostrar historial de las pruebas de grado 8 segun el aspirante seleccionado.
    public function historyMathOctavo(string $id) {
        $pruebas = MathOctavo::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $user = User::find($id);

        return view('history.math.history8', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathOctavo($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathOctavos = MathOctavo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathOctavo", compact('mathOctavos'));
    }  
    
    //9°
    // Mostrar historial de las pruebas de grado 9 segun el aspirante seleccionado.
    public function historyMathNoveno(string $id) {
        $pruebas = MathNoveno::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $user = User::find($id);

        return view('history.math.history9', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathNoveno($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathNovenos = MathNoveno::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathNoveno", compact('mathNovenos'));
    }

    //10°
    // Mostrar historial de las pruebas de grado 10 segun el aspirante seleccionado.
    public function historyMathDecimo(string $id) {
        $pruebas = MathDecimo::where('user_id', $id)
                ->orderBy('created_at', 'desc')
                ->get();
        $user = User::find($id);

        return view('history.math.history10', compact('pruebas', 'user'));
    }
    // Mostrar la pruba de matematicas del historial selecionado
    public function answerHistoryMathDecimo($userId) { // 

        // // Registrar el valor de $userId para depuración
        // Log::info('Valor de $userId: ' . $userId);
        // // Mostrar temporalmente el valor de $userId en la interfaz de usuario
        // return response()->json(['userId' => $userId]);
        
        //consultar todos los datos de la tabla math_decimos
        $mathDecimos = MathDecimo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerMathDecimo", compact('mathDecimos'));
    }



    // ************************** Funciones del historial de español ************************ //
    //4°
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

    //5°
    // Mostrar historial de las pruebas de grado 5 segun el aspirante seleccionado.
    public function historySpanishQuinto(string $id) {
        $pruebas = SpanishQuinto::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish5', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishQuinto($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishQuintos = SpanishQuinto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishQuinto", compact('spanishQuintos'));
    }

    //6°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historySpanishSexto(string $id) {
        $pruebas = SpanishSexto::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish6', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishSexto($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishSextos = SpanishSexto::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishSexto", compact('spanishSextos'));
    }

    //7°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historySpanishSeptimo(string $id) {
        $pruebas = SpanishSeptimo::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish7', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishSeptimo($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishSeptimos = SpanishSeptimo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishSeptimo", compact('spanishSeptimos'));
    }

    //8°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historySpanishOctavo(string $id) {
        $pruebas = SpanishOctavo::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish8', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishOctavo($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishOctavos = SpanishOctavo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishOctavo", compact('spanishOctavos'));
    }

    //9°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historySpanishNoveno(string $id) {
        $pruebas = SpanishNoveno::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish9', compact('pruebas', 'user'));
    }

     // Mostrar la pruba de español del historial selecionado
     public function answerHistorySpanishNoveno($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishNovenos = SpanishNoveno::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishNoveno", compact('spanishNovenos'));
    }

    //10°
    // Mostrar historial de las pruebas de grado 7 segun el aspirante seleccionado.
    public function historySpanishDecimo(string $id) {
        $pruebas = SpanishDecimo::where('user_id', $id)
                                    ->orderBy('created_at', 'desc')
                                    ->get();
        $user = User::find($id);

        return view('history.spanish.historySpanish10', compact('pruebas', 'user'));
    }

    // Mostrar la pruba de español del historial selecionado
    public function answerHistorySpanishDecimo($userId) {

        //consultar todos los datos de la tabla math_decimos
        $spanishDecimos = SpanishDecimo::where('id', $userId)->get();

        //pasamos los datos a la vista
        return view("answers.answerSpanishDecimo", compact('spanishDecimos'));
    }
}

<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\PreventBackHistory as PreventBackHistoryMiddleware;
use App\Http\Controllers\MathController;
use App\Http\Controllers\SpanishController;
use App\Http\Controllers\EnglishController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ConceptController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('/')->group(function () {
    // Rutas para el login
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/Forgot_password', [AuthController::class, 'forgotpassword'])->name('forgotpassword');
    Route::get('/resetPassword/{token}', [AuthController::class, 'resetPassword']);
    Route::put('/resetPassword', [AuthController::class, 'updatePassword'])->name('updatePassword');
    Route::post('verify_email', [AuthController::class, 'verifyEmail'])->name('verifyEmail');

});

Route::middleware(['web', 'setLanguage', 'auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('home.StartPage');
    })->name('dashboard');

    Route::get('/dashboard2', [AuthController::class, 'StartPage'])->name('start');


    //Perfil
    Route::get('/profile', [UserController::class, 'index_profile'])->name('index_profile');
    Route::put('/profile/edit', [UserController::class, 'profile_update'])->name('profile.update');


    //Usuarios
    Route::get('/create_User', [UserController::class, 'index_create_user'])->name('create_user');
    Route::get('/listing_user', [UserController::class, 'index_listing_user'])->name('listingUser');
    Route::post('/store', [UserController::class, 'store'])->name('user.store');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('/table_students', [UserController::class, 'index_students'])->name('user.tableStudents');
    Route::get('/export-user-excel', [UserController::class, 'exportExcel'])->name('exportar.usuarios.excel');
    Route::get('/export-user-excel-Users', [UserController::class, 'exportExcelUsers'])->name('exportar.usuarios');


    // --------------------------------- Matematicas ------------------------------------------------


    // vistas de formularios de matematicas
    Route::get('/create_form_math4', [MathController::class, 'index_math4'])->name('form.create.math4');
    Route::get('/create_form_math5', [MathController::class, 'index_math5'])->name('form.create.math5');
    Route::get('/create_form_math6', [MathController::class, 'index_math6'])->name('form.create.math6');
    Route::get('/create_form_math7', [MathController::class, 'index_math7'])->name('form.create.math7');
    Route::get('/create_form_math8', [MathController::class, 'index_math8'])->name('form.create.math8');
    Route::get('/create_form_math9', [MathController::class, 'index_math9'])->name('form.create.math9');
    Route::get('/create_form_math10', [MathController::class, 'index_math10'])->name('form.create.math10');

    // validaciones de campos
    Route::post('/store_MathCuarto', [MathController::class, 'store_mathCuarto'])->name('store.mathCuarto');
    Route::post('/store_mathQuinto', [MathController::class, 'store_math5'])->name('store.math5');
    Route::post('/store_mathSextos', [MathController::class, 'store_math6'])->name('store.math6');
    Route::post('/store_mathSeptimos', [MathController::class, 'store_math7'])->name('store.math7');
    Route::post('/store_mathOctavos', [MathController::class, 'store_math8'])->name('store.math8');
    Route::post('/store_mathNoveno', [MathController::class, 'store_math9'])->name('store.math9');
    Route::post('/store_mathDecimo', [MathController::class, 'store_math10'])->name('store.math10');


    // tablas de matematicas

    Route::get('/board_math4', [MathController::class, 'table_math4'])->name('table.math4');
    Route::get('/board_math5', [MathController::class, 'table_math5'])->name('table.math5');
    Route::get('/board_math6', [MathController::class, 'table_math6'])->name('table.math6');
    Route::get('/board_math7', [MathController::class, 'table_math7'])->name('table.math7');
    Route::get('/board_math8', [MathController::class, 'table_math8'])->name('table.math8');
    Route::get('/board_math9', [MathController::class, 'table_math9'])->name('table.math9');
    Route::get('/board_math10', [MathController::class, 'table_math10'])->name('table.math10');


    // Resetear tablas
    Route::post('/reset_points_math4', [MathController::class, 'resetearPuntosMath4'])->name('reset.math4');
    Route::post('/reset_points_math5', [MathController::class, 'resetearPuntosMath5'])->name('reset.math5');
    Route::post('/reset_points_math6', [MathController::class, 'resetearPuntosMath6'])->name('reset.math6');
    Route::post('/reset_points_math7', [MathController::class, 'resetearPuntosMath7'])->name('reset.math7');
    Route::post('/reset_points_math8', [MathController::class, 'resetearPuntosMath8'])->name('reset.math8');
    Route::post('/reset_points_math9', [MathController::class, 'resetearPuntosMath9'])->name('reset.math9');
    Route::post('/reset_points_math10', [MathController::class, 'resetearPuntosMath10'])->name('reset.math10');


    // exportaciones de todas las tablas

    Route::get('/export-user-excel-Math4', [MathController::class, 'exportExcelMath4'])->name('exportar.excel.math4');
    Route::get('/export-user-excel-Math5', [MathController::class, 'exportExcelMath5'])->name('exportar.excel.math5');
    Route::get('/export-user-excel-Math6', [MathController::class, 'exportExcelMath6'])->name('exportar.excel.math6');
    Route::get('/export-user-excel-Math7', [MathController::class, 'exportExcelMath7'])->name('exportar.excel.math7');
    Route::get('/export-user-excel-Math8', [MathController::class, 'exportExcelMath8'])->name('exportar.excel.math8');
    Route::get('/export-user-excel-Math9', [MathController::class, 'exportExcelMath9'])->name('exportar.excel.math9');
    Route::get('/export-user-excel-Math10', [MathController::class, 'exportExcelMath10'])->name('exportar.excel.math10');


    // --------------------------------------- Español ---------------------------------------------------------

    // vistas de formularios de español
    Route::get('/create_form_spanish4', [SpanishController::class, 'index_spanish4'])->name('form.create.spanish4');
    Route::get('/create_form_spanish5', [SpanishController::class, 'index_spanish5'])->name('form.create.spanish5');
    Route::get('/create_form_spanish6', [SpanishController::class, 'index_spanish6'])->name('form.create.spanish6');
    Route::get('/create_form_spanish7', [SpanishController::class, 'index_spanish7'])->name('form.create.spanish7');
    Route::get('/create_form_spanish8', [SpanishController::class, 'index_spanish8'])->name('form.create.spanish8');
    Route::get('/create_form_spanish9', [SpanishController::class, 'index_spanish9'])->name('form.create.spanish9');
    Route::get('/create_form_spanish10', [SpanishController::class, 'index_spanish10'])->name('form.create.spanish10');

    // validaciones de Español
    Route::post('/store_SpanishCuarto', [SpanishController::class, 'store_spanish4'])->name('store.spanish4');
    Route::post('/store_SpanishQuinto', [SpanishController::class, 'store_spanish5'])->name('store.spanish5');
    Route::post('/store_SpanishSextos', [SpanishController::class, 'store_spanish6'])->name('store.spanish6');
    Route::post('/store_SpanishSeptimos', [SpanishController::class, 'store_spanish7'])->name('store.spanish7');
    Route::post('/store_SpanishOctavos', [SpanishController::class, 'store_spanish8'])->name('store.spanish8');
    Route::post('/store_SpanishNoveno', [SpanishController::class, 'store_spanish9'])->name('store.spanish9');
    Route::post('/store_SpanishDecimo', [SpanishController::class, 'store_spanish10'])->name('store.spanish10');


    // tablas de Español

    Route::get('/board_spanish4', [SpanishController::class, 'table_spanish4'])->name('tables.spanish4');
    Route::get('/board_spanish5', [SpanishController::class, 'table_spanish5'])->name('tables.spanish5');
    Route::get('/board_spanish6', [SpanishController::class, 'table_spanish6'])->name('tables.spanish6');
    Route::get('/board_spanish7', [SpanishController::class, 'table_spanish7'])->name('tables.spanish7');
    Route::get('/board_spanish8', [SpanishController::class, 'table_spanish8'])->name('tables.spanish8');
    Route::get('/board_spanish9', [SpanishController::class, 'table_spanish9'])->name('tables.spanish9');
    Route::get('/board_spanish10', [SpanishController::class, 'table_spanish10'])->name('tables.spanish10');

    //tabla 2
    Route::get('/board_spanish4Table2', [SpanishController::class, 'table_spanish4Table2'])->name('tables2.spanish4');
    Route::get('/board_spanish5Table2', [SpanishController::class, 'table_spanish5Table2'])->name('tables2.spanish5');
    Route::get('/board_spanish6Table2', [SpanishController::class, 'table_spanish6Table2'])->name('tables2.spanish6');
    Route::get('/board_spanish7Table2', [SpanishController::class, 'table_spanish7Table2'])->name('tables2.spanish7');
    Route::get('/board_spanish8Table2', [SpanishController::class, 'table_spanish8Table2'])->name('tables2.spanish8');


    // Resetear tablas
    Route::post('/reset_points_spanish4', [SpanishController::class, 'resetearPuntosSpanish4'])->name('reset.spanish4');
    Route::post('/reset_points_spanish5', [SpanishController::class, 'resetearPuntosSpanish5'])->name('reset.spanish5');
    Route::post('/reset_points_spanish6', [SpanishController::class, 'resetearPuntosSpanish6'])->name('reset.spanish6');
    Route::post('/reset_points_spanish7', [SpanishController::class, 'resetearPuntosSpanish7'])->name('reset.spanish7');
    Route::post('/reset_points_spanish8', [SpanishController::class, 'resetearPuntosSpanish8'])->name('reset.spanish8');
    Route::post('/reset_points_spanish9', [SpanishController::class, 'resetearPuntosSpanish9'])->name('reset.spanish9');
    Route::post('/reset_points_spanish10', [SpanishController::class, 'resetearPuntosSpanish10'])->name('reset.spanish10');

    // calificaciones de grado 4
    Route::post('/calificar_spanishPC8/{userId}', [SpanishController::class, 'calificarspanishPC8'])->name('calificar.spanishPC8');

    // calificaciones de comentarios de grado 5

    Route::post('/actualizar_spanishPQ6/{userId}', [SpanishController::class, 'calificarspanishPQ6'])->name('actualizar.spanishPQ6');
    Route::post('/calificar_spanishPQ7/{userId}', [SpanishController::class, 'calificarspanishPQ7'])->name('calificar.spanishPQ7');
    Route::post('/calificar_spanishPQ10/{userId}', [SpanishController::class, 'calificarspanishPQ10'])->name('calificar.spanishPQ10');

    // calificaciones de grado 6

    Route::post('/calificar_spanishPSX1/{userId}', [SpanishController::class, 'calificarspanishPSX1'])->name('calificar.spanishPSX1');
    Route::post('/calificar_spanishPSX2/{userId}', [SpanishController::class, 'calificarspanishPSX2'])->name('calificar.spanishPSX2');
    Route::post('/calificar_spanishPSX3/{userId}', [SpanishController::class, 'calificarspanishPSX3'])->name('calificar.spanishPSX3');
    Route::post('/calificar_spanishPSX4/{userId}', [SpanishController::class, 'calificarspanishPSX4'])->name('calificar.spanishPSX4');
    Route::post('/calificar_spanishPSX5/{userId}', [SpanishController::class, 'calificarspanishPSX5'])->name('calificar.spanishPSX5');
    Route::post('/calificar_spanishPSX6/{userId}', [SpanishController::class, 'calificarspanishPSX6'])->name('calificar.spanishPSX6');

    // calififcaciones de grado 7
    Route::post('/calificar_spanishPS1/{userId}', [SpanishController::class, 'calificarspanishPS1'])->name('calificar.spanishPS1');
    Route::post('/calificar_spanishPS2/{userId}', [SpanishController::class, 'calificarspanishPS2'])->name('calificar.spanishPS2');
    Route::post('/calificar_spanishPS3/{userId}', [SpanishController::class, 'calificarspanishPS3'])->name('calificar.spanishPS3');
    Route::post('/calificar_spanishPS4/{userId}', [SpanishController::class, 'calificarspanishPS4'])->name('calificar.spanishPS4');
    Route::post('/calificar_spanishPS5/{userId}', [SpanishController::class, 'calificarspanishPS5'])->name('calificar.spanishPS5');
    Route::post('/calificar_spanishPS6/{userId}', [SpanishController::class, 'calificarspanishPS6'])->name('calificar.spanishPS6');
    Route::post('/calificar_spanishPS7/{userId}', [SpanishController::class, 'calificarspanishPS7'])->name('calificar.spanishPS7');

    // calififcaciones de grado 8
    Route::post('/calificar_spanishPO1/{userId}', [SpanishController::class, 'calificarspanishPO1'])->name('calificar.spanishPO1');
    Route::post('/calificar_spanishPO2/{userId}', [SpanishController::class, 'calificarspanishPO2'])->name('calificar.spanishPO2');
    Route::post('/calificar_spanishPO3/{userId}', [SpanishController::class, 'calificarspanishPO3'])->name('calificar.spanishPO3');
    Route::post('/calificar_spanishPO4/{userId}', [SpanishController::class, 'calificarspanishPO4'])->name('calificar.spanishPO4');
    Route::post('/calificar_spanishPO5/{userId}', [SpanishController::class, 'calificarspanishPO5'])->name('calificar.spanishPO5');
    Route::post('/calificar_spanishPO8/{userId}', [SpanishController::class, 'calificarspanishPO8'])->name('calificar.spanishPO8');


    // calificaciones de grado 10
    Route::post('/calificar_spanishPD5/{userId}', [SpanishController::class, 'calificarspanishPD5'])->name('calificar.spanishPD5');
    Route::post('/calificar_spanishPD6/{userId}', [SpanishController::class, 'calificarspanishPD6'])->name('calificar.spanishPD6');
    Route::post('/calificar_spanishPD7/{userId}', [SpanishController::class, 'calificarspanishPD7'])->name('calificar.spanishPD7');


    Route::get('/fragment_spanishPD4/{userId}', [SpanishController::class, 'index_spanishFragment'])->name('fragment.spanishPD4');
    Route::post('/calificarFragment_spanishPD4_1/{userId}', [SpanishController::class, 'calificarspanishPD4_1'])->name('calificar.spanishPD4_1');
    Route::post('/calificarFragment_spanishPD4_2/{userId}', [SpanishController::class, 'calificarspanishPD4_2'])->name('calificar.spanishPD4_2');
    Route::post('/calificarFragment_spanishPD4_3/{userId}', [SpanishController::class, 'calificarspanishPD4_3'])->name('calificar.spanishPD4_3');
    Route::post('/calificarFragment_spanishPD4_4/{userId}', [SpanishController::class, 'calificarspanishPD4_4'])->name('calificar.spanishPD4_4');

    // Exportaciones
    Route::get('/export-user-excel-Spanish4', [SpanishController::class, 'exportExcelSpanish4'])->name('exportar.excel.Spanish4');
    Route::get('/export-user-excel-Spanish5', [SpanishController::class, 'exportExcelSpanish5'])->name('exportar.excel.Spanish5');
    Route::get('/export-user-excel-Spanish6', [SpanishController::class, 'exportExcelSpanish6'])->name('exportar.excel.Spanish6');
    Route::get('/export-user-excel-Spanish7', [SpanishController::class, 'exportExcelSpanish7'])->name('exportar.excel.Spanish7');
    Route::get('/export-user-excel-Spanish8', [SpanishController::class, 'exportExcelSpanish8'])->name('exportar.excel.Spanish8');
    Route::get('/export-user-excel-Spanish9', [SpanishController::class, 'exportExcelSpanish9'])->name('exportar.excel.Spanish9');
    Route::get('/export-user-excel-Spanish10', [SpanishController::class, 'exportExcelSpanish10'])->name('exportar.excel.Spanish10');

    // --------------------------------------- Ingles ---------------------------------------------------------
    Route::get('/ventana-emergente', [EnglishController::class, 'ventanaEnglish'])->name('ventana.english');



    /********************* PDFS ***************************** */
    Route::get('/generate-pdf/{userId}', [PDFController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/generate-pdf-spanish5/{userId}', [PDFController::class, 'generatePDFSpanish5'])->name('generate.pdf.spanish5');
    Route::get('/generate-pdf-spanish6/{userId}', [PDFController::class, 'generatePDFSpanish6'])->name('generate.pdf.spanish6');
    Route::get('/generate-pdf-spanish7/{userId}', [PDFController::class, 'generatePDFSpanish7'])->name('generate.pdf.spanish7');
    Route::get('/generate-pdf-spanish8/{userId}', [PDFController::class, 'generatePDFSpanish8'])->name('generate.pdf.spanish8');
    Route::get('/generate-pdf-spanish9/{userId}', [PDFController::class, 'generatePDFSpanish9'])->name('generate.pdf.spanish9');

    // ------------------- Conceto ------------------
    Route::get('/board_concept', [ConceptController::class, 'index_concept'])->name('mostrar_conceptos');
    Route::post('/save-observationDocenteSpanish/{userId}', [ConceptController::class, 'saveObservationDocenteSpanish'])->name('save.observationsDocenteSpanish');
    Route::post('/save-observationDocenteMath/{userId}', [ConceptController::class, 'saveObservationDocenteMath'])->name('save.observationsDocenteMath');
    Route::post('/save-observationDocenteEnglish/{userId}', [ConceptController::class, 'saveObservationDocenteEnglish'])->name('save.observationsDocenteEnglish');
    Route::post('/save-observationPsicoorientador/{userId}', [ConceptController::class, 'saveObservationPsicoorientador'])->name('save.observationsPsicoorientador');
    Route::post('/save-observationRector/{userId}', [ConceptController::class, 'saveObservationRector'])->name('save.observationsRector');
    Route::post('/save-observationAcademico/{userId}', [ConceptController::class, 'saveObservationAcademico'])->name('save.observationsAcademico');
    Route::post('/save-observationConvivencia/{userId}', [ConceptController::class, 'saveObservationConvivencia'])->name('save.observationsConvivencia');
    Route::post('/save/digital/assignature/{userId}', [ConceptController::class, 'saveDigitalAsignature'])->name('save.digitalAsignature');

    //---------------- Editar conceptos --------------
    Route::put('/edit-concept-spanish/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteSpanish'])->name('update.concepSpanishForRector');
    Route::put('/edit-concept-math/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteMath'])->name('update.concepMathForRector');
    Route::put('/edit-concept-english/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteEnglish'])->name('update.concepEnglishForRector');
    Route::put('/edit-concept-psicoorientador/{userId}', [ConceptController::class, 'saveUpdateObservationsDocentePsicoorientador'])->name('update.concepPsicoorientadorForRector');
    Route::put('/edit-concept-academico/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteAcademico'])->name('update.concepAcademicoForRector');
    Route::put('/edit-concept-convivencia/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteConvivencia'])->name('update.concepConvivenciaForRector');
    Route::put('/edit-concept-rector/{userId}', [ConceptController::class, 'saveUpdateObservationsDocenteRector'])->name('update.concepRForRector');
    
    // pdf conceptos
    Route::get('/generate-pdf-observations/{userId}', [PDFController::class, 'generatePDFObservations'])->name('generate.pdf.observations');
});

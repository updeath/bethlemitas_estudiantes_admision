<?php

namespace App\Http\Controllers;

use App\Models\SpanishNoveno;
use App\Models\SpanishOctavo;
use App\Models\SpanishSeptimo;
use Illuminate\Http\Request;
use TCPDF;
use app\Models\User;
use App\Models\SpanishCuarto;
use App\Models\SpanishQuinto;
use App\Models\SpanishSexto;
use App\Models\Concept;

class PDFController extends Controller
{
    public function generatePDF($userId)
    {
        $user = User::findOrFail($userId);
        $spanishCuarto = SpanishCuarto::where('user_id', $userId)->first();

        $observation = $spanishCuarto ? explode(' - ', $spanishCuarto->ObservationspanishPC) : null;
        $observation2 = $spanishCuarto ? explode(' - ', $spanishCuarto->ObservationspanishPC2) : null;
        $observation3 = $spanishCuarto ? explode(' - ', $spanishCuarto->ObservationspanishPC3) : null;
        $observation4 = $spanishCuarto ? explode(' - ', $spanishCuarto->ObservationspanishPC4) : null;

        $data = [
            'title' => 'Observaciones de Grado 4',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,
        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';

        // Generate PDF using the dynamic data
        $html = view('home.pdfs.Spanish.spanish4', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }

    public function generatePDFSpanish5($userId)
    {
        $user = User::findOrFail($userId);
        $spanishQuinto = SpanishQuinto::where('user_id', $userId)->first();

        $observation = $spanishQuinto ? explode(' - ', $spanishQuinto->ObservationspanishPQ) : null;
        $observation2 = $spanishQuinto ? explode(' - ', $spanishQuinto->ObservationspanishPQ2) : null;
        $observation3 = $spanishQuinto ? explode(' - ', $spanishQuinto->ObservationspanishPQ3) : null;
        $observation4 = $spanishQuinto ? explode(' - ', $spanishQuinto->ObservationspanishPQ4) : null;

        $data = [
            'title' => 'Observaciones de Grado 5',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,

        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';


        $html = view('home.pdfs.Spanish.spanish5', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }

    public function generatePDFSpanish6($userId)
    {
        $user = User::findOrFail($userId);
        $spanishSexto = SpanishSexto::where('user_id', $userId)->first();

        $observation = $spanishSexto ? explode(' - ', $spanishSexto->ObservationspanishPSX) : null;
        $observation2 = $spanishSexto ? explode(' - ', $spanishSexto->ObservationspanishPSX2) : null;
        $observation3 = $spanishSexto ? explode(' - ', $spanishSexto->ObservationspanishPSX3) : null;
        $observation4 = $spanishSexto ? explode(' - ', $spanishSexto->ObservationspanishPSX4) : null;

        $data = [
            'title' => 'Observaciones de Grado 6',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,

        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';


        $html = view('home.pdfs.Spanish.spanish6', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }
    public function generatePDFSpanish7($userId)
    {
        $user = User::findOrFail($userId);
        $spanishSeptimo = SpanishSeptimo::where('user_id', $userId)->first();

        $observation = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPS) : null;
        $observation2 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPS2) : null;
        $observation3 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPS3) : null;
        $observation4 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPS4) : null;

        $data = [
            'title' => 'Observaciones de Grado 7',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,

        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';


        $html = view('home.pdfs.Spanish.spanish7', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }
    public function generatePDFSpanish8($userId)
    {
        $user = User::findOrFail($userId);
        $spanishSeptimo = SpanishOctavo::where('user_id', $userId)->first();

        $observation = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPO) : null;
        $observation2 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPO2) : null;
        $observation3 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPO3) : null;
        $observation4 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPO4) : null;

        $data = [
            'title' => 'Observaciones de Grado 8',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,

        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';


        $html = view('home.pdfs.Spanish.spanish8', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }

    public function generatePDFSpanish9($userId)
    {
        $user = User::findOrFail($userId);
        $spanishSeptimo = SpanishNoveno::where('user_id', $userId)->first();

        $observation = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPNO) : null;
        $observation2 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPNO2) : null;
        $observation3 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPNO3) : null;
        $observation4 = $spanishSeptimo ? explode(' - ', $spanishSeptimo->ObservationspanishPNO4) : null;

        $data = [
            'title' => 'Observaciones de Grado 9',
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,

        ];

        $filename = 'generatePdf/spanish/Aspirante_' . $user->name . '.pdf';


        $html = view('home.pdfs.Spanish.spanish9', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('Hello world');
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");
        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }



    public function generatePDFObservations($userId)
    {
        $user = User::findOrFail($userId);
        $observations = Concept::where('user_id', $userId)->first();

        $observation = $observations ? explode(' - ', $observations->ObservationPsicoorientador) : null;
        $observation2 = $observations ? explode(' - ', $observations->ObservationAcademico) : null;
        $observation3 = $observations ? explode(' - ', $observations->ObservationConvivencia) : null;
        $observation4 = $observations ? explode(' - ', $observations->ObservationRector) : null;

        $data = [
            'title' => 'Observaciones de Grado ' . $user->degree,
            'user' => $user,
            'observation' => $observation,
            'observation2' => $observation2,
            'observation3' => $observation3,
            'observation4' => $observation4,
        ];

        $filename = 'generatePdf/Aspirante_' . $user->name . '.pdf';

        $html = view('home.pdfs.index', $data)->render();
        $pdf = new TCPDF;
        $pdf->SetTitle('PDF');

        // Agregar la primera página
        $pdf->AddPage();
        $pdf->writeHTML($html, true, false, true, false, "");

        // Agregar una segunda página en blanco
        $pdf->AddPage();

        // Cambiar las observaciones para la segunda página
        $observationDocenteSpanish = $observations ? explode(' - ', $observations->ObservationDocenteSpanish) : null;
        $observationDocenteMath = $observations ? explode(' - ', $observations->ObservationDocenteMath) : null;
        $observationDocenteEnglish = $observations ? explode(' - ', $observations->ObservationDocenteEnglish) : null;

        $dataSecondPage = [
            'title' => 'Observaciones de Grado ' . $user->degree,
            'user' => $user,
            'observation' => $observationDocenteSpanish,
            'observation2' => $observationDocenteMath,
            'observation3' => $observationDocenteEnglish,
        ];

        // Generar HTML para la segunda página
        $htmlSecondPage = view('home.pdfs.indexPaginate2', $dataSecondPage)->render();
        $pdf->writeHTML($htmlSecondPage, true, false, true, false, "");

        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));
    }
}

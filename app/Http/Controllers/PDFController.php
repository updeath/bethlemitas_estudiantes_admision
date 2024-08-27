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
use Illuminate\Support\Facades\Log;

class PDFController extends Controller
{
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
            'signaturePsicoorientador' => $observations->signature_image_psicoorientador,
            'signatureAcademico' => $observations->signature_image_coordinador_academico,
            'signatureConvivencia' => $observations->signature_image_coordinador_convivencia,
            'signatureRector' => $observations->signature_image_rector,
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
            'signatureSpanish10' => $observations->signature_image_spanish_decimo,
            'signatureMath10' => $observations->signature_image_math_decimo,
            'signatureEnglish10' => $observations->signature_image_english_decimo,
        ];

        // Generar HTML para la segunda página
        $htmlSecondPage = view('home.pdfs.indexPaginate2', $dataSecondPage)->render();
        $pdf->writeHTML($htmlSecondPage, true, false, true, false, "");

        $pdf->Output(public_path($filename), "F");

        return response()->download(public_path($filename));

        //  Log::info('PDF: ' . json_encode($dataSecondPage));
        //  return response()->json(['promediosss' => $dataSecondPage]);
    }
}

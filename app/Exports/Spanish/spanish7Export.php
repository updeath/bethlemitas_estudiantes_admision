<?php

namespace App\Exports\Spanish;

use App\Models\SpanishOctavo;
use App\Models\SpanishSeptimo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class spanish7Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $SpanishSepimtoRecords = SpanishSeptimo::all();

        $data = $SpanishSepimtoRecords->map(function ($spanish7) {
            return [
                'Nombre Completo' => $spanish7->user->name . ' ' . $spanish7->user->last_name,
                'Promedio' => $spanish7->averageSpanishPS,
                'Intentos' => $spanish7->attemptsSpanishPS,
                'Correctas' => $spanish7->correctSpanishPS,
                'Incorrectas' => $spanish7->incorrectSpanishPS,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nombre Completo',
            'Promedio',
            'Intentos',
            'Correctas',
            'Incorrectas',
        ];
    }
}

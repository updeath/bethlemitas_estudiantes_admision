<?php

namespace App\Exports\Spanish;

use App\Models\SpanishDecimo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
class Spanish10Export implements FromCollection , WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection 
    */
    public function collection()
    {

        $SpanishNovenoRecords = SpanishDecimo::all();

        $data = $SpanishNovenoRecords->map(function ($spanish10) {
            return [
                'Nombre Completo' => $spanish10->user->name . ' ' . $spanish10->user->last_name,
                'Promedio' => $spanish10->averageSpanishPD,
                'Intentos' => $spanish10->attemptsSpanishPD,
                'Correctas' => $spanish10->correctSpanishPD,
                'Incorrectas' => $spanish10->incorrectSpanishPD,
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

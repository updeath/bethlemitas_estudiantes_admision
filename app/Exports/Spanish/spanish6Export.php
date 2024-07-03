<?php

namespace App\Exports\Spanish;

use App\Models\SpanishSexto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class spanish6Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = SpanishSexto::all();

        $data = $mathQuintoRecords->map(function ($spanish4) {
            return [
                'Nombre Completo' => $spanish4->user->name . ' ' . $spanish4->user->last_name,
                'Promedio' => $spanish4->averageSpanishPSX,
                'Intentos' => $spanish4->attemptsSpanishPSX,
                'Correctas' => $spanish4->correctSpanishPSX,
                'Incorrectas' => $spanish4->incorrectSpanishPSX,
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

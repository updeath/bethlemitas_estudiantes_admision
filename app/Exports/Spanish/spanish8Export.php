<?php

namespace App\Exports\Spanish;

use App\Models\SpanishOctavo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class spanish8Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $SpanishOctavoRecords = SpanishOctavo::all();

        $data = $SpanishOctavoRecords->map(function ($spanish8) {
            return [
                'Nombre Completo' => $spanish8->user->name . ' ' . $spanish8->user->last_name,
                'Promedio' => $spanish8->averageSpanishPO,
                'Intentos' => $spanish8->attemptsSpanishPO,
                'Correctas' => $spanish8->correctSpanishPO,
                'Incorrectas' => $spanish8->incorrectSpanishPO,
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

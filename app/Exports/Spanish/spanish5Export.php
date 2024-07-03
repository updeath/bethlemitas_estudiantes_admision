<?php

namespace App\Exports\Spanish;

use App\Models\SpanishQuinto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class spanish5Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = SpanishQuinto::all();

        $data = $mathQuintoRecords->map(function ($spanish4) {
            return [
                'Nombre Completo' => $spanish4->user->name . ' ' . $spanish4->user->last_name,
                'Promedio' => $spanish4->averageSpanishPQ,
                'Intentos' => $spanish4->attemptsSpanishPQ,
                'Correctas' => $spanish4->correctSpanishPQ,
                'Incorrectas' => $spanish4->incorrectSpanishPQ,
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

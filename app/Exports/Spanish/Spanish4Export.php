<?php

namespace App\Exports\Spanish;

use App\Models\SpanishCuarto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Spanish4Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = SpanishCuarto::all();

        $data = $mathQuintoRecords->map(function ($spanish4) {
            return [
                'Nombre Completo' => $spanish4->user->name . ' ' . $spanish4->user->last_name,
                'Promedio' => $spanish4->averageSpanishPC,
                'Intentos' => $spanish4->attemptsSpanishPC,
                'Correctas' => $spanish4->correctSpanishPC,
                'Incorrectas' => $spanish4->incorrectSpanishPC,
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

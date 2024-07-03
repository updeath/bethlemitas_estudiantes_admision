<?php

namespace App\Exports\Spanish;

use App\Models\SpanishNoveno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class spanish9Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $SpanishNovenoRecords = SpanishNoveno::all();

        $data = $SpanishNovenoRecords->map(function ($spanish9) {
            return [
                'Nombre Completo' => $spanish9->user->name . ' ' . $spanish9->user->last_name,
                'Promedio' => $spanish9->averageSpanishPNO,
                'Intentos' => $spanish9->attemptsSpanishPNO,
                'Correctas' => $spanish9->correctSpanishPNO,
                'Incorrectas' => $spanish9->incorrectSpanishPNO,
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

<?php

namespace App\Exports\Math;

use App\Models\MathNoveno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math9Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = MathNoveno::all();

        $data = $mathQuintoRecords->map(function ($math9) {
            return [
                'Nombre Completo' => $math9->user->name . ' ' . $math9->user->last_name,
                'Promedio' => $math9->averagePNO,
                'Intentos' => $math9->attemptsPNO,
                'Correctas' => $math9->correctPNO,
                'Incorrectas' => $math9->incorrectPNO,
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

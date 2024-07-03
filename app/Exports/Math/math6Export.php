<?php

namespace App\Exports\math;

use App\Models\MathSexto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class math6Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = MathSexto::all();

        $data = $mathQuintoRecords->map(function ($math5) {
            return [
                'Nombre Completo' => $math5->user->name . ' ' . $math5->user->last_name,
                'Promedio' => $math5->averagePSX,
                'Intentos' => $math5->attemptsPSX,
                'Correctas' => $math5->correctPSX,
                'Incorrectas' => $math5->incorrectPSX,
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

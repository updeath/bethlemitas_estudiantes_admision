<?php

namespace App\Exports\Math;

use App\Models\MathDecimo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math10Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = MathDecimo::all();

        $data = $mathQuintoRecords->map(function ($math9) {
            return [
                'Nombre Completo' => $math9->user->name . ' ' . $math9->user->last_name,
                'Promedio' => $math9->averagePD,
                'Intentos' => $math9->attemptsPD,
                'Correctas' => $math9->correctPD,
                'Incorrectas' => $math9->incorrectPD,
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

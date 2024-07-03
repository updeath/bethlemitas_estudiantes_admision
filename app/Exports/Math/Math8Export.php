<?php

namespace App\Exports\Math;

use App\Models\MathOctavo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math8Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = MathOctavo::all();

        $data = $mathQuintoRecords->map(function ($math8) {
            return [
                'Nombre Completo' => $math8->user->name . ' ' . $math8->user->last_name,
                'Promedio' => $math8->averagePO,
                'Intentos' => $math8->attemptsPO,
                'Correctas' => $math8->correctPO,
                'Incorrectas' => $math8->incorrectPO,
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

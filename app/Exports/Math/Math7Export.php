<?php

namespace App\Exports\Math;

use App\Models\MathSeptimo;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math7Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $mathQuintoRecords = MathSeptimo::all();

        $data = $mathQuintoRecords->map(function ($math5) {
            return [
                'Nombre Completo' => $math5->user->name . ' ' . $math5->user->last_name,
                'Promedio' => $math5->averagePS,
                'Intentos' => $math5->attemptsPS,
                'Correctas' => $math5->correctPS,
                'Incorrectas' => $math5->incorrectPS,
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

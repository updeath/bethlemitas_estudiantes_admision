<?php

namespace App\Exports\Math;

use App\Models\MathQuinto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math5Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Obtener todos los registros de MathCuarto
        $mathCuartoRecords = MathQuinto::all();

        // Mapear los registros para obtener los datos necesarios
        $data = $mathCuartoRecords->map(function ($math4) {
            return [
                'Nombre Completo' => $math4->user->name . ' ' . $math4->user->last_name,
                'Promedio' => $math4->averagePQ,
                'Intentos' => $math4->attemptsPQ,
                'Correctas' => $math4->correctPQ,
                'Incorrectas' => $math4->incorrectPQ,
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

<?php

namespace App\Exports;

use App\Models\MathCuarto;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class Math4Export implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Obtener todos los registros de MathCuarto
        $mathCuartoRecords = MathCuarto::all();

        // Mapear los registros para obtener los datos necesarios
        $data = $mathCuartoRecords->map(function ($math4) {
            return [
                'Nombre Completo' => $math4->user->name . ' ' . $math4->user->last_name,
                'Observación Coordinador' => $math4->ObservationmathPC,
                'Observación Psicoorientador' => $math4->ObservationmathPC2,
                'Observación Rector' => $math4->ObservationmathPC3,
                'Observación Secretario' => $math4->ObservationmathPC4,
                'Promedio' => $math4->average,
                'Intentos' => $math4->attempts,
                'Correctas' => $math4->correct,
                'Incorrectas' => $math4->incorrect,
            ];
        });

        return $data;
    }

    public function headings(): array
    {
        return [
            'Nombre Completo',
            'Observación Coordinador',
            'Observación Psicoorientador',
            'Observación Rector',
            'Observación Secretario',
            'Promedio',
            'Intentos',
            'Correctas',
            'Incorrectas',
        ];
    }
}

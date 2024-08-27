<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class AspirantesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Filtrar usuarios por rol "Aspirante"
        $aspirantes = User::role('Aspirante')->get();

        return $aspirantes->map(function ($user) {
            return [
                'Fecha de prueba' => $user->test_date,
                'Tipo de documento' =>$user->typeDocumment,
                'Documento' => $user->number_documment,
                'Nombre' => $user->name,
                'Apellido' => $user->last_name,
                'Correo electronico' => $user->email,
                'Celular' => $user->iphone,
                'Grado' => $user->degree,
                'Estado' => $user->status,
            ];
        });
    }

    public function headings(): array
    {
        return [
            'Fecha de prueba',
            'Tipo de documento',
            'Documento',
            'Nombre',
            'Apellido',
            'Correo electronico',
            'Celular',
            'Grado',
            'Estado',
        ];
    }
}

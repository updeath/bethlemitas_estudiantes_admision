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

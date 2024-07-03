<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // Obtener todos los registros de usuarios
        $users = User::all();

        // Mapear los registros para obtener los datos necesarios
        $data = $users->map(function ($user) {
            // Obtener los nombres de los roles del usuario
            $roles = $user->roles->pluck('name')->implode(', ');

            return [
                'Documento' => $user->number_documment,
                'Nombre' => $user->name,
                'Apellido' => $user->last_name,
                'Correo electronico' => $user->email,
                'Celular' => $user->iphone,
                'Grado' => $user->degree,
                'Estado' => $user->status,
                'Rol' => $roles,
            ];
        });

        return $data;
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
            'Rol'
        ];
    }
}

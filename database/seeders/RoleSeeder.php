<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    protected $priority = 1;

    public function run()
    {
        $Admin =  Role::create(['name' => 'Admin']);
        $Docente = Role::create(['name' => 'Docente']);
        $Aspirante =  Role::create(['name' => 'Aspirante']);
        $CoordinadorAcademico =  Role::create(['name' => 'CoordinadorAcademico']);
        $CoordinadorConvivencia =  Role::create(['name' => 'CoordinadorConvivencia']);
        $Psicologo =  Role::create(['name' => 'Psicoorientador']);
        $Secretaria =  Role::create(['name' => 'Secretaria']);
        $Rector = Role::create(['name' => 'Rector']);

        // usuarios
        Permission::create(['name'=> 'create_user']);#1
        // permisos formularios de Matematicas
        Permission::create(['name'=> 'form.create.math4']);#2
        Permission::create(['name'=> 'form.create.math5']);#3
        Permission::create(['name'=> 'form.create.math6']);#4
        Permission::create(['name'=> 'form.create.math7']);#5
        Permission::create(['name'=> 'form.create.math8']);#6
        Permission::create(['name'=> 'form.create.math9']);#7
        Permission::create(['name'=> 'form.create.math10']);#8

        // Permisos formularios de español
        Permission::create(['name'=> 'form.create.spanish4']);#9
        Permission::create(['name'=> 'form.create.spanish5']);#10
        Permission::create(['name'=> 'form.create.spanish6']);#11
        Permission::create(['name'=> 'form.create.spanish7']);#12
        Permission::create(['name'=> 'form.create.spanish8']);#13
        Permission::create(['name'=> 'form.create.spanish9']);#14
        Permission::create(['name'=> 'form.create.spanish10']);#15

        // Permisos formularios de ingles
        Permission::create(['name'=> 'form.create.english4']);#16
        Permission::create(['name'=> 'form.create.english5']);#17
        Permission::create(['name'=> 'form.create.english7']);#18
        Permission::create(['name'=> 'form.create.english9']);#19

        // conceptos
        Permission::create(['name'=> 'mostrar_conceptos']);#20
        Permission::create(['name'=> 'save.observationsCoordinationAcademico']);#21
        Permission::create(['name'=> 'save.observationsCoordinationConvivencia']);#22
        Permission::create(['name'=> 'save.observationsDocenteSpanish']);#23
        Permission::create(['name'=> 'save.observationsDocenteMath']);#24
        Permission::create(['name'=> 'save.observationsDocenteEnglish']);#25
        Permission::create(['name'=> 'save.observationsPsicoorientador']);#26
        Permission::create(['name'=> 'save.observationsRector']);#27

        Permission::create(['name'=> 'table.math4']);#28
        Permission::create(['name'=> 'table.math5']);#29
        Permission::create(['name'=> 'table.math6']);#30
        Permission::create(['name'=> 'table.math7']);#31
        Permission::create(['name'=> 'table.math8']);#32
        Permission::create(['name'=> 'table.math9']);#33
        Permission::create(['name'=> 'table.math10']);#34

        $Admin->permissions()->attach([
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);

        $Docente->permissions()->attach([
            20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);

        $Aspirante->permissions()->attach([
            2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19
        ]);

        $CoordinadorAcademico->permissions()->attach([
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);

        $CoordinadorConvivencia->permissions()->attach([
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);

        $Psicologo->permissions()->attach([
            20,21,22,23,24,25,26
        ]);

        $Secretaria->permissions()->attach([
            1,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);

        $Rector->permissions()->attach([
            1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34
        ]);
    }
}

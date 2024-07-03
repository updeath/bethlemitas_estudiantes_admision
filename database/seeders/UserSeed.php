<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            "name" => "nameTest",
            "last_name" => "lastNameTest",
            "password" => bcrypt("test123"),
            "email" => "test@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('Admin');
        User::create([
            "name" => "AspiranteTest",
            "last_name" => "AspiranteLastName",
            "password" => bcrypt("test123"),
            "email" => "aspirante@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
            'degree' => fake()->numberBetween(1, 11),
        ])->assignRole('Aspirante');

        User::create([
            "name" => "DocenteSpanisTest",
            "last_name" => "DocenteLastName",
            "password" => bcrypt("test123"),
            "email" => "docentespanish@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
            "asignature" => "spanish",
        ])->assignRole('Docente');

        User::create([
            "name" => "DocenteMathTest",
            "last_name" => "DocenteLastName",
            "password" => bcrypt("test123"),
            "email" => "docentemath@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
            "asignature" => "math",
        ])->assignRole('Docente');

        User::create([
            "name" => "DocenteEnglishTest",
            "last_name" => "DocenteLastName",
            "password" => bcrypt("test123"),
            "email" => "docenteenglish@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
            "asignature" => "english",
        ])->assignRole('Docente');

        User::create([
            "name" => "Coordinador",
            "last_name" => "Academico",
            "password" => bcrypt("test123"),
            "email" => "coordinadorAcademico@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('CoordinadorAcademico');

        User::create([
            "name" => "Coordinador",
            "last_name" => "Convivencia",
            "password" => bcrypt("test123"),
            "email" => "coordinadorConvivencia@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('CoordinadorConvivencia');
        
        User::create([
            "name" => "PsicorientadorTest",
            "last_name" => "PsicorientadorLastName",
            "password" => bcrypt("test123"),
            "email" => "psico@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('Psicoorientador');

        User::create([
            "name" => "SecretariaTest",
            "last_name" => "SecretariaLastName",
            "password" => bcrypt("test123"),
            "email" => "secretaria@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('Secretaria');
        User::create([
            "name" => "RectorTest",
            "last_name" => "RectorLastName",
            "password" => bcrypt("test123"),
            "email" => "rector@gmail.com",
            "number_documment" => fake()->numberBetween(10000000, 999999994),
            'typeDocumment' => fake()->randomElement(['CC', 'TI']),
            'iphone' => fake()->numberBetween(10000000, 99999999),
            'image' => null,
        ])->assignRole('Rector');

        // User::factory()
        //     ->count(50)
        //     ->create();

        // // Asignar el rol 'Profesores' a los usuarios generados por la factory
        // $users = User::where('name', '<>', 'Usuario')->get();
        // foreach ($users as $user) {
        //     $user->assignRole(['Aspirante']);
        // }
    }
}

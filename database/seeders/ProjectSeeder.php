<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ejemplo de proyectos iniciales
        Project::create([
            'nombre' => 'Proyecto A',
            'descripcion' => 'Este es el proyecto A',
        ]);

        Project::create([
            'nombre' => 'Proyecto B',
            'descripcion' => 'Este es el proyecto B',
        ]);

        Project::create([
            'nombre' => 'Proyecto C',
            'descripcion' => 'Este es el proyecto C',
        ]);
    }
}

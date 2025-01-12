<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Client;
use App\Models\Service;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Obtener un cliente existente
        $client = Client::first();

        if (!$client) {
            throw new \Exception('No hay clientes disponibles. Asegúrate de ejecutar el seeder de clientes primero.');
        }

        // Obtener todos los servicios disponibles
        $services = Service::pluck('id'); // Obtener IDs de los servicios

        if ($services->isEmpty()) {
            throw new \Exception('No hay servicios disponibles. Asegúrate de ejecutar el seeder de servicios primero.');
        }

        // Crear proyectos asociados al cliente y vincular servicios
        $projectA = Project::create([
            'name' => 'Proyecto A',
            'description' => 'Este es el proyecto A',
            'client_id' => $client->id,
        ]);
        $projectA->services()->sync($services->random(2)); // Asociar 2 servicios aleatorios

        $projectB = Project::create([
            'name' => 'Proyecto B',
            'description' => 'Este es el proyecto B',
            'client_id' => $client->id,
        ]);
        $projectB->services()->sync($services->random(3)); // Asociar 3 servicios aleatorios

        $projectC = Project::create([
            'name' => 'Proyecto C',
            'description' => 'Este es el proyecto C',
            'client_id' => $client->id,
        ]);
        $projectC->services()->sync($services->random(1)); // Asociar 1 servicio aleatorio
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage; // Importar Storage
use App\Models\User;
use App\Models\Company;
use App\Models\Project;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Limpiar y recrear la carpeta profile_photo
        $this->resetProfilePhotoDirectory();

        // Obtener una compañía existente
        $defaultCompany = Company::first();

        if (!$defaultCompany) {
            throw new \Exception('No hay compañías disponibles. Asegúrate de ejecutar el seeder de compañías primero.');
        }

        // Obtener todos los proyectos
        $projects = Project::pluck('id'); // Obtener IDs de proyectos

        if ($projects->isEmpty()) {
            throw new \Exception('No hay proyectos disponibles. Asegúrate de ejecutar el seeder de proyectos primero.');
        }

        // Crear un usuario asociado a la compañía predeterminada
        $user1 = User::create([
            'name' => 'Carlos Alberto Ramirez Ruiz',
            'email' => 'webmaster@planetaip.co',
            'password' => Hash::make('12345678'),
            'document_type' => 'CC',
            'document_number' => '1020829434',
            'phone' => '3223672315',
            'profile_photo' => null,
            'is_active' => true,
            'company_id' => $defaultCompany->id,
        ]);

        // Asociar el usuario a los proyectos
        $user1->projects()->sync($projects);

        // Crear otro usuario
        $user2 = User::create([
            'name' => 'María Fernanda López',
            'email' => 'maria.lopez@planetaip.co',
            'password' => Hash::make('password123'),
            'document_type' => 'CC',
            'document_number' => '1020304050',
            'phone' => '3117894561',
            'profile_photo' => null,
            'is_active' => true,
            'company_id' => $defaultCompany->id,
        ]);

        // Asociar el segundo usuario a los proyectos
        $user2->projects()->sync($projects->random(2)); // Asociar a 2 proyectos aleatorios
    }

    /**
     * Eliminar y recrear la carpeta profile_photo en storage.
     */
    private function resetProfilePhotoDirectory()
    {
        $directory = 'profile_photo';
    
        // Eliminar la carpeta si existe
        if (Storage::exists($directory)) {
            Storage::deleteDirectory($directory);
        }
    
        // Crear la carpeta nuevamente
        Storage::makeDirectory($directory);
    }    
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario de ejemplo
        User::create([
            'name' => 'Carlos Alberto Ramirez Ruiz',
            'email' => 'webmaster@planetaip.co',
            'password' => Hash::make('12345678'),
            'document_type' => 'CC',
            'document_number' => '1020829434',
            'phone' => '3223672315',
            'address' => 'Cra 23 #163a-66',
            'city' => 'Bogotá',
            'position' => 'Desarrollador',
            'department' => 'Tecnología',
            'salary' => 3500000.00,
            'hiring_company' => 'Planeta IP',
            'contract_type' => 'indefinido',
            'project_name' => 'Desarrollo',
            'start_date' => '2022-01-01',
            'end_date' => null,
            'birth_date' => '1997-11-08',
            'gender' => 'masculino',
            'marital_status' => 'unión libre',
            'profile_photo' => null,
            'is_active' => true,
        ]);

        // Puedes añadir más usuarios aquí
        User::create([
            'name' => 'María Fernanda López',
            'email' => 'maria.lopez@planetaip.co',
            'password' => Hash::make('password123'),
            'document_type' => 'CC',
            'document_number' => '1020304050',
            'phone' => '3117894561',
            'address' => 'Calle 50 #20-10',
            'city' => 'Medellín',
            'position' => 'Analista',
            'department' => 'Recursos Humanos',
            'salary' => 2800000.00,
            'hiring_company' => 'Planeta IP',
            'contract_type' => 'fijo',
            'project_name' => 'Talento Humano',
            'start_date' => '2023-05-01',
            'end_date' => null,
            'birth_date' => '1995-07-15',
            'gender' => 'femenino',
            'marital_status' => 'soltera',
            'profile_photo' => null,
            'is_active' => true,
        ]);
    }
}

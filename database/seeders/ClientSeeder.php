<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generar clientes de ejemplo
        Client::create([
            'document_type' => 'CC',
            'document_number' => '1234567890',
            'name' => 'Juan Pérez',
            'email' => 'juan.perez@example.com',
            'phone' => '571234567',
            'mobile' => '3001234567',
            'address' => 'Calle 123 #45-67',
            'city' => 'Bogotá',
            'department' => 'Cundinamarca',
            'country' => 'Colombia',
            'company_name' => null,
        ]);

        Client::create([
            'document_type' => 'NIT',
            'document_number' => '900123456',
            'name' => 'Empresa XYZ S.A.S',
            'email' => 'contacto@empresa-xyz.com',
            'phone' => '571876543',
            'mobile' => null,
            'address' => 'Carrera 7 #89-45 Oficina 101',
            'city' => 'Medellín',
            'department' => 'Antioquia',
            'country' => 'Colombia',
            'company_name' => 'Empresa XYZ S.A.S',
        ]);

        Client::create([
            'document_type' => 'CE',
            'document_number' => '987654321',
            'name' => 'Ana María González',
            'email' => 'ana.gonzalez@example.com',
            'phone' => null,
            'mobile' => '3107654321',
            'address' => 'Avenida Siempre Viva #123',
            'city' => 'Cali',
            'department' => 'Valle del Cauca',
            'country' => 'Colombia',
            'company_name' => null,
        ]);
    }
}

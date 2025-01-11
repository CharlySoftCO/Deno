<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'name' => 'Consultoría',
                'description' => 'Ofrecemos servicios de consultoría para empresas.',
            ],
            [
                'name' => 'Desarrollo de Software',
                'description' => 'Creamos soluciones a medida para tus necesidades tecnológicas.',
            ],
            [
                'name' => 'Soporte Técnico',
                'description' => 'Brindamos soporte técnico especializado 24/7.',
            ],
            [
                'name' => 'Capacitación',
                'description' => 'Cursos y talleres especializados en tecnología.',
            ],
            [
                'name' => 'Venta de Internet',
                'description' => 'Planes de internet de alta velocidad para hogares y empresas.',
            ],
            [
                'name' => 'Diseño y Configuración de Redes',
                'description' => 'Implementación de redes seguras y de alto rendimiento.',
            ],
            [
                'name' => 'Mantenimiento de Redes',
                'description' => 'Diagnóstico y solución de problemas en redes empresariales.',
            ],
            [
                'name' => 'Optimización de Wi-Fi',
                'description' => 'Mejoramos la cobertura y velocidad de tu red inalámbrica.',
            ],
            [
                'name' => 'Instalación de Fibra Óptica',
                'description' => 'Conexiones de fibra óptica para máxima velocidad y estabilidad.',
            ],
            [
                'name' => 'Seguridad en Redes',
                'description' => 'Protección contra ataques cibernéticos y accesos no autorizados.',
            ],
            [
                'name' => 'Monitoreo de Redes',
                'description' => 'Supervisión continua para asegurar el rendimiento óptimo de tu red.',
            ],
            [
                'name' => 'Consultoría en Telecomunicaciones',
                'description' => 'Asesoramiento para mejorar la infraestructura de telecomunicaciones.',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}

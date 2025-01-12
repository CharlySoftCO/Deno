<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'nit' => '9001234561',
                'name' => 'Empresa Alpha',
                'description' => 'Empresa líder en soluciones tecnológicas.',
            ],
            [
                'nit' => '8009876542',
                'name' => 'Beta Consulting',
                'description' => 'Consultoría estratégica para empresas.',
            ],
            [
                'nit' => '7005678903',
                'name' => 'Gamma Services',
                'description' => 'Servicios integrales de outsourcing.',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}


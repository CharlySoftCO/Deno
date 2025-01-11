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
                'nit' => '900123456-1',
                'name' => 'Empresa Alpha',
                'description' => 'Empresa líder en soluciones tecnológicas.',
            ],
            [
                'nit' => '800987654-2',
                'name' => 'Beta Consulting',
                'description' => 'Consultoría estratégica para empresas.',
            ],
            [
                'nit' => '700567890-3',
                'name' => 'Gamma Services',
                'description' => 'Servicios integrales de outsourcing.',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}


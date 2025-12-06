<?php

namespace Database\Seeders;

use App\Models\CompanyValue;
use Illuminate\Database\Seeder;

class CompanyValueSeeder extends Seeder
{
    public function run(): void
    {
        $values = [
            [
                'title' => 'Responsabilidad',
                'description' => 'La empresa adquiere conciencia de las decisiones que toma y afronta las mismas para dignificar a los demás.',
                'icon' => 'values/reponsability.png',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Pasión',
                'description' => 'Es un valor de gran importancia en nuestra empresa, refleja cuando el trabajo realizado posee una excelente calidad y permite seguir trabajando y mejorando todo el proceso en la compañía.',
                'icon' => 'values/passsion.png',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Honestidad',
                'description' => 'Para que una organización adquiera credibilidad debe ser sincera con sus empleados y clientes. Es por ello que se debe anteponer la sinceridad ante cualquier otra consideración.',
                'icon' => 'values/honestly.png',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($values as $value) {
            CompanyValue::updateOrCreate(
                ['title' => $value['title']],
                $value
            );
        }
    }
}

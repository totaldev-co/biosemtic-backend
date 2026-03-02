<?php

namespace Database\Seeders;

use App\Models\FooterPolicy;
use Illuminate\Database\Seeder;

class FooterPolicySeeder extends Seeder
{
    public function run(): void
    {
        $policies = [
            [
                'name' => 'Política de tratamiento de datos',
                'file_path' => 'site/footer/policies/Politica de tratamiento de datos.pdf',
                'order' => 1,
                'is_active' => true,
            ],
        ];

        foreach ($policies as $policy) {
            FooterPolicy::updateOrCreate(
                ['name' => $policy['name']],
                $policy
            );
        }
    }
}

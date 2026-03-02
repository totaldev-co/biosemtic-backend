<?php

namespace Database\Seeders;

use App\Models\RentalProductCategory;
use Illuminate\Database\Seeder;

class RentalProductCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'CPRE',
                'slug' => 'cpre',
                'description' => 'Colangio Pancreatografía Retrógrada Endoscópica',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Retiro de Cuerpo Extraño',
                'slug' => 'retiro-cuerpo-extrano',
                'description' => 'Insumos para retiro de cuerpo extraño',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Biopsia',
                'slug' => 'biopsia',
                'description' => 'Insumos para toma de biopsia',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Hemostasia',
                'slug' => 'hemostasia',
                'description' => 'Insumos para hemostasia',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'Polipectomía',
                'slug' => 'polipectomia',
                'description' => 'Insumos para polipectomía',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'Gastrostomía PEG',
                'slug' => 'gastrostomia-peg',
                'description' => 'Gastrostomía Endoscópica Percutánea',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'name' => 'Reprocesamiento',
                'slug' => 'reprocesamiento',
                'description' => 'Insumos para reprocesamiento y varios',
                'order' => 7,
                'is_active' => true,
            ],
            [
                'name' => 'Videolaringoscopio',
                'slug' => 'videolaringoscopio',
                'description' => 'Insumos para videolaringoscopio',
                'order' => 8,
                'is_active' => true,
            ],
            [
                'name' => 'Stent Esofágico',
                'slug' => 'stent-esofagico',
                'description' => 'Stent autoexpandibles esofágicos',
                'order' => 9,
                'is_active' => true,
            ],
            [
                'name' => 'Stent Biliar',
                'slug' => 'stent-biliar',
                'description' => 'Stent autoexpandible biliar',
                'order' => 10,
                'is_active' => true,
            ],
            [
                'name' => 'Stent Duodenal',
                'slug' => 'stent-duodenal',
                'description' => 'Stent autoexpandible duodenal/pilórico',
                'order' => 11,
                'is_active' => true,
            ],
            [
                'name' => 'Stent Colon',
                'slug' => 'stent-colon',
                'description' => 'Stent autoexpandible colon-rectal',
                'order' => 12,
                'is_active' => true,
            ],
            [
                'name' => 'Limpieza y Desinfección',
                'slug' => 'limpieza-desinfeccion',
                'description' => 'Línea de limpieza y desinfección LP-BIKAR',
                'order' => 13,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            RentalProductCategory::updateOrCreate(
                ['slug' => $category['slug']],
                $category
            );
        }
    }
}

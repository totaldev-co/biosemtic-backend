<?php

namespace Database\Seeders;

use App\Models\SectionSetting;
use Illuminate\Database\Seeder;

class SectionSettingSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'services',
                'title' => 'Lo que ofrecemos',
                'subtitle' => 'Ofrecemos soluciones integrales para equipos médicos con la más alta calidad y tecnología',
            ],
            [
                'section_key' => 'clients',
                'title' => 'Nuestros clientes',
                'subtitle' => 'Trabajamos junto a quienes cuidan la vida',
            ],
            [
                'section_key' => 'news',
                'title' => 'Novedades',
                'subtitle' => 'Productos y servicios más destacados',
            ],
            [
                'section_key' => 'brands',
                'title' => 'Nuestras marcas aliadas',
                'subtitle' => 'Respaldados por marcas reconocidas en todo el país',
            ],
            [
                'section_key' => 'who_we_are',
                'title' => 'Quiénes somos',
                'subtitle' => null,
            ],
            [
                'section_key' => 'excellence',
                'title' => 'Nuestro compromiso es la excelencia',
                'subtitle' => null,
            ],
            [
                'section_key' => 'values',
                'title' => 'Nuestros valores',
                'subtitle' => 'Nuestros valores compartidos nos mantienen unidos y nos guían como un solo equipo.',
            ],
        ];

        foreach ($sections as $section) {
            SectionSetting::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}

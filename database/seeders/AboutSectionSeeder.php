<?php

namespace Database\Seeders;

use App\Models\AboutSection;
use Illuminate\Database\Seeder;

class AboutSectionSeeder extends Seeder
{
    public function run(): void
    {
        $aboutSection = AboutSection::updateOrCreate(
            ['id' => 1],
            [
                'title' => '¿Quiénes somos?',
                'description' => 'Somos una empresa colombiana conformada por un equipo comprometido en brindar productos y servicios de la más alta calidad. Nuestro portafolio incluye la comercialización de equipos médicos, dispositivos de endoscopía y servicios de mantenimiento. Todo ello con un propósito claro: aportar innovación y excelencia a la comunidad médica, siempre con la misión de ayudar.',
                'image' => 'about/image-about.jpg',
                'is_active' => true,
            ]
        );

        $stats = [
            ['value' => '12+', 'label' => 'Años de experiencia', 'order' => 1],
            ['value' => '8000+', 'label' => 'Equipos reparados', 'order' => 2],
            ['value' => '200+', 'label' => 'Número de clientes', 'order' => 3],
            ['value' => '+120', 'label' => 'Número de equipos vendidos', 'order' => 4],
        ];

        $aboutSection->stats()->delete();

        foreach ($stats as $stat) {
            $aboutSection->stats()->create($stat);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\WhoWeAreSection;
use Illuminate\Database\Seeder;

class WhoWeAreSectionSeeder extends Seeder
{
    public function run(): void
    {
        WhoWeAreSection::updateOrCreate(
            ['id' => 1],
            [
                'title' => '¿Quiénes somos?',
                'description' => 'Somos una empresa colombiana conformada por un equipo comprometido en brindar productos y servicios de la más alta calidad. Nuestro portafolio incluye la comercialización de equipos médicos, dispositivos de endoscopía y servicios de mantenimiento. Todo ello con un propósito claro: aportar innovación y excelencia a la comunidad médica, siempre con la misión de ayudar.',
                'image' => 'who-we-are/image-about.jpg',
                'is_active' => true,
            ]
        );
    }
}

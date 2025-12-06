<?php

namespace Database\Seeders;

use App\Models\MissionVisionSection;
use Illuminate\Database\Seeder;

class MissionVisionSectionSeeder extends Seeder
{
    public function run(): void
    {
        MissionVisionSection::updateOrCreate(
            ['id' => 1],
            [
                'background_image' => 'mission-vision/gitnik.png',
                'mission_title' => 'Nuestra misión',
                'mission_text' => 'Satisfacer las necesidades de nuestros clientes con la más alta calidad en el servicio y comercialización de equipos Biomédicos, enfocados en los profesionales de la salud y la búsqueda de calidad de vida para sus pacientes con la mejora continua de nuestros procesos.',
                'vision_title' => 'Nuestra visión',
                'vision_text' => 'Consolidarnos como el aliado estratégico más confiable del sector salud, impulsando la evolución del diagnóstico endoscópico a través de tecnología de vanguardia, soporte técnico experto y atención personalizada.',
                'is_active' => true,
            ]
        );
    }
}

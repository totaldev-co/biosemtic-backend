<?php

namespace Database\Seeders;

use App\Models\CallToActionSection;
use Illuminate\Database\Seeder;

class CallToActionSectionSeeder extends Seeder
{
    public function run(): void
    {
        CallToActionSection::updateOrCreate(
            ['id' => 1],
            [
                'title' => '¿Listo para conocer más sobre nosotros?',
                'description' => 'Estamos aquí para responder todas tus preguntas y mostrarte cómo podemos ayudarte a mejorar la atención médica en tu institución.',
                'primary_button_text' => 'Contáctanos',
                'primary_button_url' => '/contacto',
                'secondary_button_text' => 'Conoce Nuestros Servicios',
                'secondary_button_url' => '/servicios',
                'is_active' => true,
            ]
        );
    }
}

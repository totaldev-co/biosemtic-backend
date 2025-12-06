<?php

namespace Database\Seeders;

use App\Models\ExcellenceCard;
use Illuminate\Database\Seeder;

class ExcellenceCardSeeder extends Seeder
{
    public function run(): void
    {
        $cards = [
            [
                'title' => 'Tecnología médica de punta',
                'description' => 'Importamos y distribuimos equipos de última generación, asegurando que su práctica médica cuente siempre con las herramientas más innovadoras para ofrecer diagnósticos precisos generando calidad de vida en los pacientes.',
                'icon' => 'excellence/tech.png',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Servicio integral y confiable',
                'description' => 'Nuestra oferta va más allá de la venta. Proporcionamos un servicio completo de suministro de dispositivos y un mantenimiento correctivo y preventivo de la más alta calidad.',
                'icon' => 'excellence/service.png',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Tiempo de respuesta inigualable',
                'description' => 'Entendemos que en el ámbito médico, la inmediatez es vital. Por ello, garantizamos los mejores tiempos de respuesta del mercado, asegurando la operatividad continua de sus equipos y minimizando cualquier interrupción en sus procedimientos.',
                'icon' => 'excellence/time.png',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($cards as $card) {
            ExcellenceCard::updateOrCreate(
                ['title' => $card['title']],
                $card
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\HeroSlide;
use Illuminate\Database\Seeder;

class HeroSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $slides = [
            [
                'title' => 'Especialistas en equipos médicos',
                'description' => 'Contamos con las mejores marcas, equipos y tecnología para facilitar tus procedimientos médicos',
                'image' => 'hero-slides/first_image.png',
                'button_text' => 'Contáctanos Ahora',
                'button_url' => 'https://api.whatsapp.com/send/?phone=573185277390&text&type=phone_number&app_absent=0&wame_ctl=1',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Mantenimiento de primera',
                'description' => 'Más de 15 años de experiencia brindando soporte técnico especializado y respuesta rápida garantizada.',
                'image' => 'hero-slides/second_image.png',
                'button_text' => 'Contáctanos Ahora',
                'button_url' => 'https://api.whatsapp.com/send/?phone=573185277390&text&type=phone_number&app_absent=0&wame_ctl=1',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Seguridad y soporte en tus procedimientos',
                'description' => 'Brindamos soluciones integrales de alta calidad para el sector salud en toda Colombia.',
                'image' => 'hero-slides/third_image.png',
                'button_text' => 'Contáctanos Ahora',
                'button_url' => 'https://api.whatsapp.com/send/?phone=573185277390&text&type=phone_number&app_absent=0&wame_ctl=1',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($slides as $slide) {
            HeroSlide::updateOrCreate(
                ['order' => $slide['order']],
                $slide
            );
        }
    }
}

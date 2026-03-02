<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'title' => 'Comercialización',
                'description' => 'Ofrecemos equipos y dispositivos médicos de alta calidad, respaldados por marcas reconocidas a nivel nacional',
                'icon' => 'services/first_icon.png',
                'items' => [
                    'Equipos de endoscopia.',
                    'Dispositivos para gastroenterología y neumología.',
                ],
                'link_url' => '/productos',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Mantenimiento',
                'description' => 'Brindamos soporte técnico para garantizar el óptimo funcionamiento de sus equipos médicos',
                'icon' => 'services/second_icon.png',
                'items' => [
                    'Mantenimiento preventivo y correctivo.',
                    'Servicio especializado en equipos de endoscopia.',
                ],
                'link_url' => '/servicios?tab=preventivo',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Alquiler',
                'description' => 'Servicio de alquiler en equipos médicos de alta tecnología y calidad.',
                'icon' => 'services/third_icon.png',
                'items' => [
                    'Torres de endoscopia',
                    'Monitores',
                ],
                'link_url' => '/servicios?tab=alquiler',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['title' => $service['title']],
                $service
            );
        }
    }
}

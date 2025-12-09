<?php

namespace Database\Seeders;

use App\Models\ServiceItem;
use Illuminate\Database\Seeder;

class ServiceItemSeeder extends Seeder
{
    public function run(): void
    {
        $serviceItems = [
            [
                'title' => 'Mantenimiento preventivo',
                'description' => 'Realizamos el mantenimiento preventivo, la inspección, detección y corrección programada de fallas o deterioros antes de que ocurran para evitar interrupciones o averías en el equipo médico',
                'image' => 'service-items/maintenance-p.jpg',
                'items' => [
                    'Inspección detallada',
                    'Diagnóstico',
                    'Ajuste de partes',
                    'Limpieza',
                    'Ajuste de angulación',
                    'Lubricación de empaques',
                ],
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Mantenimiento correctivo',
                'description' => 'Te brindamos mantenimiento correctivo, la reparación no planificada que se realiza a un equipo o componente después de que ha fallado o se ha averiado para restaurar su funcionamiento.',
                'image' => 'service-items/maintenance-c.png',
                'items' => [
                    'Reparaciones en campo.',
                    'Reparaciones en laboratorio.',
                ],
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Alquiler',
                'description' => 'Contamos con un amplio catálogo de equipos médicos de alta calidad a tu disposición.',
                'image' => 'service-items/borrow.png',
                'items' => [
                    'Videocolonoscopio',
                    'Videogastroscopio',
                    'Videoduodenoscopio',
                    'Broncofibroscopios',
                    'Video broncoscopios',
                    'Torres de endoscopia',
                    'Procesadoras de video',
                    'Fuentes de luz',
                    'Monitor de video',
                    'Monitor de signos vitales',
                    'Aspiradores (succionadores)',
                ],
                'order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Asesorías y capacitaciones',
                'description' => 'Te brindamos la mejor asesoría en equipos y te capacitamos para alargar su vida útil.',
                'image' => 'service-items/learning.png',
                'items' => [
                    'Capacitaciones de entrenamiento y reprocesamiento.',
                    'Capacitaciones de limpieza y desinfección de los equipos.',
                ],
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($serviceItems as $item) {
            ServiceItem::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}

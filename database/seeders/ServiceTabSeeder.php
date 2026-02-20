<?php

namespace Database\Seeders;

use App\Models\ServiceTab;
use Illuminate\Database\Seeder;

class ServiceTabSeeder extends Seeder
{
    public function run(): void
    {
        $tabs = [
            [
                'slug' => 'preventivo',
                'tab_name' => 'Mantenimiento preventivo',
                'title' => 'Mantenimiento preventivo',
                'description' => 'Realizamos el mantenimiento preventivo, la inspección, detección y corrección programada de fallas o deterioros antes de que ocurran para evitar interrupciones o averías en el equipo médico.',
                'features' => [
                    'Inspección detallada',
                    'Diagnóstico',
                    'Ajuste de partes',
                    'Limpieza',
                    'Ajuste de angulación',
                    'Lubricación de empaques',
                ],
                'image' => 'service-items/preventive/maintenance-p.jpg',
                'bottom_image' => 'service-items/preventive/maintenance-p.jpg',
                'has_button' => false,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'slug' => 'correctivo',
                'tab_name' => 'Mantenimiento correctivo',
                'title' => 'Mantenimiento correctivo',
                'description' => 'Te brindamos mantenimiento correctivo, la reparación no planificada que se realiza a un equipo o componente después de que ha fallado o se ha averiado para restaurar su funcionamiento.',
                'features' => [
                    'Reparaciones en campo.',
                    'Reparaciones en laboratorio.',
                    'Contamos con los mejores repuestos en el mercado y reparaciones en tiempo record.',
                ],
                'image' => 'service-items/corrective/maintenance-c.png',
                'bottom_image' => null,
                'has_button' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'slug' => 'alquiler',
                'tab_name' => 'Alquiler',
                'title' => 'Alquiler',
                'description' => 'Contamos con un amplio catálogo de equipos médicos de alta calidad a tu disposición.',
                'features' => null,
                'image' => 'service-items/rent/borrow.png',
                'bottom_image' => null,
                'has_button' => false,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'slug' => 'asesorias',
                'tab_name' => 'Asesorías y capacitaciones',
                'title' => 'Asesorías y capacitaciones',
                'description' => 'Te brindamos la mejor asesoría en equipos y te capacitamos para alargar su vida útil. Programas de formación especializados diseñados para dotar al personal de la salud con las competencias técnicas y operativas necesarias para el uso seguro y la maximización del rendimiento de equipos biomédicos. El enfoque en Reprocesamiento garantiza la aplicación rigurosa de protocolos de limpieza, desinfección y esterilización de dispositivos médicos reutilizables, asegurando la seguridad del paciente, el control de infecciones y el cumplimiento estricto de la normatividad.',
                'features' => [
                    'Capacitaciones de entrenamiento y reprocesamiento.',
                    'Capacitaciones de limpieza y desinfección de los equipos.',
                ],
                'image' => 'service-items/training/learning.png',
                'bottom_image' => null,
                'has_button' => true,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($tabs as $tab) {
            ServiceTab::updateOrCreate(
                ['slug' => $tab['slug']],
                $tab
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        $news = [
            [
                'title' => 'Plan de mantenimiento anual',
                'description' => 'Asegura el funcionamiento óptimo de tus equipos con nuestro plan de mantenimiento preventivo',
                'image' => 'news/maintenance.png',
                'top_left_text' => 'Nombre del equipo',
                'top_right_text' => 'Venta de equipos',
                'link_text' => 'Solicitar cotización',
                'link_url' => '/contacto',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Nuevos equipos 2025',
                'description' => 'Descubre nuestra nueva línea de equipos médicos con tecnología de ultima generación',
                'image' => 'news/equipment.jpg',
                'top_left_text' => 'Nombre del equipo',
                'top_right_text' => 'Venta de equipos',
                'link_text' => 'Ver catálogo',
                'link_url' => '/productos',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($news as $item) {
            News::updateOrCreate(
                ['order' => $item['order']],
                $item
            );
        }
    }
}

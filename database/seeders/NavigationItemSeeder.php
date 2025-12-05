<?php

namespace Database\Seeders;

use App\Models\NavigationItem;
use Illuminate\Database\Seeder;

class NavigationItemSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'name' => 'home',
                'label' => 'Inicio',
                'path' => '/',
                'order' => 1,
            ],
            [
                'name' => 'nosotros',
                'label' => 'Nosotros',
                'path' => '/nosotros',
                'order' => 2,
            ],
            [
                'name' => 'productos',
                'label' => 'Productos',
                'path' => '/productos',
                'order' => 3,
            ],
            [
                'name' => 'servicios',
                'label' => 'Servicios',
                'path' => '/servicios',
                'order' => 4,
            ],
            [
                'name' => 'contacto',
                'label' => 'Contacto',
                'path' => '/contacto',
                'order' => 5,
            ],
        ];

        foreach ($items as $item) {
            NavigationItem::updateOrCreate(
                ['name' => $item['name']],
                array_merge($item, ['is_active' => true])
            );
        }
    }
}

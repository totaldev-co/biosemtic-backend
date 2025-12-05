<?php

namespace Database\Seeders;

use App\Models\FooterServiceLink;
use Illuminate\Database\Seeder;

class FooterServiceLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            [
                'label' => 'Mantenimiento',
                'url' => '/servicios',
                'badge' => null,
                'order' => 1,
            ],
            [
                'label' => 'Reparación',
                'url' => '/servicios',
                'badge' => null,
                'order' => 2,
            ],
            [
                'label' => 'Comercialización',
                'url' => '/servicios',
                'badge' => 'Nuevo',
                'order' => 3,
            ],
            [
                'label' => 'Soporte técnico',
                'url' => '/servicios',
                'badge' => null,
                'order' => 4,
            ],
        ];

        foreach ($links as $link) {
            FooterServiceLink::updateOrCreate(
                ['label' => $link['label']],
                array_merge($link, ['is_active' => true])
            );
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\ProductFaq;
use Illuminate\Database\Seeder;

class ProductFaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'icon' => 'products/questions/hearth.png',
                'title' => '¿Cómo puedo solicitar una demostración de los equipos médicos?',
                'text' => 'Puedes solicitar una demostración a través de nuestro formulario web o contactando a nuestro equipo de ventas. Realizamos presentaciones tanto virtuales como presenciales para mostrar el uso y los beneficios de cada dispositivo biomédico.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'products/questions/transfer.png',
                'title' => '¿Qué tipo de mantenimiento requieren los equipos médicos?',
                'text' => 'Todos nuestros equipos médicos requieren mantenimiento preventivo y correctivo realizado por técnicos certificados. Recomendamos un calendario de revisiones periódicas para garantizar el funcionamiento y la seguridad de cada dispositivo.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'products/questions/block.png',
                'title' => '¿Cómo sé si necesito reparar o renovar mi equipo médico?',
                'text' => 'Si tu equipo presenta errores de medición, alarmas recurrentes o desgaste visible, lo ideal es contactar a nuestro servicio técnico especializado. Evaluaremos si es factible una reparación o si conviene considerar la renovación por un modelo más avanzado.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            ProductFaq::updateOrCreate(
                ['title' => $faq['title']],
                $faq
            );
        }
    }
}

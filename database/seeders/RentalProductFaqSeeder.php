<?php

namespace Database\Seeders;

use App\Models\RentalProductFaq;
use Illuminate\Database\Seeder;

class RentalProductFaqSeeder extends Seeder
{
    public function run(): void
    {
        $faqs = [
            [
                'icon' => 'service-items/rent/questions/hearth.png',
                'title' => '¿Cuáles son los requisitos para alquilar equipos médicos?',
                'text' => 'Para alquilar equipos médicos necesitas presentar documentación de tu institución o consultorio, firmar un contrato de alquiler y realizar el depósito de garantía correspondiente. Nuestro equipo te guiará en todo el proceso.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'service-items/rent/questions/transfer.png',
                'title' => '¿Qué incluye el servicio de alquiler de equipos?',
                'text' => 'Nuestro servicio de alquiler incluye la entrega e instalación del equipo, capacitación básica de uso, soporte técnico durante el período de alquiler y mantenimiento preventivo programado.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'service-items/rent/questions/block.png',
                'title' => '¿Cuáles son los plazos mínimos y máximos de alquiler?',
                'text' => 'Ofrecemos alquileres desde períodos cortos (días o semanas) hasta contratos de largo plazo (meses o años). Los plazos y tarifas varían según el tipo de equipo y la duración del contrato.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            RentalProductFaq::updateOrCreate(
                ['title' => $faq['title']],
                $faq
            );
        }
    }
}

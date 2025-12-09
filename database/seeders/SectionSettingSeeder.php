<?php

namespace Database\Seeders;

use App\Models\SectionSetting;
use Illuminate\Database\Seeder;

class SectionSettingSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [
            [
                'section_key' => 'services',
                'title' => 'Lo que ofrecemos',
                'subtitle' => 'Ofrecemos soluciones integrales para equipos médicos con la más alta calidad y tecnología',
            ],
            [
                'section_key' => 'clients',
                'title' => 'Nuestros clientes',
                'subtitle' => 'Trabajamos junto a quienes cuidan la vida',
            ],
            [
                'section_key' => 'news',
                'title' => 'Novedades',
                'subtitle' => 'Productos y servicios más destacados',
            ],
            [
                'section_key' => 'brands',
                'title' => 'Nuestras marcas aliadas',
                'subtitle' => 'Respaldados por marcas reconocidas en todo el país',
            ],
            [
                'section_key' => 'who_we_are',
                'title' => 'Quiénes somos',
                'subtitle' => null,
            ],
            [
                'section_key' => 'excellence',
                'title' => 'Nuestro compromiso es la excelencia',
                'subtitle' => null,
            ],
            [
                'section_key' => 'values',
                'title' => 'Nuestros valores',
                'subtitle' => 'Nuestros valores compartidos nos mantienen unidos y nos guían como un solo equipo.',
            ],
            [
                'section_key' => 'mission_vision',
                'title' => 'Misión y visión',
                'subtitle' => null,
            ],
            [
                'section_key' => 'client_testimonials',
                'title' => 'Nuestros clientes',
                'subtitle' => null,
            ],
            [
                'section_key' => 'contact_info',
                'title' => '¿Tienes dudas? Contáctanos',
                'subtitle' => 'Atendemos tu solicitud, brindamos asesoría especializada',
            ],
            // Productos
            [
                'section_key' => 'products_header',
                'title' => 'Productos',
                'subtitle' => 'Ofrecemos un amplio catálogo de equipos y dispositivos médicos de la más alta calidad.',
            ],
            [
                'section_key' => 'products_quote',
                'title' => '¿Necesita una cotización?',
                'subtitle' => 'Nuestro equipo técnico le responderá en menos de 2 horas',
            ],
            [
                'section_key' => 'product_faqs',
                'title' => 'Preguntas Frecuentes',
                'subtitle' => 'Encuentra respuestas claras a las consultas más habituales sobre nuestros equipos médicos, servicios, procesos de venta y soporte técnico.',
            ],
            // Servicios Page
            [
                'section_key' => 'services_header',
                'title' => 'Servicios',
                'subtitle' => 'Te brindamos mantenimiento y alquiler especializado gastroenterología y otros equipos. Además, contamos con capacitaciones con personal calificado.',
            ],
            [
                'section_key' => 'services_custom',
                'title' => '¿Necesitas un servicio no listado?',
                'subtitle' => 'Comunicate con nosotros para preguntar por un servicio personalizado',
            ],
            // Contacto Page
            [
                'section_key' => 'contact_header',
                'title' => 'Contáctanos',
                'subtitle' => 'Recibe soporte inmediato y asesoría especializada para tus equipos médicos',
            ],
            [
                'section_key' => 'contact_form',
                'title' => '¿Tienes dudas? Contáctanos',
                'subtitle' => 'Atendemos tu solicitud, brindamos asesoría especializada',
            ],
        ];

        foreach ($sections as $section) {
            SectionSetting::updateOrCreate(
                ['section_key' => $section['section_key']],
                $section
            );
        }
    }
}

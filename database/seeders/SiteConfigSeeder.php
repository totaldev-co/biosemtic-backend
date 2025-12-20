<?php

namespace Database\Seeders;

use App\Models\SiteConfig;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SiteConfigSeeder extends Seeder
{
    public function run(): void
    {
        SiteConfig::updateOrCreate(
            ['id' => 1],
            [
                'logo_header' => 'site/logo-header.png',
                'logo_footer' => 'site/logo-footer.svg',
                'footer_description' => 'Especialistas en equipos médicos con más de 15 años de experiencia',
                'footer_services_title' => 'Servicios',
                'footer_contact_title' => 'Contacto',
                'copyright_text' => '© ' . date('Y') . ' Biosimtec. Todos los derechos reservados.',
                'whatsapp_url' => 'https://api.whatsapp.com/send/?phone=573185277390&text&type=phone_number&app_absent=0&wame_ctl=1',
                'facebook_url' => 'https://www.facebook.com/biosimtecsas',
                'instagram_url' => 'https://www.instagram.com/biosimtec.sas/',
                'linkedin_url' => null,
                'youtube_url' => null,
                'whatsapp_icon' => 'site/whatsapp.png',
                'facebook_icon' => 'site/facebook.png',
                'instagram_icon' => 'site/instagram.png',
                'privacy_policy_pdf' => 'legal/politica-privacidad.pdf',
                'is_active' => true,
            ]
        );
    }
}

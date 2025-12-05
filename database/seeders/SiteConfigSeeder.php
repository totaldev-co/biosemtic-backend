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
        // Copiar imágenes al storage
        $this->copyImages();

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
                'is_active' => true,
            ]
        );
    }

    private function copyImages(): void
    {
        // Crear directorio si no existe
        Storage::disk('public')->makeDirectory('site');

        // Rutas de las imágenes del frontend
        $frontendPath = base_path('../biosemtic-frontend/src/assets/images');

        // Copiar logo header
        $logoHeader = $frontendPath . '/header/Logo-header.png';
        if (File::exists($logoHeader)) {
            Storage::disk('public')->put('site/logo-header.png', File::get($logoHeader));
        }

        // Copiar logo footer
        $logoFooter = $frontendPath . '/footer/logo.svg';
        if (File::exists($logoFooter)) {
            Storage::disk('public')->put('site/logo-footer.svg', File::get($logoFooter));
        }

        // Copiar iconos de redes sociales
        $whatsapp = $frontendPath . '/header/whatsapp.png';
        if (File::exists($whatsapp)) {
            Storage::disk('public')->put('site/whatsapp.png', File::get($whatsapp));
        }

        $facebook = $frontendPath . '/header/Facebook.png';
        if (File::exists($facebook)) {
            Storage::disk('public')->put('site/facebook.png', File::get($facebook));
        }

        $instagram = $frontendPath . '/header/instagram.png';
        if (File::exists($instagram)) {
            Storage::disk('public')->put('site/instagram.png', File::get($instagram));
        }
    }
}

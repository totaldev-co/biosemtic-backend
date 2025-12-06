<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use App\Models\Brand;
use App\Models\Client;
use App\Models\ContactInfo;
use App\Models\HeroSlide;
use App\Models\News;
use App\Models\SectionSetting;
use App\Models\Service;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * Obtener los títulos y subtítulos de las secciones
     * GET /api/home/section-settings
     */
    public function sectionSettings(): Response
    {
        $data = SectionSetting::getCached();

        return RB::success($data);
    }

    /**
     * Obtener los slides del hero section
     * GET /api/home/hero-slides
     */
    public function heroSlides(): Response
    {
        $data = HeroSlide::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener la sección "Quiénes Somos"
     * GET /api/home/about
     */
    public function about(): Response
    {
        $data = AboutSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        // Retornar solo el primer registro (es una sección única)
        return RB::success($data[0] ?? null);
    }

    /**
     * Obtener los servicios
     * GET /api/home/services
     */
    public function services(): Response
    {
        $data = Service::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener los clientes
     * GET /api/home/clients
     */
    public function clients(): Response
    {
        $data = Client::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener las noticias
     * GET /api/home/news
     */
    public function news(): Response
    {
        $data = News::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener las marcas
     * GET /api/home/brands
     */
    public function brands(): Response
    {
        $data = Brand::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener información de contacto
     * GET /api/home/contact-info
     */
    public function contactInfo(): Response
    {
        $data = ContactInfo::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        // Retornar solo el primer registro (es una sección única)
        return RB::success($data[0] ?? null);
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterServiceLink;
use App\Models\NavigationItem;
use App\Models\SiteConfig;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends Controller
{
    /**
     * Obtener toda la configuración del layout (header + footer)
     * GET /api/layout
     */
    public function index(): Response
    {
        $siteConfig = SiteConfig::getCached();
        $navigation = NavigationItem::getCached();
        $footerServiceLinks = FooterServiceLink::getCached();

        return RB::success([
            'site_config' => $siteConfig,
            'navigation' => $navigation,
            'footer_service_links' => $footerServiceLinks,
        ]);
    }

    /**
     * Obtener configuración del sitio
     * GET /api/layout/site-config
     */
    public function siteConfig(): Response
    {
        $data = SiteConfig::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener items de navegación
     * GET /api/layout/navigation
     */
    public function navigation(): Response
    {
        $data = NavigationItem::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success(['items' => $data]);
    }

    /**
     * Obtener links de servicios del footer
     * GET /api/layout/footer-services
     */
    public function footerServices(): Response
    {
        $data = FooterServiceLink::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success(['items' => $data]);
    }
}

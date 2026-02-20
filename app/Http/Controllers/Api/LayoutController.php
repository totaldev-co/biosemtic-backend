<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\FooterPolicy;
use App\Models\FooterServiceLink;
use App\Models\NavigationItem;
use App\Models\SiteConfig;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class LayoutController extends Controller
{
    public function index(): Response
    {
        $siteConfig = SiteConfig::getCached();
        $navigation = NavigationItem::getCached();
        $footerServiceLinks = FooterServiceLink::getCached();
        $footerPolicies = FooterPolicy::getCached();

        return RB::success([
            'site_config' => $siteConfig,
            'navigation' => $navigation,
            'footer_service_links' => $footerServiceLinks,
            'footer_policies' => $footerPolicies,
        ]);
    }

    public function siteConfig(): Response
    {
        $data = SiteConfig::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function navigation(): Response
    {
        $data = NavigationItem::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success(['items' => $data]);
    }

    public function footerServices(): Response
    {
        $data = FooterServiceLink::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success(['items' => $data]);
    }

    public function footerPolicies(): Response
    {
        $data = FooterPolicy::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success(['items' => $data]);
    }
}

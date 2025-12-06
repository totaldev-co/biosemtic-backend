<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CompanyValue;
use App\Models\ExcellenceCard;
use App\Models\WhoWeAreSection;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    /**
     * Get Who We Are section data
     * GET /api/about-us/who-we-are
     */
    public function whoWeAre(): Response
    {
        $data = WhoWeAreSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }

    /**
     * Get Excellence section data
     * GET /api/about-us/excellence
     */
    public function excellence(): Response
    {
        $cards = ExcellenceCard::getCached();

        if (empty($cards)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($cards);
    }

    /**
     * Get Values section data
     * GET /api/about-us/values
     */
    public function values(): Response
    {
        $values = CompanyValue::getCached();

        if (empty($values)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($values);
    }
}

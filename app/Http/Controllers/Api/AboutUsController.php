<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CallToActionSection;
use App\Models\ClientTestimonial;
use App\Models\CompanyValue;
use App\Models\ExcellenceCard;
use App\Models\MissionVisionSection;
use App\Models\WhoWeAreSection;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class AboutUsController extends Controller
{
    public function whoWeAre(): Response
    {
        $data = WhoWeAreSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }

    public function excellence(): Response
    {
        $cards = ExcellenceCard::getCached();

        if (empty($cards)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($cards);
    }

    public function values(): Response
    {
        $values = CompanyValue::getCached();

        if (empty($values)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($values);
    }

    public function missionVision(): Response
    {
        $data = MissionVisionSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }

    public function clientTestimonials(): Response
    {
        $testimonials = ClientTestimonial::getCached();

        if (empty($testimonials)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($testimonials);
    }

    public function callToAction(): Response
    {
        $data = CallToActionSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }
}

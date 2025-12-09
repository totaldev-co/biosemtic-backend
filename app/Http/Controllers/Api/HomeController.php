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
    public function sectionSettings(): Response
    {
        $data = SectionSetting::getCached();

        return RB::success($data);
    }

    public function heroSlides(): Response
    {
        $data = HeroSlide::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function about(): Response
    {
        $data = AboutSection::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }

    public function services(): Response
    {
        $data = Service::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function clients(): Response
    {
        $data = Client::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function news(): Response
    {
        $data = News::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function brands(): Response
    {
        $data = Brand::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function contactInfo(): Response
    {
        $data = ContactInfo::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data[0] ?? null);
    }
}

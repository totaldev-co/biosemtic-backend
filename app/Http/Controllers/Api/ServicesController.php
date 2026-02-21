<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\SectionSetting;
use App\Models\ServiceItem;
use App\Models\ServicePlan;
use App\Models\ServiceTab;
use Illuminate\Support\Facades\Cache;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    /**
     * @deprecated Use tabs() instead
     */
    public function items(): Response
    {
        $data = ServiceItem::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function tabs(): Response
    {
        $data = ServiceTab::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    public function plans(): Response
    {
        $plans = ServicePlan::getCached();

        if (empty($plans)) {
            return RB::error(404, null, null, 404);
        }

        $sectionSettings = Cache::remember('content.service_plans_settings', 3600, function () {
            $setting = SectionSetting::where('section_key', 'service_plans')->first();
            if (!$setting) {
                return null;
            }
            return [
                'title' => $setting->title,
                'subtitle' => $setting->subtitle,
                'features' => $setting->features,
            ];
        });

        return RB::success([
            'section' => $sectionSettings,
            'plans' => $plans,
        ]);
    }
}

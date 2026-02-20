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
            return [
                'title' => $setting?->title ?? 'Plan de mantenimiento Anual',
                'subtitle' => $setting?->subtitle ?? 'Este plan establece un programa proactivo y periódico de inspección, ajuste, lubricación y reparación de sus equipos clave. Su objetivo principal es prevenir fallos inesperados, asegurar el óptimo rendimiento y la extensión de la vida útil, minimizando tiempos de inactividad y garantizando la seguridad operativa durante todo el año.',
            ];
        });

        return RB::success([
            'section' => $sectionSettings,
            'plans' => $plans,
        ]);
    }
}

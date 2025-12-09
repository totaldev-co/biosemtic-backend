<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceItem;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class ServicesController extends Controller
{
    /**
     * Obtener la lista de servicios detallados
     * GET /api/services/items
     */
    public function items(): Response
    {
        $data = ServiceItem::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }
}

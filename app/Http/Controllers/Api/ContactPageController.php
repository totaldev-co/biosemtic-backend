<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactFormSection;
use App\Models\ContactInfoCard;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class ContactPageController extends Controller
{
    /**
     * Obtener la imagen del formulario de contacto
     * GET /api/contact-page/form-image
     */
    public function formImage(): Response
    {
        $data = ContactFormSection::getCached();

        if (!$data) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }

    /**
     * Obtener las tarjetas de información de contacto
     * GET /api/contact-page/info-cards
     */
    public function infoCards(): Response
    {
        $data = ContactInfoCard::getCached();

        if (empty($data)) {
            return RB::error(404, null, null, 404);
        }

        return RB::success($data);
    }
}

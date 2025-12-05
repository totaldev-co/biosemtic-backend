<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequestFormRequest;
use App\Models\ContactRequest;
use MarcinOrlowski\ResponseBuilder\ResponseBuilder as RB;
use Symfony\Component\HttpFoundation\Response;

class ContentController extends Controller
{
    /**
     * Enviar solicitud de contacto
     * POST /api/contact/request
     */
    public function storeContactRequest(ContactRequestFormRequest $request): Response
    {
        $contactRequest = ContactRequest::create($request->validated());

        return RB::success([
            'id' => $contactRequest->id,
            'message' => 'Solicitud enviada correctamente'
        ], null, null, 201);
    }
}

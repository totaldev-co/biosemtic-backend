<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequestFormRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|in:consulta,cotizacion,soporte,otro',
            'message' => 'required|string|max:2000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'El nombre es requerido',
            'name.max' => 'El nombre no debe exceder 255 caracteres',
            'email.required' => 'El correo es requerido',
            'email.email' => 'El correo debe ser válido',
            'email.max' => 'El correo no debe exceder 255 caracteres',
            'phone.max' => 'El teléfono no debe exceder 50 caracteres',
            'company.max' => 'La empresa no debe exceder 255 caracteres',
            'subject.required' => 'El asunto es requerido',
            'subject.in' => 'El asunto no es válido',
            'message.required' => 'El mensaje es requerido',
            'message.max' => 'El mensaje no debe exceder 2000 caracteres',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => 'nombre',
            'email' => 'correo electrónico',
            'phone' => 'teléfono',
            'company' => 'empresa',
            'subject' => 'asunto',
            'message' => 'mensaje',
        ];
    }
}

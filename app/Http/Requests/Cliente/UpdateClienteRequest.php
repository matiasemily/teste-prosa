<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class UpdateClienteRequest
 * @package App\Http\Requests\Cliente
 */
class UpdateClienteRequest extends FormRequest
{
    /**
     * Determina se o cliente é autorizado a fazer essa solicitação.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Recebe as regras de validação que se aplicam a essa solicitação.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'min:2',
                'max:255'
            ],
            'email' => [
                'required',
                'string',
                'lowercase',
                'email',
                'max:255',
            ],
            'telephone' => [
                'required',
                'string',
                'min:11',
                'regex:/^\d{2}\d{9}$/'
            ],
            'zip_code' => [
                'nullable',
                'string',
                'max:8',
                'regex:/^\d{8}$/'
            ],
            'street' => [
                'nullable',
                'string',
                'max:255'
            ],
            'neighborhood' => [
                'nullable',
                'string',
                'max:255'
            ],
            'city' => [
                'nullable',
                'string',
                'max:255'
            ],
            'state' => [
                'nullable',
                'string',
                'max:2'
            ]
        ];
    }
}

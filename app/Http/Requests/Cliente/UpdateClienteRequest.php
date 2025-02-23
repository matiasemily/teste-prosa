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
                'sometimes',
                'string',
                'min:2',
                'max:255'
            ],
            'email' => [
                'sometimes',
                'string',
                'lowercase',
                'email',
                'max:255',
                'unique:clientes,email,' .
                $this->route(
                    'id'
                )
            ],
            'telephone' => [
                'sometimes',
                'string',
                'min:11',
                'regex:/^\d{2}\d{9}$/'
            ],
            'zip_code' => [
                'sometimes',
                'string',
                'min:8',
                'regex:/^\d{8}$/'
            ],
            'address' => [
                'sometimes',
                'string',
                'max:255'
            ],
            'password' => [
                'nullable',
                'string',
                'min:8',
                'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/'
            ]
        ];
    }
}

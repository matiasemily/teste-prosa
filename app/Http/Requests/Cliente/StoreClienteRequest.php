<?php

namespace App\Http\Requests\Cliente;

use App\Models\Cliente;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Class StoreClienteRequest
 * @package App\Http\Requests\Cliente
 */
class StoreClienteRequest extends FormRequest
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
                Rule::unique(Cliente::class)->ignore($this->cliente()->id)
            ],
            'telephone' => [
                'required',
                'string',
                'min:11',
                # 'regex:/^\d{2}\d{9}$/'
            ],
            'zip_code' => [
                'required',
                'string',
                'max:8',
                # 'regex:/^\d{8}$/'
            ],
            'street' => [
                'required',
                'string',
                'max:255'
            ],
            'neighborhood' => [
                'required',
                'string',
                'max:255'
            ],
            'city' => [
                'required',
                'string',
                'max:255'
            ],
            'state' => [
                'required',
                'string',
                'max:2'
            ]
        ];
    }
}

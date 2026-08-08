<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nombre' => [
                'sometimes',
                'string',
                'max:50',
                Rule::unique('roles', 'nombre')->ignore($this->route('role')),
            ],

            'descripcion' => [
                'sometimes',
                'nullable',
                'string',
            ],

            'estado' => [
                'sometimes',
                'boolean',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar los 50 caracteres.',
            'nombre.unique' => 'El nombre ya existe.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}
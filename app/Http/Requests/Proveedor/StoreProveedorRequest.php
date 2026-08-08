<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            <?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProveedorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'nit' => [
                'required',
                'string',
                'max:20',
                'unique:proveedores,nit,' . $this->proveedor?->id,
            ],

            'razon_social' => [
                'required',
                'string',
                'max:255',
            ],

            'contacto' => [
                'required',
                'string',
                'max:100',
            ],

            'telefono' => [
                'required',
                'string',
                'max:20',
            ],

            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'direccion' => [
                'required',
                'string',
                'max:255',
            ],

            'estado' => [
                'required',
                'boolean',
            ],
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'nit.required' => 'El NIT es obligatorio.',
            'nit.string' => 'El NIT debe ser texto.',
            'nit.max' => 'El NIT no puede tener más de 20 caracteres.',
            'nit.unique' => 'El NIT ya está registrado.',

            'razon_social.required' => 'La razón social es obligatoria.',
            'razon_social.string' => 'La razón social debe ser texto.',
            'razon_social.max' => 'La razón social no puede tener más de 255 caracteres.',

            'contacto.required' => 'El contacto es obligatorio.',
            'contacto.string' => 'El contacto debe ser texto.',
            'contacto.max' => 'El contacto no puede tener más de 100 caracteres.',

            'telefono.required' => 'El teléfono es obligatorio.',
            'telefono.string' => 'El teléfono debe ser texto.',
            'telefono.max' => 'El teléfono no puede tener más de 20 caracteres.',

            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico no tiene un formato válido.',
            'email.max' => 'El correo electrónico no puede tener más de 255 caracteres.',

            'direccion.required' => 'La dirección es obligatoria.',
            'direccion.string' => 'La dirección debe ser texto.',
            'direccion.max' => 'La dirección no puede tener más de 255 caracteres.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
}
        ];
    }
}

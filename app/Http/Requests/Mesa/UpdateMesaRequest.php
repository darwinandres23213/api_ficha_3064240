<?php

namespace App\Http\Requests\Mesa;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateMesaRequest extends FormRequest
{
    /**
     * Determina si el usuario está autorizado
     * para realizar esta petición.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Reglas de validación para los campos de la mesa.
     */
    public function rules(): array
    {
        return [

            // Número de la mesa: es obligatorio,
            // debe ser un número entero, mayor que 0
            // y no puede repetirse en otra mesa.
            'numero' => [
                'sometimes',
                'string',
                'max:50',

                // Permite mantener el mismo número
                // cuando estamos actualizando la mesa.
                Rule::unique('mesas', 'numero')
                    ->ignore($this->route('mesa')),
            ],

            // Capacidad de la mesa: es obligatoria,
            // debe ser un número entero y mayor que 0.
            'capacidad' => [
                'sometimes',
                'integer',
                'min:1',
            ],

            // Tipo de mesa: es obligatorio,
            // debe ser texto y no superar los 50 caracteres.
            'tipo' => [
                'sometimes',
                'string',
                'in:estandar,vip,botellero',
            ],

            // Estado de la mesa: es obligatorio
            // y acepta valores booleanos.
            // Ejemplos: true, false, 1, 0.
            'estado' => [
                'sometimes',
                'string',
                'in:libre,ocupada,reservada,mantenimiento',
            ],

            // Zona: es obligatoria, debe ser un entero
            // y debe existir en la tabla "zonas".
            'zona_id' => [
                'sometimes',
                'integer',
                'exists:zonas,id',
            ],
        ];
    }

    /**
     * Mensajes personalizados de las reglas
     * de validación en español.
     */
    public function messages(): array
    {
        return [

            'numero' => 'El número de la mesa es obligatorio.',
            'numero.integer' => 'El número de la mesa debe ser un número entero.',
            'numero.min' => 'El número de la mesa debe ser mayor que 0.',
            'numero.unique' => 'El número de la mesa ya está registrado.',

            'capacidad' => 'La capacidad de la mesa es obligatoria.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser de al menos 1 persona.',

            'tipo' => 'El tipo de mesa es obligatorio.',
            'tipo.string' => 'El tipo de mesa debe ser texto.',
            'tipo.max' => 'El tipo de mesa no puede tener más de 50 caracteres.',

            'estado' => 'El estado de la mesa es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',

            'zona_id' => 'La zona es obligatoria.',
            'zona_id.integer' => 'El ID de la zona debe ser un número entero.',
            'zona_id.exists' => 'La zona seleccionada no existe.',
        ];
    }
}
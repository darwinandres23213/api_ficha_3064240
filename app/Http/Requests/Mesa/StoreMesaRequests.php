<?php

namespace App\Http\Requests\Mesa;

use Illuminate\Foundation\Http\FormRequest;

class MesaRequest extends FormRequest
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
            // debe ser un número entero y mayor que 0.
            'numero' => [
                'required',
                'integer',
                'min:1',
            ],

            // Capacidad: es obligatoria,
            // debe ser un número entero y mayor que 0.
            'capacidad' => [
                'required',
                'integer',
                'min:1',
            ],

            // Tipo de mesa: es obligatorio,
            // debe ser texto y no superar los 50 caracteres.
            'tipo' => [
                'required',
                'string',
                'max:50',
            ],

            // Estado de la mesa: es obligatorio
            // y solamente acepta valores booleanos.
            // Ejemplos: true, false, 1, 0.
            'estado' => [
                'required',
                'boolean',
            ],

            // Zona: es obligatoria y debe existir
            // un registro con ese ID en la tabla "zonas".
            'zona_id' => [
                'required',
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

            'numero.required' => 'El número de la mesa es obligatorio.',
            'numero.integer' => 'El número de la mesa debe ser un número entero.',
            'numero.min' => 'El número de la mesa debe ser mayor que 0.',

            'capacidad.required' => 'La capacidad de la mesa es obligatoria.',
            'capacidad.integer' => 'La capacidad debe ser un número entero.',
            'capacidad.min' => 'La capacidad debe ser de al menos 1 persona.',

            'tipo.required' => 'El tipo de mesa es obligatorio.',
            'tipo.string' => 'El tipo de mesa debe ser texto.',
            'tipo.max' => 'El tipo de mesa no puede tener más de 50 caracteres.',

            'estado.required' => 'El estado de la mesa es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',

            'zona_id.required' => 'La zona es obligatoria.',
            'zona_id.integer' => 'El ID de la zona debe ser un número entero.',
            'zona_id.exists' => 'La zona seleccionada no existe.',
        ];
    }
}
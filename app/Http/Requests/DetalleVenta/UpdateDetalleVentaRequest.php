<?php

namespace App\Http\Requests\DetalleVenta;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetalleVentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'venta_id' => [
                'sometimes',
                'integer',
                'exists:ventas,id',
            ],

            'producto_id' => [
                'sometimes',
                'integer',
                'exists:productos,id',
            ],

            'cantidad' => [
                'sometimes',
                'integer',
                'min:1',
            ],

            'precio_unitario' => [
                'sometimes',
                'numeric',
                'min:0',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'venta_id.integer' => 'El ID de la venta debe ser un número entero.',
            'venta_id.exists' => 'La venta seleccionada no existe.',

            'producto_id.integer' => 'El ID del producto debe ser un número entero.',
            'producto_id.exists' => 'El producto seleccionado no existe.',

            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser como mínimo 1.',

            'precio_unitario.numeric' => 'El precio unitario debe ser un número.',
            'precio_unitario.min' => 'El precio unitario no puede ser negativo.',
        ];
    }
}

<?php

namespace App\Http\Requests\DetalleVenta;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;


class StoreDetalleVentaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'venta_id' => 'required|integer|exists:ventas,id',
            'producto_id' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio_unitario' => 'required|numeric|min:0',
            'subtotal' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'venta_id.required' => 'La venta es obligatoria.',
            'venta_id.integer' => 'El ID de la venta debe ser un número entero.',
            'venta_id.exists' => 'La venta seleccionada no existe.',

            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.integer' => 'El ID del producto debe ser un número entero.',
            'producto_id.exists' => 'El producto seleccionado no existe.',

            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad.integer' => 'La cantidad debe ser un número entero.',
            'cantidad.min' => 'La cantidad debe ser como mínimo 1.',

            'precio_unitario.required' => 'El precio unitario es obligatorio.',
            'precio_unitario.numeric' => 'El precio unitario debe ser un número.',
            'precio_unitario.min' => 'El precio unitario no puede ser negativo.',

            'subtotal.required' => 'El subtotal es obligatorio.',
            'subtotal.numeric' => 'El subtotal debe ser un número.',
            'subtotal.min' => 'El subtotal no puede ser negativo.',
        ];
    }
}

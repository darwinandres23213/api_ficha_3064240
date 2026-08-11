<?php

namespace App\Http\Requests\Inventario;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreInventarioRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'producto_id' => 'required|integer|exists:productos,id',
            'stock_actual' => 'required|integer|min:0',
            'stock_minimo' => 'required|integer|min:0',
            'ubicacion' => 'nullable|string|max:80',
            'ultima_entrada' => 'nullable|date',
            'ultima_salida' => 'nullable|date',
        ];
    }

    public function messages(): array
    {
        return [
            'producto_id.required' => 'El producto es obligatorio.',
            'producto_id.integer' => 'El producto debe ser un número entero.',
            'producto_id.exists' => 'El producto seleccionado no existe.',

            'stock_actual.required' => 'El stock actual es obligatorio.',
            'stock_actual.integer' => 'El stock actual debe ser un número entero.',
            'stock_actual.min' => 'El stock actual no puede ser negativo.',

            'stock_minimo.required' => 'El stock mínimo es obligatorio.',
            'stock_minimo.integer' => 'El stock mínimo debe ser un número entero.',
            'stock_minimo.min' => 'El stock mínimo no puede ser negativo.',

            'ubicacion.string' => 'La ubicación debe ser texto.',
            'ubicacion.max' => 'La ubicación no puede superar los 80 caracteres.',

            'ultima_entrada.date' => 'La última entrada debe ser una fecha válida.',
            'ultima_salida.date' => 'La última salida debe ser una fecha válida.',
        ];
    }
}

<?php

namespace App\Http\Requests\Producto;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreProductoRequest extends FormRequest
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
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'categoria_id' => 'required|integer|min:1',
            'proveedor_id' => 'nullable|integer|min:1',
            'codigo' => 'required|string|max:30|unique:productos,codigo',
            'nombre' => 'required|string|max:120',
            'descripcion' => 'nullable|string',
            'precio_venta' => 'required|numeric|min:0',
            'precio_compra' => 'nullable|numeric|min:0',
            'estado' => 'required|in:1,0',
            'unidad_medida' => 'required|string|max:20',
        ];
    }

    /**
     * Mensajes personalizados en español
     */
    public function messages(): array
    {
        return [
            'categoria_id.required' => 'La categoría es obligatoria.',
            'categoria_id.integer' => 'La categoría debe ser un número entero.',
            'categoria_id.min' => 'La categoría debe ser mayor a 0.',

            'proveedor_id.integer' => 'El proveedor debe ser un número entero.',
            'proveedor_id.min' => 'El proveedor debe ser mayor a 0.',

            'codigo.required' => 'El código es obligatorio.',
            'codigo.string' => 'El código debe ser texto.',
            'codigo.max' => 'El código no puede tener más de 30 caracteres.',
            'codigo.unique' => 'Este código ya está registrado.',

            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede tener más de 120 caracteres.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'precio_venta.required' => 'El precio de venta es obligatorio.',
            'precio_venta.numeric' => 'El precio de venta debe ser un número.',
            'precio_venta.min' => 'El precio de venta no puede ser negativo.',

            'precio_compra.numeric' => 'El precio de compra debe ser un número.',
            'precio_compra.min' => 'El precio de compra no puede ser negativo.',

            'estado.required' => 'El estado es obligatorio.',
            'estado.in' => 'El estado debe ser 1 (activo) o 0 (inactivo).',

            'unidad_medida.required' => 'La unidad de medida es obligatoria.',
            'unidad_medida.string' => 'La unidad de medida debe ser texto.',
            'unidad_medida.max' => 'La unidad de medida no puede tener más de 20 caracteres.',
        ];
    }
}
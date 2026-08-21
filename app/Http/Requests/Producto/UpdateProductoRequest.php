<?php

namespace App\Http\Requests\Producto;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductoRequest extends FormRequest
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
            // Categoría opcional, debe ser un número entero positivo
            'categoria_id' => 'sometimes|integer|min:1',

            // Proveedor opcional, puede ser null
            'proveedor_id' => 'sometimes|nullable|integer|min:1',

            // Código opcional, máximo 30 caracteres y único ignorando el registro actual
            'codigo' => [
                'sometimes',
                'string',
                'max:30',
                Rule::unique('productos', 'codigo')->ignore($this->route('producto'))
            ],

            // Nombre opcional, máximo 120 caracteres
            'nombre' => 'sometimes|string|max:120',

            // Descripción opcional
            'descripcion' => 'nullable|string',

            // Precio de venta opcional, número >= 0
            'precio_venta' => 'sometimes|numeric|min:0',

            // Precio de compra opcional, puede ser null
            'precio_compra' => 'sometimes|nullable|numeric|min:0',

            // Estado opcional, solo permite 1 o 0
            'estado' => 'sometimes|in:1,0',

            // Unidad de medida opcional, máximo 20 caracteres
            'unidad_medida' => 'sometimes|string|max:20',
        ];
    }

    /**
     * Mensajes personalizados en español
     */
    public function messages(): array
    {
        return [
            'categoria_id.integer' => 'La categoría debe ser un número entero.',
            'categoria_id.min' => 'La categoría debe ser mayor a 0.',

            'proveedor_id.integer' => 'El proveedor debe ser un número entero.',
            'proveedor_id.min' => 'El proveedor debe ser mayor a 0.',

            'codigo.string' => 'El código debe ser texto.',
            'codigo.max' => 'El código no puede tener más de 30 caracteres.',
            'codigo.unique' => 'Este código ya está registrado.',

            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede tener más de 120 caracteres.',

            'descripcion.string' => 'La descripción debe ser texto.',

            'precio_venta.numeric' => 'El precio de venta debe ser un número.',
            'precio_venta.min' => 'El precio de venta no puede ser negativo.',

            'precio_compra.numeric' => 'El precio de compra debe ser un número.',
            'precio_compra.min' => 'El precio de compra no puede ser negativo.',

            'estado.in' => 'El estado debe ser 1 (activo) o 0 (inactivo).',

            'unidad_medida.string' => 'La unidad de medida debe ser texto.',
            'unidad_medida.max' => 'La unidad de medida no puede tener más de 20 caracteres.',
        ];
    }
}
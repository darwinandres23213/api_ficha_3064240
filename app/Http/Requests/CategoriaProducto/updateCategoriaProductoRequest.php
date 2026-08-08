<?php

namespace App\Http\CategoriaProducto;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class updateCategoriaProductoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
             public function rules(): array
    {
        // Obtiene el ID de la categoría desde el parámetro de la ruta
        $categoriaId = $this->route('categoria');

        return [
            'nombre' => [
                'required',
                'string',
                'max:100',
                Rule::unique('categorias_producto', 'nombre')->ignore($categoriaId),
            ],
            'descripcion' => ['nullable', 'string'],
            'estado' => ['sometimes', 'boolean'],
        ];
    }

    /**
     * Mensajes de error personalizados.
     */
    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre de la categoría es obligatorio.',
            'nombre.string' => 'El nombre debe ser un texto válido.',
            'nombre.max' => 'El nombre no puede superar los 100 caracteres.',
            'nombre.unique' => 'Ya existe una categoría con ese nombre.',
            'descripcion.string' => 'La descripción debe ser un texto válido.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',
        ];
    }
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            // Nombre: obligatorio, texto y máximo 150 caracteres
            'nombre' => 'required|string|max:150',

            // Descripción: obligatoria y debe ser texto
            'descripcion' => 'required|string',

            // Fecha de inicio: obligatoria y debe ser una fecha válida
            'fecha_inicio' => 'required|date',

            // Fecha de fin: obligatoria, fecha válida y posterior o igual a la fecha de inicio
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',

            // Aforo: obligatorio, debe ser un número entero y mayor que 0
            'aforo' => 'required|integer|min:1',

            // Precio: obligatorio, número decimal y no puede ser negativo
            'precio_entrada' => 'required|numeric|min:0',

            // Estado: obligatorio y debe ser verdadero o falso
            'estado' => 'required|boolean',

            // Zona: obligatoria y debe existir en la tabla zonas
            'zonas_id' => 'required|integer|exists:zonas,id',

            // Artista/DJ: obligatorio y debe existir en la tabla artistas
            'dj_artistas_id' => 'required|integer|exists:artistas,id',
        ];
    }

    public function messages(): array
    {
        return [
            'nombre.required' => 'El nombre del evento es obligatorio.',
            'nombre.string' => 'El nombre debe ser texto.',
            'nombre.max' => 'El nombre no puede superar los 150 caracteres.',

            'descripcion.required' => 'La descripción del evento es obligatoria.',
            'descripcion.string' => 'La descripción debe ser texto.',

            'fecha_inicio.required' => 'La fecha de inicio es obligatoria.',
            'fecha_inicio.date' => 'La fecha de inicio debe ser una fecha válida.',

            'fecha_fin.required' => 'La fecha de fin es obligatoria.',
            'fecha_fin.date' => 'La fecha de fin debe ser una fecha válida.',
            'fecha_fin.after_or_equal' => 'La fecha de fin debe ser igual o posterior a la fecha de inicio.',

            'aforo.required' => 'El aforo es obligatorio.',
            'aforo.integer' => 'El aforo debe ser un número entero.',
            'aforo.min' => 'El aforo debe ser como mínimo de 1 persona.',

            'precio_entrada.required' => 'El precio de entrada es obligatorio.',
            'precio_entrada.numeric' => 'El precio debe ser un número.',
            'precio_entrada.min' => 'El precio no puede ser negativo.',

            'estado.required' => 'El estado del evento es obligatorio.',
            'estado.boolean' => 'El estado debe ser verdadero o falso.',

            'zonas_id.required' => 'La zona es obligatoria.',
            'zonas_id.integer' => 'El ID de la zona debe ser un número entero.',
            'zonas_id.exists' => 'La zona seleccionada no existe.',

            'dj_artistas_id.required' => 'El artista/DJ es obligatorio.',
            'dj_artistas_id.integer' => 'El ID del artista debe ser un número entero.',
            'dj_artistas_id.exists' => 'El artista/DJ seleccionado no existe.',
        ];
    }
}
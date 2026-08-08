<?php

namespace App\Http\Proveedor;

use App\Models\Proveedor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProveedorRequest extends  FormRequest
{
    public function update(Request $request, Proveedor $proveedor)
    {
        $datos = $request->validate([
            'nit' => [
                'required',
                'string',
                'max:20',
                Rule::unique('proveedores', 'nit')->ignore($proveedor->id),
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
        ]);

        $proveedor->update($datos);

        return response()->json([
            'message' => 'Proveedor actualizado correctamente',
            'data' => $proveedor
        ], 200);
    }
}
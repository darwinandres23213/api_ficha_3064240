<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    // Listar todos los roles
    public function index()
    {
        $roles = Rol::all();

        return response()->json($roles);
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre',
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        $rol = Rol::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado ?? true,
        ]);

        return response()->json([
            'mensaje' => 'Rol creado correctamente',
            'rol' => $rol
        ], 201);
    }

    // Mostrar un rol específico
    public function show(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'mensaje' => 'Rol no encontrado'
            ], 404);
        }

        return response()->json($rol);
    }

    // Actualizar un rol
    public function update(Request $request, string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'mensaje' => 'Rol no encontrado'
            ], 404);
        }

        $request->validate([
            'nombre' => 'required|string|max:50|unique:roles,nombre,' . $id,
            'descripcion' => 'nullable|string',
            'estado' => 'boolean',
        ]);

        $rol->update([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'estado' => $request->estado ?? $rol->estado,
        ]);

        return response()->json([
            'mensaje' => 'Rol actualizado correctamente',
            'rol' => $rol
        ]);
    }

    // Eliminar un rol
    public function destroy(string $id)
    {
        $rol = Rol::find($id);

        if (!$rol) {
            return response()->json([
                'mensaje' => 'Rol no encontrado'
            ], 404);
        }

        $rol->delete();

        return response()->json([
            'mensaje' => 'Rol eliminado correctamente'
        ]);
    }
}
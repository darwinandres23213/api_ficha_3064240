<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Mostrar todos los usuarios
     */
    public function index()
    {
        $usuarios = Usuario::all();

        return response()->json($usuarios);
    }

    /**
     * Crear un nuevo usuario
     */
    public function store(Request $request)
    {
        $request->validate([
            'rol_id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'boolean'
        ]);

        $usuario = Usuario::create([
            'rol_id' => $request->rol_id,
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'estado' => $request->estado ?? true,
        ]);

        return response()->json([
            'message' => 'Usuario creado correctamente',
            'usuario' => $usuario
        ], 201);
    }

    /**
     * Mostrar un usuario específico
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        return response()->json($usuario);
    }

    /**
     * Actualizar un usuario
     */
    public function update(Request $request, string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $request->validate([
            'rol_id' => 'sometimes|integer',
            'nombre' => 'sometimes|string|max:255',
            'email' => 'sometimes|email|unique:usuarios,email,' . $id,
            'password' => 'sometimes|string|min:6',
            'telefono' => 'nullable|string|max:20',
            'estado' => 'boolean'
        ]);

        $datos = $request->only([
            'rol_id',
            'nombre',
            'email',
            'telefono',
            'estado'
        ]);

        if ($request->filled('password')) {
            $datos['password'] = Hash::make($request->password);
        }

        $usuario->update($datos);

        return response()->json([
            'message' => 'Usuario actualizado correctamente',
            'usuario' => $usuario
        ]);
    }

    /**
     * Eliminar un usuario
     */
    public function destroy(string $id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json([
                'message' => 'Usuario no encontrado'
            ], 404);
        }

        $usuario->delete();

        return response()->json([
            'message' => 'Usuario eliminado correctamente'
        ]);
    }
}
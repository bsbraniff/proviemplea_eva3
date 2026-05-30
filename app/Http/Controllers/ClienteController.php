<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Cache;

class ClienteController extends Controller
{

    // Obtener todos los clientes
    public function index()
    {
        $clientes = Cache::remember('clientes', 60, function () {
            return Cliente::paginate(10);
        });

        return response()->json([
            'success' => true,
            'message' => 'Clientes obtenidos correctamente',
            'data' => $clientes
        ], 200);
    }

    // Crear cliente
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|string|max:20'
        ]);

        $cliente = Cliente::create($validated);

        Cache::forget('clientes');

        return response()->json([
            'success' => true,
            'message' => 'Cliente creado correctamente',
            'data' => $cliente
        ], 201);
    }

    // Ver un cliente
    public function show($id)
    {
        try {

            $cliente = Cliente::findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $cliente
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Cliente no encontrado'
            ], 404);
        }
    }

    // Actualizar cliente
    public function update(Request $request, $id)
    {
        try {

            $cliente = Cliente::findOrFail($id);

            $validated = $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'correo' => 'required|email|unique:clientes,correo,' . $id,
                'telefono' => 'required|string|max:20'
            ]);

            $cliente->update($validated);

            Cache::forget('clientes');

            return response()->json([
                'success' => true,
                'message' => 'Cliente actualizado correctamente',
                'data' => $cliente
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al actualizar cliente'
            ], 500);
        }
    }

    // Eliminar cliente
    public function destroy($id)
    {
        try {

            $cliente = Cliente::findOrFail($id);

            $cliente->delete();

            Cache::forget('clientes');

            return response()->json([
                'success' => true,
                'message' => 'Cliente eliminado correctamente'
            ], 200);

        } catch (\Exception $e) {

            return response()->json([
                'success' => false,
                'message' => 'Error al eliminar cliente'
            ], 500);
        }
    }
}

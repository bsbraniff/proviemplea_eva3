<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    // Listar todos los clientes
    public function index()
    {
        return Cliente::all();
    }

    // Crear cliente
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo',
            'telefono' => 'required|string|max:20'
        ]);

        $cliente = Cliente::create($request->all());

        return response()->json($cliente, 201);
    }

    // Ver un cliente
    public function show($id)
    {
        return Cliente::find($id);
    }

    // Actualizar cliente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|email|unique:clientes,correo,' . $id,
            'telefono' => 'required|string|max:20'
        ]);

        $cliente = Cliente::findOrFail($id);

        $cliente->update($request->all());

        return response()->json($cliente);
    }

    // Eliminar cliente
    public function destroy($id)
    {
        Cliente::destroy($id);

        return response()->json(['message' => 'Cliente eliminado']);
    }
}
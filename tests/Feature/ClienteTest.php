<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Cliente;

class ClienteTest extends TestCase
{
    use RefreshDatabase;

    // Test GET clientes
    public function test_obtener_clientes()
    {
        Cliente::factory()->create();

        $response = $this->getJson('/api/clientes');

        $response->assertStatus(200);
    }

    // Test POST cliente
    public function test_crear_cliente()
    {
        $response = $this->postJson('/api/clientes', [
            'nombre' => 'Barbara',
            'apellido' => 'Santa Maria',
            'correo' => 'barbara@test.com',
            'telefono' => '123456789'
        ]);

        $response->assertStatus(201);
    }

    // Test PUT cliente
    public function test_actualizar_cliente()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->putJson('/api/clientes/' . $cliente->id, [
            'nombre' => 'Barbara Actualizada',
            'apellido' => 'Santa Maria',
            'correo' => 'nuevo@test.com',
            'telefono' => '999999999'
        ]);

        $response->assertStatus(200);
    }

    // Test DELETE cliente
    public function test_eliminar_cliente()
    {
        $cliente = Cliente::factory()->create();

        $response = $this->deleteJson('/api/clientes/' . $cliente->id);

        $response->assertStatus(200);
    }
}

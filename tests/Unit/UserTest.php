<?php

namespace Tests\Unit;

use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     */

    public function test_cadastrar_usuario()
    {

        $response =  $this->postJson('/api/usuario', [
            'nome' => 'victor',
            'email' => 'victor@gmail.com',
            'senha' => '123456',
            'senha_confirmation' => '123456'
        ]);

        $response->assertStatus(201);
    }
}

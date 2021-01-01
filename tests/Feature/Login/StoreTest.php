<?php

namespace Tests\Feature\Login;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    /**
     * Test login successfully
     *
     * @return void
     */
    public function testLoginSuccessfully()
    {
        $response = $this->postJson('/login', [
            'email' => 'dummy@mail.com',
            'password' => 'secret',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'success',
                'code' => 200,
                'data' => [
                    'name' => 'Dummy User',
                    'email' => 'dummy@mail.com',
                ]
            ])
            ->assertJsonStructure([
                'message',
                'code',
                'data' => [
                    'name',
                    'email',
                    'token'
                ]
            ]);
    }
}

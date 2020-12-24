<?php

namespace Tests\Feature\Register;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StoreTest extends TestCase
{
    use WithFaker;

    /**
     * Test successfull request
     *
     * @return void
     */
    public function testSuccessfullRequest()
    {
        $name = $this->faker->name();
        $email = $this->faker->email();

        $response = $this->post('/api/register', [
            'name' => $name,
            'email' => $email,
            'password' => $this->faker->password(),
        ]);

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'created',
                'code' => 201,
                'data' => [
                    'name' => $name,
                    'email' => $email,
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

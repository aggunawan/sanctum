<?php

namespace Tests\Feature\Me;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class GetTest extends TestCase
{
    use WithFaker;

    /**
     * Get User data by its token
     *
     * @return void
     */
    public function testGetUserSuccessfully()
    {
        $name = $this->faker->name();
        $email = $this->faker->email();

        $user = (new User)->store([
            'name' => $name,
            'email' => $email,
            'password' => $this->faker->password(),
        ]);

        $token = $user->token;

        $response = $this
            ->withHeaders([
                'Authorization' => "Bearer $token"
            ])
            ->get('/v1/me');

        $response->assertStatus(200)
            ->assertJson([
                'message' => 'success',
                'code' => 200,
                'data' => [
                    'name' => $name,
                    'email' => $email,
                    'token' => null,
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

    public function testGetUserWithInvalidToken()
    {
        $token = Str::random();

        $response = $this
            ->withHeaders([
                'Authorization' => "Bearer $token",
                'accept' => 'application/json'
            ])
            ->get('/v1/me');

        $response->assertStatus(401);
    }
}

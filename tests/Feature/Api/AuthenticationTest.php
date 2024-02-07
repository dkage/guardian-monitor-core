<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Helpers\JsonStructureConverter;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::create([
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => bcrypt('password123')
        ]);
    }


    public function test_api_login_authentication(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'test@gmail.com',
            'password' => 'password123'
        ]);

        $response->assertStatus(200);
        $json_structure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/login_response.json');

        $response->assertJsonStructure($json_structure);

        // Check if token was created
        $token = $response->json('data.access_token');
        $token_id = preg_split('/\|/', $token)[0];
        $this->assertTrue($this->user->tokens()->where('id', $token_id)->exists());

        // Check if authenticated with the respective user
        $this->assertAuthenticatedAs($this->user);

    }


    public function test_api_login_authentication_with_invalid_credentials_returns_401(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'doesnt@exist.com',
            'password' => 'any'
        ]);

        $response->assertStatus(401);
        $response->json(['success' => false]);
    }


    public function test_api_register_new_user_success(): void {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test2@gmail.com',
            'password' => 'password123'
            ]);

        $response->assertStatus(201);
    }

    public function test_api_register_new_user_fails_with_invalid_data(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'not_an_email',
            'password' => 'test'
        ]);

        $response->assertStatus(422);
    }

    public function test_api_logout(): void
    {
        $this->actingAs($this->user);
        $access_token = $this->user->createToken('test-token')->plainTextToken;
        $token_id = preg_split('/\|/', $access_token)[0];

        // Assert token created
        $this->assertTrue($this->user->tokens()->where('id', $token_id)->exists());

        $response = $this->postJson('/api/logout', [], [
            'Authorization' => 'Bearer ' . $access_token,
        ]);

        $response->assertStatus(200);



        // Assert that the token is revoked
        $this->assertFalse($this->user->tokens()->where('id', $token_id)->exists());
    }
}

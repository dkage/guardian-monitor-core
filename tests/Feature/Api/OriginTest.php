<?php

namespace Tests\Feature\Api;

use App\Models\Origin;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\OriginSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Helpers\JsonStructureConverter;
use Tests\TestCase;

class OriginTest extends TestCase
{
    use RefreshDatabase;
    protected User $user;


    public function setUp(): void
    {
        parent::setUp();

        $this->seed(OriginSeeder::class);
        $this->seed(AdminUserSeeder::class);

        $this->user = User::find(1);
    }

    public function test_api_access_origin_without_authentication_triggers_401(): void
    {
        $response = $this->getJson('/api/v1/origin');
        $response->assertStatus(401);
    }


    public function test_api_origin_index(): void
    {
        $response = $this->actingAs($this->user)->getJson('/api/v1/origin');

        $response->assertStatus(200);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/origin_index_response.json');
        $response->assertJsonStructure($jsonStructure);

    }


    public function test_api_origin_show(): void {
        $response = $this->actingAs($this->user)->getJson('/api/v1/origin/1');

        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/origin_show_response.json');
        $response->assertJsonStructure($jsonStructure);

    }


    public function test_api_origin_store(): void {
        $response = $this->actingAs($this->user)->postJson('/api/v1/origin', [
            'name' => 'Test Origin'
        ]);
        $response->assertStatus(Response::HTTP_CREATED);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/origin_store_response.json');
        $response->assertJsonStructure($jsonStructure);

        $this->assertDatabaseHas('origins', ['name' => 'Test Origin']);

    }


    public function test_api_origin_update(): void {
        $origin = Origin::create(['name' => 'Update Origin']);
        $new_name = 'Update Origin Updated';

        $response = $this->actingAs($this->user)->putJson('/api/v1/origin/' . (string)$origin->id, [
            'name' => $new_name,
        ]);

        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/origin_update_response.json');
        $response->assertJsonStructure($jsonStructure);

        $this->assertDatabaseMissing('origins', ['name' => 'Update Origin', 'id' => $origin->id]);
        $this->assertDatabaseHas('origins', ['name' => $new_name, 'id' => $origin->id]);


    }


    public function test_api_origin_delete(): void {
        $origin = Origin::create(['name' => 'Delete Origin']);

        $this->assertDatabaseHas('origins', ['name' => 'Delete Origin', 'id' => $origin->id]);

        $response = $this->actingAs($this->user)->deleteJson('/api/v1/origin/' . (string)$origin->id);
        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('origins', ['name' => 'Delete Origin', 'id' => $origin->id]);
    }
}

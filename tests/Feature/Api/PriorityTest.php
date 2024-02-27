<?php

namespace Tests\Feature\Api;

use App\Http\Controllers\Api\v1\PriorityController;
use App\Models\Priority;
use App\Models\User;
use Database\Seeders\AdminUserSeeder;
use Database\Seeders\PrioritySeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Helpers\JsonStructureConverter;
use Tests\TestCase;

class PriorityTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
    }


    public function test_api_access_priority_without_authentication_triggers_401(): void
    {
        $response = $this->getJson('/api/v1/priority');
        $response->assertStatus(401);
    }

    public function test_api_priority_index(): void
    {
        $response = $this->actingAs($this->user)->getJson('/api/v1/priority');

        $response->assertStatus(200);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/priority_index_response.json');
        $response->assertJsonStructure($jsonStructure);

    }

    public function test_api_priority_show(): void {
        $response = $this->actingAs($this->user)->getJson('/api/v1/priority/1');

        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/priority_show_response.json');
        $response->assertJsonStructure($jsonStructure);
    }


    public function test_api_priority_store(): void {
        $response = $this->actingAs($this->user)->postJson('/api/v1/priority', [
            'name' => 'Test Priority',
            'color' => '#FFFFFF'
        ]);
        $response->assertStatus(Response::HTTP_CREATED);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/priority_store_response.json');
        $response->assertJsonStructure($jsonStructure);

        $this->assertDatabaseHas('priorities', ['name' => 'Test Priority']);

    }


    public function test_api_priority_update(): void {
        $old_name = 'Update priority';
        $old_color = '#FFFFFF';

        $priority = Priority::create(['name' => $old_name, 'color' => $old_color]);
        $new_name = 'Update Priority Updated';
        $new_color = '#0000FF';

        $response = $this->actingAs($this->user)->putJson('/api/v1/priority/' . $priority->id, [
            'name' => $new_name,
            'color' => $new_color
        ]);

        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/priority_update_response.json');
        $response->assertJsonStructure($jsonStructure);

        $this->assertDatabaseMissing('priorities', ['name' => $old_name, 'id' => $priority->id]);
        $this->assertDatabaseHas('priorities', ['name' => $new_name, 'color' => $new_color, 'id' => $priority->id]);

    }


    public function test_api_priority_delete(): void {
        $priority = Priority::factory()->create(['name' => 'Delete priority']);

        $this->assertDatabaseHas('priorities', ['name' => 'Delete priority', 'id' => $priority->id]);

        $response = $this->actingAs($this->user)->deleteJson('/api/v1/priority/' . $priority->id);
        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseMissing('priorities', ['name' => 'Delete priority', 'id' => $priority->id]);
    }

}

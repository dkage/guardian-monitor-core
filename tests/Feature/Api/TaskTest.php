<?php

namespace Tests\Feature\Api;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\HttpFoundation\Response;
use Tests\Helpers\JsonStructureConverter;
use Tests\TestCase;

class TaskTest extends TestCase
{
    use RefreshDatabase;

    protected User $user;

    public function setUp(): void
    {
        parent::setUp();

        $this->user = User::find(1);
        Task::factory()->count(5)->create();
    }


    public function test_api_access_task_endpoint_without_authentication_triggers_401(): void {
        $response = $this->getJson('/api/v1/task');
        $response->assertStatus(Response::HTTP_UNAUTHORIZED);
    }


    public function test_api_task_index(): void
    {
        $response = $this->actingAs($this->user)->getJson('/api/v1/task');
        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/task_index_response.json');
        $response->assertJsonStructure($jsonStructure);

    }

    public function test_api_task_show(): void {
        $response = $this->actingAs($this->user)->getJson('/api/v1/task/1');
        $response->assertStatus(Response::HTTP_OK);

        $jsonStructure = JsonStructureConverter::convert(__DIR__ . '/../../Fixtures/task_show_response.json');
        $response->assertJsonStructure($jsonStructure);
    }

    public function test_api_task_show_not_found(): void {

        $not_exist_id = 1000;
        $response = $this->actingAs($this->user)->getJson('/api/v1/task/' . $not_exist_id);
        $response->assertStatus(Response::HTTP_NOT_FOUND);
    }

//    public function test_api_task_store_valid_input(): void {
//
//    }
//
//    public function test_api_task_store_invalid_input(): void {
//
//    }
//
//    public function test_api_task_update_valid_input(): void {
//
//    }
//
//    public function test_api_task_update_invalid_input(): void {
//
//    }

}

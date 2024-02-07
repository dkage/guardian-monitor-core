<?php

namespace Tests\Feature\Basic;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CheckTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_backend_is_running(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('System running as intended.');
    }
}

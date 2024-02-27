<?php

namespace Tests\Feature\Api;

use Database\Seeders\OriginSeeder;
use Tests\TestCase;

class OriginTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        $this->seed(OriginSeeder::class);
    }


    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

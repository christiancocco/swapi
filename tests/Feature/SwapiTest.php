<?php

namespace ChristianCocco\Swapi\tests\Feature;

use ChristianCocco\Swapi\Models\People;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\TestCase;

class SwapiTest extends TestCase
{
    //use RefreshDatabase;
    /**
     * Test api/people api.
     *
     * @return void
     */
    public function test_people_api()
    {
        $response = $this->get('/api/people');

        $response->assertStatus(200);
    }

    /**
     * Test api/people api.
     *
     * @return void
     */
    public function test_people_details_api()
    {
        $people = People::first();
        $response = $this->get('/api/people/' . $people->id);
        $response->assertStatus(200);
    }
}

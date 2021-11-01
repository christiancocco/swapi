<?php

namespace ChristianCocco\Swapi\tests\Unit;

use ChristianCocco\Swapi\Models\People;
use ChristianCocco\Swapi\Models\Planet;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SwapiUnitTest extends TestCase
{
    /**
     * Create planet unit test.
     *
     * @return void
     */
    public function test_create_new_planet()
    {
        //Create and store planet by factory opbject
        $planet = Planet::factory()->create();
        $this->assertTrue(true);
    }

    /**
     * Update planet unit test.
     *
     * @return void
     */
    public function test_update_planet()
    {
        //Get lastest planet inserted
        $planet = Planet::orderBy('id', 'desc')->first();
        $id = $planet->id;
        $name = "Earth";
        $planet->name = $name;
        //Update planet name
        $planet->save();
        //Chech if planet name was updated
        $planet = Planet::where("name", "=", $name)
        ->where("id", "=", $id)
        ->first();
        ($planet)?$this->assertTrue(true):$this->assertTrue(false);
    }

    /**
     * Create people unit test.
     *
     * @return void
     */
    public function test_create_new_people()
    {
        //Get lastest planet inserted
        $planet = Planet::orderBy('id', 'desc')->first();
        //Create factory people object
        $people = People::factory()->make();
        //Define new object data
        $data = [
            "name" => $people->name,
            "height" => $people->height,
            "mass" => $people->mass,
            "hair_color" => $people->hair_color,
            "skin_color" => $people->skin_color,
            "eye_color" => $people->eye_color,
            "birth_year" => $people->birth_year,
            "gender" => $people->gender,
            "planet_id" => $planet->id //Set last created planet id
        ];
        //Store people in DB
        People::create($data);
        $this->assertTrue(true);
    }

    /**
     * Update people unit test.
     *
     * @return void
     */
    public function test_update_people()
    {
        //Get lastest people inserted
        $people = People::orderBy('id', 'desc')->first();
        $id = $people->id;
        $name = "Thanos";
        $people->name = $name;
        //Update people name
        $people->save();
        //Chech if people name was updated
        $people = People::where("name", "=", $name)
        ->where("id", "=", $id)
        ->first();
        ($people)?$this->assertTrue(true):$this->assertTrue(false);
    }
}

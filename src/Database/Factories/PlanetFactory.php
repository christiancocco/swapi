<?php

namespace ChristianCocco\Swapi\Database\Factories;

use ChristianCocco\Swapi\Models\Planet;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PlanetFactory extends Factory
{
    protected $model = Planet::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "rotation_period" => $this->faker->text(),
            "orbital_period" => $this->faker->text(),
            "diameter" => $this->faker->text(),
            "climate" => $this->faker->text(),
            "gravity" => $this->faker->text(),
            "terrain" => $this->faker->text(),
            "surface_water" => $this->faker->text(),
            "population" => $this->faker->text()
        ];
    }
}

<?php

namespace ChristianCocco\Swapi\Database\Factories;

use ChristianCocco\Swapi\Models\People;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PeopleFactory extends Factory
{
    protected $model = People::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "height" => $this->faker->text(),
            "mass" => $this->faker->text(),
            "hair_color" => $this->faker->text(),
            "skin_color" => $this->faker->text(),
            "eye_color" => $this->faker->text(),
            "birth_year" => $this->faker->text(),
            "gender" => $this->faker->text(),
            "planet_id" => null
        ];
    }
}

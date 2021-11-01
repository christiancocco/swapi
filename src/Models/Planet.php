<?php

namespace ChristianCocco\Swapi\Models;

use ChristianCocco\Swapi\Database\Factories\PlanetFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
    use HasFactory;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return PlanetFactory::new();
    }

    // Disable Laravel's mass assignment protection
    protected $guarded = [];

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public static function rules($id = null)
    {
        $rules = [
            'name' => 'required|min:3|max:255',
            'rotation_period' => 'required|min:3|max:255',
            'orbital_period' => 'required|min:3|max:255',
            'diameter' => 'required|min:3|max:255',
            'climate' => 'required|min:3|max:255',
            'gravity' => 'required|min:3|max:255',
            'terrain' => 'required|min:3|max:255',
            'surface_water' => 'required|min:3|max:255',
            'population' => 'required|min:3|max:255'
        ];

        return $rules;
    }
}

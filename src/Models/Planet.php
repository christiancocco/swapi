<?php

namespace ChristianCocco\Swapi\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planet extends Model
{
  use HasFactory;

  // Disable Laravel's mass assignment protection
  protected $guarded = [];

  /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public static function rules($id = null) {
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
